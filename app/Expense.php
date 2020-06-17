<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function cashRegister()
    {
        return $this->belongsTo(CashRegister::class);
    }
}
