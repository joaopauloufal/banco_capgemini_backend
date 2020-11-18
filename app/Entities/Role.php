<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Models\Role as SpartieRole;

/**
 * Class Role.
 *
 * @package namespace App\Entities;
 */
class Role extends SpartieRole implements Transformable
{
    use TransformableTrait;

}
