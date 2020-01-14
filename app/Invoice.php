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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_products', 'id_invoices', 'id_products')->withPivot(['quantity', 'unit_value', 'total_value']);;
    }

    public function getSubtotalAttribute()
    {
        if (isset($this->products[0])) {
            return $this->products[0]->pivot->where('id_invoices', $this->id_invoices)->sum('total_value');
        } else {
            return 0;
        };
    }
    public function getIvaAttribute()
    {
        $subtotal = $this->subtotal;
        return $subtotal * (.16);
    }
    public function getTotalAttribute()
    {
        $subtotal = $this->subtotal;
        $iva = $this->iva;
        return $subtotal + $iva;
    }



}
