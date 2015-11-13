<?php

namespace JobsArt\Repositories\Modules\SlideShow;

use JobsArt\Entities\Modules\SlideShow\Slideshow;
use Prettus\Repository\Eloquent\BaseRepository;

class SlideShowRepositoryEloquent extends BaseRepository implements SlideShowRepository
{

    public function model()
    {
        return Slideshow::class;
    }

}