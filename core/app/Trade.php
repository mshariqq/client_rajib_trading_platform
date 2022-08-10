<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    // has one Intrument
    public function instrument()
    {
        return $this->belongsTo(Instrument::class, 'instrument_id', 'id');
    }

    // has one Currency
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

}
