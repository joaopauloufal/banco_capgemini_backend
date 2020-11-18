<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClienteRepository;
use App\Entities\Cliente;
use App\Validators\ClienteValidator;

/**
 * Class ClienteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClienteRepositoryEloquent extends BaseRepository implements ClienteRepository
{

    protected $fieldSearchable = [
        'cpf_cnpj'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cliente::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
