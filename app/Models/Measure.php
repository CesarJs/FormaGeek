<?php

namespace Treina\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Measure.
 *
 * @package namespace Treina\Models;
 */
class Measure extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'measures',
		'id',
		'user_id',
		'neck',
		'arm',
		'chest',
		'waist',
		'abdomen',
		'weight',
		'height',
		'forearm',
		'hip',
		'thigh',
		'calf',
		'picture',
    ];

}
