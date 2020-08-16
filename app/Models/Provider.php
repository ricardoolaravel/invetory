<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['name'];


    public function search($filter = null)
    {
        $results = $this
                    ->where('name', 'LIKE', "%$filter%")
                    ->paginate();
        return $results;
    }

}
