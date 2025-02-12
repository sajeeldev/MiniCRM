<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    // relationship with employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
