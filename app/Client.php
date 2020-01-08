<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $primaryKey = "id_clients";
    protected $table = "clients";
    protected $fillable = [
        "id_clients",
        "first_name",
        "last_name",
        "id_card",
        "email",
        "number_phone"
    ];
    public function users()
    {
        return $this->hasMany(User::class, "id_users");
    }

    public function invoices()
    {
        return $this->belongsTo(Invoice::class, "id_clients");
    }


}
