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
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;

#[MapName(SnakeCaseMapper::class)]
class ReportData extends Data
{
    /**
     * @var string|null
     */
    public ?string $id;

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
     * @var \App\Data\CountryData|\Spatie\LaravelData\Lazy|null
     */
    #[WithoutValidation]
    public CountryData|Lazy|null $countryOfDeparture;

    /**
     * @var \App\Data\SeaPortData|\Spatie\LaravelData\Lazy|null
     */
    #[WithoutValidation]
    public SeaPortData|Lazy|null $portOfDeparture;

    /**
     * @var \App\Data\CountryData|\Spatie\LaravelData\Lazy|null
     */
    #[WithoutValidation]
    public CountryData|Lazy|null $countryOfReturn;

    /**
     * @var \App\Data\SeaPortData|\Spatie\LaravelData\Lazy|null
     */
    #[WithoutValidation]
    public SeaPortData|Lazy|null $portOfReturn;

    /**
     * @var \App\Data\DataAccessRestrictionData|\Spatie\LaravelData\Lazy
     */
    #[WithoutValidation]
    public DataAccessRestrictionData|Lazy $dataAccessRestriction;

    /**
     * @var string|null
     */
    public ?string $objectives;

    /**
     * @var string|null
     */
    #[Max(255)]
    public ?string $projectName;

    /**
     * @var \App\Data\PlatformData|\Spatie\LaravelData\Lazy
     */
    #[WithoutValidation]
    public PlatformData|Lazy $platform;

    /**
     * @var \App\Data\PlatformCategoryData|\Spatie\LaravelData\Lazy
     */
    #[WithoutValidation]
    public PlatformCategoryData|Lazy $platformCategory;

    /**
     * @var string|null
     */
    public ?string $comment;

    /**
     * @var \Spatie\LaravelData\DataCollection<\App\Data\SeaScapeParameterData>|\Spatie\LaravelData\Lazy|null
     */
    #[WithoutValidation, DataCollectionOf(SeaScapeParameterData::class)]
    public DataCollection|Lazy|null $parameters;

    /**
     * @var \Spatie\LaravelData\DataCollection<\App\Data\InstrumentData>|\Spatie\LaravelData\Lazy|null
     */
    #[WithoutValidation, DataCollectionOf(InstrumentData::class)]
    public DataCollection|Lazy|null $instruments;

    /**
     * @var \Spatie\LaravelData\DataCollection<\App\Data\ReportMooringData>|\Spatie\LaravelData\Lazy|null
     */
    #[DataCollectionOf(ReportMooringData::class)]
    public DataCollection|Lazy|null $moorings;

    /**
     * Get the validation rules.
     *
     * @param  \Spatie\LaravelData\Support\Validation\ValidationContext  $context
     * @return string[]
     */
    public static function rules(ValidationContext $context): array
    {
        return [
            'country_of_departure' => 'nullable|numeric|exists:countries,id',
            'port_of_departure' => 'nullable|numeric|exists:sea_ports,id',
            'country_of_return' => 'nullable|numeric|exists:countries,id',
            'port_of_return' => 'nullable|numeric|exists:sea_ports,id',
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
            'parameters' => $request->whenFilled('parameters', function () use ($request) {
                return SeaScapeParameterData::collection(
                    SeaScapeParameter::whereIn('id', $request->input('parameters'))->get()
                )->withoutWrapping();
            }, fn () => null),
            'instruments' => $request->whenFilled('instruments', function () use ($request) {
                return InstrumentData::collection(
                    Instrument::whereIn('id', $request->input('instruments'))->get()
                )->withoutWrapping();
            }, fn () => null)
        ]));
    }

    /**
     * Create an instance from model.
     *
     * @param  \App\Models\Report  $report
     * @return static
     */
    public static function fromModel(Report $report): static
    {
        return static::withoutMagicalCreationFrom(array_merge($report->attributesToArray(), [
            'countryOfDeparture' => Lazy::whenLoaded(
                'countryOfDeparture',
                $report,
                fn () => CountryData::from($report->countryOfDeparture),
            ),
            'portOfDeparture' => Lazy::whenLoaded(
                'portOfDeparture',
                $report,
                fn () => SeaPortData::from($report->portOfDeparture)
            ),
            'countryOfReturn' => Lazy::whenLoaded(
                'countryOfReturn',
                $report,
                fn () => CountryData::from($report->countryOfReturn)
            ),
            'portOfReturn' => Lazy::whenLoaded(
                'portOfReturn',
                $report,
                fn () => SeaPortData::from($report->portOfReturn)
            ),
            'dataAccessRestriction' => Lazy::whenLoaded(
                'dataAccessRestriction',
                $report,
                fn () => DataAccessRestrictionData::from($report->dataAccessRestriction)
            ),
            'platform' => Lazy::whenLoaded(
                'platform',
                $report,
                fn () => PlatformData::from($report->platform)
            ),
            'platformCategory' => Lazy::whenLoaded(
                'platformCategory',
                $report,
                fn () => PlatformCategoryData::from($report->platformCategory)
            ),
            'parameters' => Lazy::whenLoaded(
                'parameters',
                $report,
                fn () => SeaScapeParameterData::collection($report->parameters)->withoutWrapping()
            ),
            'instruments' => Lazy::whenLoaded(
                'instruments',
                $report,
                fn () => InstrumentData::collection($report->instruments)->withoutWrapping()
            ),
            'moorings' => Lazy::whenLoaded(
                'moorings',
                $report,
                function () use ($report) {
                    return ReportMooringData::collection(
                        $report->moorings()->with([
                            'report',
                            'bioIndicator',
                            'person',
                            'organization.country',
                        ])->get()
                    )->withoutWrapping();
                }
            ),
        ]));
    }
}
