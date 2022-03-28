<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dica extends Model
{
    use HasFactory;

    protected $table = 'dicas';

    protected $fillable = [
        'nome', 'marca', 'modelo', 'versao', 'descricao', 'veiculo_id', 'usuario_id'
    ];

    public $timestamps = false;

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id', 'id');
    }
}
