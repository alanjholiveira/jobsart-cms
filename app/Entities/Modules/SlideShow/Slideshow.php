<?php

namespace JobsArt\Entities\Modules\SlideShow;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $table = 'slideshow';

    protected $fillable = [
        'title',
        'subtitle',
        'logoimage',
        'imagefile',
        'status'
    ];

//    public function scopeStatus($query, $status)
//    {
//        //return $query->where('status', 'published')->orWhere('status', 'trash');
//        if($status == 'trash') {
//            return $query->where('status', 'trash');
//        }elseif($status == 'index'){
//            return $query->where('status', 'published')->orWhere('status', 'unpublished');
//        }
//
//    }



    
}
