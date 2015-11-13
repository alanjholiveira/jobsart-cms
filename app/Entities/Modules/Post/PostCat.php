<?php

namespace JobsArt\Entities\Modules\Post;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PostCat extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'postcats';

    protected $fillable = [
        'name',
        'alias',
        'type',
        'description',
        'status'
    ];

}
