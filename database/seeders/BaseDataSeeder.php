<?php

namespace Database\Seeders;

use App\Models\BioIndicator;
use App\Models\Country;
use App\Models\DataAccessRestriction;
use App\Models\Instrument;
use App\Models\Organization;
use App\Models\Person;
use App\Models\Platform;
use App\Models\PlatformCategory;
use App\Models\SeaArea;
use App\Models\SeaPort;
use App\Models\SeaScapeParameter;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BaseDataSeeder extends Seeder
{
    protected function getTableBaseData(string $tableName): Collection
    {
        $fileContents = file_get_contents(sprintf(
            '%s/data/%s.json',
            __DIR__,
            $tableName
        ));
        $data = json_decode($fileContents, true);

        return collect($data)
            ->mapWithKeys(fn (array $entry) => [
                $entry['id'] => Arr::except($entry,  'id')
            ]);
    }

    /**
     * @param  string  $tableName
     * @param  class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @return \Illuminate\Support\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    protected function importBasicTable(string $tableName, string $model): Collection
    {
        $data = $this->getTableBaseData($tableName);

        return $data->map(function (array $entry) use ($model) {
            return $model::query()->create($entry);
        });
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->importBasicTable('bio_indicators', BioIndicator::class);
        $this->importBasicTable('countries', Country::class);
        $this->importBasicTable('data_access_restriction', DataAccessRestriction::class);
        $this->importBasicTable('instruments', Instrument::class);
        $this->importBasicTable('organizations', Organization::class);
        $this->importBasicTable('persons', Person::class);
        $this->importBasicTable('platform_category', PlatformCategory::class);
        $this->importBasicTable('platforms', Platform::class);
        $this->importBasicTable('sea_areas', SeaArea::class);
        $this->importBasicTable('sea_ports', SeaPort::class);
        $this->importBasicTable('sea_scape_parameters', SeaScapeParameter::class);
        $this->importBasicTable('units', Unit::class);
    }
}
