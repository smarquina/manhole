<?php


namespace Manhole\Infrastructure\Observers;


use Manhole\Application\CreateManhole;
use Manhole\Domain\Models\Manhole;
use Manhole\Infrastructure\Persistence\EloquentManhole;

class ManholeObserver {

    /**
     * Listen to the manhole creating event.
     *
     * @param \Manhole\Infrastructure\Persistence\EloquentManhole $manhole
     * @throws \Exception
     */
    public function creating(EloquentManhole $manhole): void {
        /** @var Manhole $manholeModel */
        $manholeModel = class_hydrate($manhole->attributesToArray(), new Manhole);

        $service = app()->get(CreateManhole::class);
        $service->setSize($manholeModel);

        $manhole->setAttribute('size', $manholeModel->getSize()->getValue());
    }
}
