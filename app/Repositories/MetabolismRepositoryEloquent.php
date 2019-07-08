<?php

namespace Treina\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Repositories\MetabolismRepository;
use Treina\Models\Metabolism;
use Treina\Validators\MetabolismValidator;

/**
 * Class MetabolismRepositoryEloquent.
 *
 * @package namespace Treina\Repositories;
 */
class MetabolismRepositoryEloquent extends BaseRepository implements MetabolismRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Metabolism::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MetabolismValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
