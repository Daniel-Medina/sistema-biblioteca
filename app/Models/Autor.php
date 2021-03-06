<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = "autores";
    protected $primaryKey="id_autor";

    public $timestamps = false;

    protected $fillable = [
        'id_autor',
        'nombre',
        'apellidos',
        'foto',
    ];
}
