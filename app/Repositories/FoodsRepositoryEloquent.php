<?php

namespace Treina\Models\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Models\Repositories\FoodsRepository;
use Treina\Models\Models\Foods;
use Treina\Models\Validators\FoodsValidator;

/**
 * Class FoodsRepositoryEloquent.
 *
 * @package namespace Treina\Models\Repositories;
 */
class FoodsRepositoryEloquent extends BaseRepository implements FoodsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Foods::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FoodsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
