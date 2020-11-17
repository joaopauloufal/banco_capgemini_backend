<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AgenciaRepository;
use App\Entities\Agencia;
use App\Validators\AgenciaValidator;

/**
 * Class AgenciaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AgenciaRepositoryEloquent extends BaseRepository implements AgenciaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Agencia::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
