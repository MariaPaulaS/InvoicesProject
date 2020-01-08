<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $primaryKey = "id_states";
    protected $table = "states";
    protected $fillable = [
        "name_state"
    ];

    public function invoices()
    {
        return $this->belongsTo(Invoice::class, "id_states");
    }

}
