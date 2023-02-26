<?php

namespace App\Data;

use App\Models\Instrument;
use App\Models\Report;
use App\Models\SeaScapeParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
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
    public Carbon $periodStartDate;

    /**
     * @var \Illuminate\Support\Carbon
     */
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

    /**
     * @var \Spatie\LaravelData\DataCollection<\App\Data\SeaScapeParameterData>
     */
    #[WithoutValidation, DataCollectionOf(SeaScapeParameterData::class)]
    public DataCollection $parameters;

    /**
     * @var \Spatie\LaravelData\DataCollection<\App\Data\InstrumentData>
     */
    #[WithoutValidation, DataCollectionOf(InstrumentData::class)]
    public DataCollection $instruments;

    /**
     * Get the validation rules.
     *
     * @param  \Spatie\LaravelData\Support\Validation\ValidationContext  $context
     * @return string[]
     */
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
            'parameters.*' => 'exists:sea_scape_parameters,id',
            'instruments.*' => 'exists:instruments,id',
        ];
    }

    /**
     * Create an instance from request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return static
     *
     * @throws \Spatie\LaravelData\Exceptions\PaginatedCollectionIsAlwaysWrapped
     */
    public static function fromRequest(Request $request): static
    {
        return static::withoutMagicalCreationFrom(array_merge($request->all(), [
            'parameters' => SeaScapeParameterData::collection(
                SeaScapeParameter::whereIn('id', $request->input('parameters'))->get()
            )->withoutWrapping(),
            'instruments' => InstrumentData::collection(
                Instrument::whereIn('id', $request->input('instruments'))->get()
            )->withoutWrapping(),
        ]));
    }

    /**
     * Create an instance from model.
     *
     * @param  \App\Models\Report  $report
     * @return static
     *
     * @throws \Spatie\LaravelData\Exceptions\PaginatedCollectionIsAlwaysWrapped
     */
    public static function fromModel(Report $report): static
    {
        return static::withoutMagicalCreationFrom(array_merge($report->toArray(), [
            'parameters' => SeaScapeParameterData::collection($report->parameters)->withoutWrapping(),
            'instruments' => InstrumentData::collection($report->instruments)->withoutWrapping(),
        ]));
    }
}
