<?php

namespace App\Data;

use App\Models\Platform;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PlatformData extends Data
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $code;

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
            Platform::query()->find($id)
        );
    }
}
