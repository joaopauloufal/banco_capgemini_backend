<?php

namespace App\Entities;

use Spatie\Permission\Models\Permission as SpartiePermission;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Permission.
 *
 * @package namespace App\Entities;
 */
class Permission extends SpartiePermission implements Transformable
{
    use TransformableTrait;

}
