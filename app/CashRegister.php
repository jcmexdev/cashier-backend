<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashRegister extends Model
{
    protected $fillable = [
        'opening_date',
        'opening_hour',
        'previous_closing_value',
        'opening_value',
        'description',
        'closing_date',
        'closing_hour',
        'card_value',
        'cash_value',
        'closing_value',
        'sales_value',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
