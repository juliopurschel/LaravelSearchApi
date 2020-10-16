<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelClient extends Model
{
   protected $table = 'clients';
   protected $fillable = ['name', 'cpf','telefone', 'cep', 'cidade','estado', 'bairro', 'endereco' ];

}
