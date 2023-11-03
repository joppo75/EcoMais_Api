<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasCarbonicoEmitido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_combustivels',
        'qtd_listros',
        'qtd_km',
        'resultado',
    ];

    public $timestamps = false;

}

