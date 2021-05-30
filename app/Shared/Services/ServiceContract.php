<?php


namespace Shared\Services;


use Shared\Repositories\RepositoryContract;

interface ServiceContract {

    public function getRepository(): RepositoryContract;
}
