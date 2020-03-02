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

    public function invoices(){

        return $this->belongsTo(Invoices::class);
    }

    public function scopeSearch($query, $search, $type)
    {
        if ($type)
            if ($search)
                return $query->where("$type", 'LIKE', "%$search%");
    }

}
