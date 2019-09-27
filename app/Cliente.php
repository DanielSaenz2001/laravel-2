<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'id',
        'name',
        'apellido',
        'fecha_nacimiento',
        'dni',
        'edad',
        'email',
        'created_at',
        'updated_at'
    ];
}
