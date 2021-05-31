<?php


namespace Manhole\Infrastructure\Providers;


use Manhole\Infrastructure\Observers\ManholeObserver;
use Illuminate\Support\ServiceProvider;
use Manhole\Application\CreateManhole;
use Manhole\Domain\Repositories\ManholeRepositoryContract;
use Manhole\Infrastructure\Persistence\EloquentManhole;
use Manhole\Infrastructure\Persistence\ManholeRepository;

class ManholeServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     * @throws \ReflectionException
     */
    public function register(): void {
        $this->app->bind(ManholeRepositoryContract::class, ManholeRepository::class);

        $this->app->bind(getClassShortName(CreateManhole::class),
            static function (ManholeRepository $repository) {
                return new CreateManhole($repository);
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {
        EloquentManhole::observe(ManholeObserver::class);
    }

}
