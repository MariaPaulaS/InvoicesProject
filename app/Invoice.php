<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    protected $primaryKey = "id_invoices";
    protected $table = "invoices";
    protected $fillable = [
        "title",
        "ref",
        "id_companies",
        "id_clients",
        "state",
        "duedate",
        "expedition_date"
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


    public function scopeSearch($query, $search, $type)
    {
        if ($type)
            if ($search)
                if ($type == 'client')
                    return Invoice::whereHas('clients', function ($query) use($search){
                        $query->where('first_name', 'LIKE', "%$search%")->orWhere('last_name', 'LIKE', "%$search%") ;
                    });
                elseif ($type == 'company')
                    return Invoice::whereHas('companies', function ($query) use($search){
                        $query->where('name', 'LIKE', "%$search%");
                    });
                else
                    return $query->where("$type", 'LIKE', "%$search%");
    }

}
