<?php

namespace JobsArt\Repositories\Modules\Portfolio;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use JobsArt\Entities\Modules\Portfolio\Portfolio;

/**
 * Class PortfolioRepositoryEloquent
 * @package namespace JobsArt\RepositoriesModules\Portfolio;
 */
class PortfolioRepositoryEloquent extends BaseRepository implements PortfolioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Portfolio::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
