<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'email',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
