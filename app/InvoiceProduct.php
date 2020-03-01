<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $guarded = [];
    protected $primaryKey = "id_invoice_products";
    protected $table = "invoice_products";
    protected $fillable = [
   "quantity","unit_value", "total_value"
    ];



    public function invoices()
    {
        return $this->hasMany(Invoice::class, "id_invoices");
    }

    public function products()
    {
        return $this->hasMany(Product::class, "id_products");
    }

}
