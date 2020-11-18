<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Conta.
 *
 * @package namespace App\Entities;
 */
class Conta extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id', 'agencia_id', 'numero', 'tipo', 'saldo'];

    public function agencia()
    {
        return $this->belongsTo('App\Entities\Agencia');
    }

}
