<?php

namespace JobsArt\Repositories\Modules\Portfolio;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use JobsArt\Entities\Modules\Portfolio\PortfolioCat;

/**
 * Class PortfolioCatRepositoryEloquent
 * @package namespace JobsArt\RepositoriesModules\Portfolio;
 */
class PortfolioCatRepositoryEloquent extends BaseRepository implements PortfolioCatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PortfolioCat::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
