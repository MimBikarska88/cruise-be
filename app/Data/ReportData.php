<?php

namespace App\Data;

use App\Data\Transformers\ModelTransformer;
use App\Models\Country;
use App\Models\DataAccessRestriction;
use App\Models\Platform;
use App\Models\PlatformCategory;
use App\Models\SeaPort;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use App\Data\Casts\ModelCast;

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
     * @var \App\Models\Country
     */
    #[MapName('country_id_of_departure'), Exists('countries', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public Country $countryOfDeparture;

    /**
     * @var \App\Models\SeaPort
     */
    #[MapName('port_id_of_departure'), Exists('sea_ports', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public SeaPort $portOfDeparture;

    /**
     * @var \App\Models\Country
     */
    #[MapName('country_id_of_return'), Exists('countries', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public Country $countryOfReturn;

    /**
     * @var \App\Models\SeaPort
     */
    #[MapName('port_id_of_return'), Exists('sea_ports', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public SeaPort $portOfReturn;

    /**
     * @var \App\Models\DataAccessRestriction
     */
    #[MapName('data_access_restriction_id'), Exists('data_access_restriction', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public DataAccessRestriction $dataAccessRestriction;

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
     * @var \App\Models\Platform
     */
    #[MapName('platform_id'), Exists('platforms', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public Platform $platform;

    /**
     * @var \App\Models\PlatformCategory
     */
    #[MapName('platform_category_id'), Exists('platform_category', 'id'), WithCast(ModelCast::class), WithTransformer(ModelTransformer::class)]
    public PlatformCategory $platformCategory;

    /**
     * @var string
     */
    public string $comment;
}
