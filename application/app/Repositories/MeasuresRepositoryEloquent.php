<?php

namespace Treina\Models\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Models\Repositories\MeasuresRepository;
use Treina\Models\Models\Measures;
use Treina\Models\Validators\MeasuresValidator;

/**
 * Class MeasuresRepositoryEloquent.
 *
 * @package namespace Treina\Models\Repositories;
 */
class MeasuresRepositoryEloquent extends BaseRepository implements MeasuresRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Measures::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MeasuresValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
