<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = ['name', 'email', 'sector_id'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function search($filter = null)
    {
        $results = $this
                    ->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere('email', 'LIKE', "%{$filter}%")
                    // ->orWhere('sector->id', 'LIKE', "%{$filter}%")
                    ->paginate();

        return $results;
    }
}
