<?php


namespace Manhole\Domain\Repositories;


use Manhole\Domain\Models\Manhole;
use Shared\Domain\Repositories\RepositoryContract;

interface ManholeRepositoryContract extends RepositoryContract {

    public function save(Manhole $manhole);
}
