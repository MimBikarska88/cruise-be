<?php

namespace App\Data;

use App\Models\BioIndicator;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class BioIndicatorData extends Data
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string|null
     */
    public ?string $name;

    /**
     * @var string
     */
    public string $code;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var string
     */
    public string $alternativeLabel;

    /**
     * @var string
     */
    public string $definition;

    /**
     * @var \Illuminate\Support\Carbon
     */
    public Carbon $modifiedDate;

    /**
     * Create an instance from id.
     *
     * @param  string|int  $id
     * @return static
     */
    public static function fromId(string|int $id): self
    {
        return static::withoutMagicalCreationFrom(
            BioIndicator::query()->find($id)
        );
    }
}
