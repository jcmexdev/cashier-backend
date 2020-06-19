<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['name', 'value'];

    public function cashRegister()
    {
        return $this->belongsTo(CashRegister::class);
    }
}
