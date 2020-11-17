<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Pessoa.
 *
 * @package namespace App\Entities;
 */
class Pessoa extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pessoas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cpf_cnpj', 'nome'];

}
