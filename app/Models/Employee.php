<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Employee extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',

    ];

//belongs to company relationship
    public function company(){
     return $this->belongsTo(company::class);
    }
}
