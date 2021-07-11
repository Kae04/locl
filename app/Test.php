<?php
namespace App;
use App\Models\Person;
use Illuminate\Support\Facades\Storage;

class Test{
    public function __invoke() {
        $people = Person::all();
        foreach($people as $person) {
            Storage::append('logs/test.log', $person);
        }
    }
    
}