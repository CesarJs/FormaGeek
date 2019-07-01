<?php

namespace Treina\Models\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Models\Repositories\DietsRepository;
use Treina\Models\Models\Diets;
use Treina\Models\Validators\DietsValidator;

/**
 * Class DietsRepositoryEloquent.
 *
 * @package namespace Treina\Models\Repositories;
 */
class DietsRepositoryEloquent extends BaseRepository implements DietsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Diets::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DietsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
