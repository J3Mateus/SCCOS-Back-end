<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemDeServico extends Model
{
    use HasFactory;

    protected $fillable = ['idServico','idFormulario'];
}
