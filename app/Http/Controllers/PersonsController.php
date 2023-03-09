<?php

namespace App\Http\Controllers;

use App\Actions\FillPersonAction;
use App\Data\PersonData;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function Index(){
        return PersonData::collection(
            Person::all()
        );
    }

    public function store(PersonData $data,
                          FillPersonAction $fillPersonAction){
        $person = $fillPersonAction->handle(new Person(),$data);
        return PersonData::from($person);
    }
}
