<?php

namespace JobsArt\Entities\Modules\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PortfolioCat extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'status'
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'cat_id', 'id');;
    }

}
