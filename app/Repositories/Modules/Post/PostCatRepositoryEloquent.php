<?php

namespace JobsArt\Repositories\Modules\Post;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use JobsArt\Repositories\Modules\Post\PostCatRepository;
use JobsArt\Entities\Modules\Post\PostCat;

/**
 * Class PostCatRepositoryEloquent
 * @package namespace JobsArt\RepositoriesModules\Post;
 */
class PostCatRepositoryEloquent extends BaseRepository implements PostCatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostCat::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
