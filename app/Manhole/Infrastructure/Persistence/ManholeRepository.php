<?php


namespace Manhole\Infrastructure\Persistence;

use Manhole\Domain\Models\Manhole;
use Manhole\Domain\Repositories\ManholeRepositoryContract as RepositoryContract;

class ManholeRepository implements RepositoryContract {

    /**
     * Save new model.
     *
     * @param Manhole $manhole
     * @return Manhole
     */
    public function save(Manhole $manhole): Manhole {
        $eloquentManhole = EloquentManhole::bootFromModel($manhole);
        $eloquentManhole->save();

        return class_hydrate($eloquentManhole->attributesToArray(), $manhole);
    }
}
