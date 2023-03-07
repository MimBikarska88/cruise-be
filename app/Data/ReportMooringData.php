<?php

namespace App\Data;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;

#[MapName(SnakeCaseMapper::class)]
class ReportMooringData extends Data
{
    /**
     * @var string|null
     */
    public ?string $id;

    /**
     * @var \Illuminate\Support\Carbon
     */
    public Carbon $dateTime;

    /**
     * @var float
     */
    public float $longitude;

    /**
     * @var float
     */
    public float $latitude;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var \App\Data\BioIndicatorData
     */
    #[WithoutValidation]
    public BioIndicatorData $bioIndicator;

    /**
     * @var \App\Data\PersonData
     */
    #[WithoutValidation]
    public PersonData $person;

    /**
     * @var \App\Data\OrganizationData
     */
    #[WithoutValidation]
    public OrganizationData $organization;

    /**
     * Get the validation rules.
     *
     * @param  \Spatie\LaravelData\Support\Validation\ValidationContext  $context
     * @return string[]
     */
    public static function rules(ValidationContext $context): array
    {
        return [
            'bio_indicator' => 'required|numeric|exists:bio_indicators,id',
            'person' => 'required|numeric|exists:persons,id',
            'organization' => 'required|numeric|exists:organizations,id',
        ];
    }
}
