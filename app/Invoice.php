<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = "id_invoices";
    protected $table = "invoices";
    protected $fillable = [
        "title",
        "subtotal",
        "total",
        "email",
        "city",
        "country",
        "duedate",
        "expedition_date",
        "receipt_date",
        "iva"
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, "id_companies");
    }

    public function states()
    {
        return $this->hasMany(State::class, "id_states");
    }

    public function clients()
    {
        return $this->hasMany(Client::class, "id_client");
    }

    public function invoice_products()
    {
        return $this->belongsTo(InvoiceProduct::class, "id_invoice");
    }


}
