<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = "id_products";
    protected $table = "products";
    protected $fillable = [
        "name_product","price", "ref"
    ];

    public function invoice_products()
    {
        return $this->belongsTo(InvoiceProduct::class, "id_products");
    }



}
