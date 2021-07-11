<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    public function getData()
    {
        $txt = $this->id . ':' . $this->name . '(' . $this->age . ')';
        return $txt;
    }
    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }
    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }
    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }
}
