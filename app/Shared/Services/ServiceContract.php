<?php


namespace Shared\Services;


use Shared\Domain\Repositories\RepositoryContract;

interface ServiceContract {

    public function getRepository(): RepositoryContract;
}
