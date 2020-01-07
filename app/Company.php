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


    public function sellers()
    {
        return $this->belongsTo(Seller::class, "id_companies");
    }

    public function invoices()
    {
        return $this->belongsTo(Invoice::class, "id_companies");
    }


}
