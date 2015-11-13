<?php

namespace JobsArt\Entities\Modules\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Portfolio extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'cat_id',
        'title',
        'details',
        'client',
        'imagefile',
        'link',
        'status'
    ];

    public function portfolioCat()
    {
        return $this->belongsTo(PortfolioCat::class, 'cat_id');
    }

}
