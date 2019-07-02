<?php

namespace Treina\Models\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Models\Repositories\FoodRepository;
use Treina\Models\Models\Food;
use Treina\Models\Validators\FoodValidator;

/**
 * Class FoodRepositoryEloquent.
 *
 * @package namespace Treina\Models\Repositories;
 */
class FoodRepositoryEloquent extends BaseRepository implements FoodRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Food::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FoodValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
