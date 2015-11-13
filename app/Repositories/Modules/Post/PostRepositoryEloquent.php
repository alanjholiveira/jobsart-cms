<?php

namespace JobsArt\Repositories\Modules\Post;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use JobsArt\Repositories\Modules\Post\PostRepository;
use JobsArt\Entities\Modules\Post\Post;

/**
 * Class PostRepositoryEloquent
 * @package namespace JobsArt\RepositoriesModules\Post;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
