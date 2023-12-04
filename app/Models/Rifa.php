<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telefone',
        'numero',
        'status',
        'compra'
    ];


    public function statusFormat()
    {

        if ($this->attributes['status'] == 1) {
            return 'ativo';
        }
        return 'pendente';
    }
}
