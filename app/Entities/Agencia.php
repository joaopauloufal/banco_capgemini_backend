<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Agencia.
 *
 * @package namespace App\Entities;
 */
class Agencia extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'agencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome'];

}
