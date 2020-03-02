<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $primaryKey = "id_companies";
    protected $table = "companies";
    protected $fillable = [
        "name",
        "nit"
    ];


    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'id_invoices');
    }

    public function scopeSearch($query, $search, $type)
    {
        if ($type)
            if ($search)
                return $query->where("$type", 'LIKE', "%$search%");
    }


}
