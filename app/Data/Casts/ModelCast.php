<?php

namespace App\Data\Casts;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\Uncastable;
use Spatie\LaravelData\Support\DataProperty;

class ModelCast implements Cast
{
    /**
     * Constructor.
     *
     * @param  string  $column
     */
    public function __construct(
        protected string $column = 'id'
    ) {
    }

    /**
     * Casts a string to a Model.
     *
     * @param  \Spatie\LaravelData\Support\DataProperty  $property
     * @param  mixed  $value
     * @param  array  $context
     * @return \Illuminate\Database\Eloquent\Model|\Spatie\LaravelData\Casts\Uncastable|null
     */
    public function cast(DataProperty $property, mixed $value, array $context): Model | Uncastable | null
    {
        $model = null;
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $type */
        $type = $property->type->findAcceptedTypeForBaseType(Model::class);

        if (
            $type === null ||
            $type === Model::class ||
            ! is_subclass_of($type, Model::class)
        ) {
            return Uncastable::create();
        }

        if($value instanceof Model) {
            $model = clone $value;
        } elseif($value !== null) {
            $model = $type::query()->firstWhere($this->column, $value);
        }

        if (! $property->type->isNullable && $model === null) {
            return Uncastable::create();
        }

        return $model;
    }
}
