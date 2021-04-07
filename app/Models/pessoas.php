<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pessoas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'Natureza','Endereco', 'Telefone','EnderecoEmail', 'observacoes'
    ];
}
