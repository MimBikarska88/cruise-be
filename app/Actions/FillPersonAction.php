<?php

namespace App\Actions;

use App\Data\PersonData;
use App\Models\Person;

class FillPersonAction
{
    public function handle(Person $person, PersonData $data) : Person{
        $person->fill(['name'=> $data->name]);
        $person->save();
        return $person;
    }
}
