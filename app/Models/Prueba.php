<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $table = "pruebas";
    protected $primaryKey = "id";

    protected $fillable=[
        'first_name',
        'last_name',
        'document',
        'email',
        'phone',
        'mobile_phone',
        'address',
        'birthdate',
        'second_name',
        'second_last_name',
    ];
}
