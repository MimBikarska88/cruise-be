<?php

namespace App\Data;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;

#[MapName(SnakeCaseMapper::class)]
class ReportData extends Data
{
    /**
     * @var string
     */
    #[Max(255)]
    public string $cruiseName;

    /**
     * @var \Illuminate\Support\Carbon
     */
    public Carbon $creationDate;

    /**
     * @var \Illuminate\Support\Carbon
     */
    public Carbon $revisionDate;

    /**
     * @var string
     */
    #[Max(255)]
    public string $author;

    /**
     * @var \Illuminate\Support\Carbon
     */
    #[WithCast(DateTimeInterfaceCast::class, 'Y-m-d\TH:i')]
    public Carbon $periodStartDate;

    /**
     * @var \Illuminate\Support\Carbon
     */
    #[WithCast(DateTimeInterfaceCast::class, 'Y-m-d\TH:i')]
    public Carbon $periodEndDate;

    /**
     * @var \App\Data\CountryData
     */
    #[WithoutValidation]
    public CountryData $countryOfDeparture;

    /**
     * @var \App\Data\SeaPortData
     */
    #[WithoutValidation]
    public SeaPortData $portOfDeparture;

    /**
     * @var \App\Data\CountryData
     */
    #[WithoutValidation]
    public CountryData $countryOfReturn;

    /**
     * @var \App\Data\SeaPortData
     */
    #[WithoutValidation]
    public SeaPortData $portOfReturn;

    /**
     * @var \App\Data\DataAccessRestrictionData
     */
    #[WithoutValidation]
    public DataAccessRestrictionData $dataAccessRestriction;

    /**
     * @var string
     */
    public string $objectives;

    /**
     * @var string
     */
    #[Max(255)]
    public string $projectName;

    /**
     * @var \App\Data\PlatformData
     */
    #[WithoutValidation]
    public PlatformData $platform;

    /**
     * @var \App\Data\PlatformCategoryData
     */
    #[WithoutValidation]
    public PlatformCategoryData $platformCategory;

    /**
     * @var string
     */
    public string $comment;

    public static function rules(ValidationContext $context): array
    {
        return [
            'country_of_departure' => 'required|numeric|exists:countries,id',
            'port_of_departure' => 'required|numeric|exists:sea_ports,id',
            'country_of_return' => 'required|numeric|exists:countries,id',
            'port_of_return' => 'required|numeric|exists:sea_ports,id',
            'data_access_restriction' => 'required|numeric|exists:data_access_restriction,id',
            'platform' => 'required|numeric|exists:platforms,id',
            'platform_category' => 'required|numeric|exists:platform_category,id',
        ];
    }
}
