<?php

namespace Treina\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Repositories\DietRepository;
use Treina\Models\Diet;
use Treina\Validators\DietValidator;

/**
 * Class DietRepositoryEloquent.
 *
 * @package namespace Treina\Models\Repositories;
 */
class DietRepositoryEloquent extends BaseRepository implements DietRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Diet::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DietValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
