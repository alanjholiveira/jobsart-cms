<?php

namespace JobsArt\Providers;

use Illuminate\Support\ServiceProvider;

class JobsArtRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Module: Slideshow
        $this->app->bind(
            \JobsArt\Repositories\Modules\SlideShow\SlideShowRepository::class,
            \JobsArt\Repositories\Modules\SlideShow\SlideShowRepositoryEloquent::class
        );

        //Module: Portfólio/Cat
        $this->app->bind(
            \JobsArt\Repositories\Modules\Portfolio\PortfolioRepository::class,
            \JobsArt\Repositories\Modules\Portfolio\PortfolioRepositoryEloquent::class
        );
        $this->app->bind(
            \JobsArt\Repositories\Modules\Portfolio\PortfolioCatRepository::class,
            \JobsArt\Repositories\Modules\Portfolio\PortfolioCatRepositoryEloquent::class
        );

        //Module: Post/Cat
        $this->app->bind(
            \JobsArt\Repositories\Modules\Post\PostRepository::class,
            \JobsArt\Repositories\Modules\Post\PostRepositoryEloquent::class
        );
        $this->app->bind(
            \JobsArt\Repositories\Modules\Post\PostCatRepository::class,
            \JobsArt\Repositories\Modules\Post\PostCatRepositoryEloquent::class
        );
    }
}
