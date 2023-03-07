<?php

namespace App\Data;

use App\Models\Organization;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class OrganizationData extends Data
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var \App\Data\CountryData
     */
    public CountryData $country;

    /**
     * @var string
     */
    public string $phone;

    /**
     * @var string
     */
    public string $fax;

    /**
     * @var string
     */
    public string $deliveryPoint;

    /**
     * @var string
     */
    public string $city;

    /**
     * @var string
     */
    public string $postalCode;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $webSite;

    /**
     * Create an instance from id.
     *
     * @param  string|int  $id
     * @return static
     */
    public static function fromId(string|int $id): self
    {
        return static::withoutMagicalCreationFrom(
            Organization::query()->find($id)
        );
    }
}
