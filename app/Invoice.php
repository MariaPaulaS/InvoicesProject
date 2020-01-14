<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = "id_invoices";
    protected $table = "invoices";
    protected $fillable = [
        "title",
        "ref",
        "subtotal",
        "total",
        "duedate",
        "expedition_date",
        "receipt_date",
        "state",
        "iva"
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class, 'id_companies');
    }

    public function states()
    {
        return $this->hasMany(State::class, "id_states");
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, "id_clients");
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'invoice_products', 'id_invoices', 'id_products');
    }


}
