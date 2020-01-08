<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $primaryKey = "id_sellers";
    protected $table = "sellers";
    protected $fillable = [
        "first_name","last_name", "id_card"
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, "id_companies");
    }


}
