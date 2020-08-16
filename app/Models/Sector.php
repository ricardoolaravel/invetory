<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name', 'url', 'details'];

   
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function search($filter = null)
    {
        $results = $this
                    ->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere('details', 'LIKE', "%{$filter}%")
                    ->paginate();

        return $results;
    }

}
