<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    Protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
    ];


    // relationship
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
