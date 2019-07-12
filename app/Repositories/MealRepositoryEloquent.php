<?php

namespace Treina\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Repositories\MealRepository;
use Treina\Models\Meal;
use Treina\Validators\MealValidator;

/**
 * Class MealRepositoryEloquent.
 *
 * @package namespace Treina\Repositories;
 */
class MealRepositoryEloquent extends BaseRepository implements MealRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Meal::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MealValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
