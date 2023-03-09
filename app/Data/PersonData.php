<?php

namespace App\Data;

use App\Models\Person;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PersonData extends Data
{
    /**
     * @var string|null
     */
    public ?string $id;

    /**
     * @var string|null
     */
    public ?string $code;

    /**
     * @var string
     */
    public string $name;

    /**
     * Create an instance from id.
     *
     * @param  string|int  $id
     * @return static
     */
    public static function fromId(string|int $id): self
    {
        return static::withoutMagicalCreationFrom(
            Person::query()->find($id)
        );
    }
}
