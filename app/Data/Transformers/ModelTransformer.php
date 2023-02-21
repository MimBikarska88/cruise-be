<?php

namespace App\Data\Transformers;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class ModelTransformer implements Transformer
{
    /**
     * Constructor.
     *
     * @param  string  $column
     */
    public function __construct(
        protected string $column = 'id',
    ) {
    }

    /**
     * Transforms a model to string.
     *
     * @param  \Spatie\LaravelData\Support\DataProperty  $property
     * @param  \Illuminate\Database\Eloquent\Model  $value
     * @return string|null
     */
    public function transform(DataProperty $property, mixed $value): ?string
    {
        return $value?->getAttribute($this->column);
    }
}
