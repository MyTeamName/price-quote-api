<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
