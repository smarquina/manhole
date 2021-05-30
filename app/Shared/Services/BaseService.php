<?php


namespace Shared\Services;


use Shared\Repositories\RepositoryContract;

abstract class BaseService implements ServiceContract {

    protected $repository;

    /**
     * BaseService constructor.
     * @param RepositoryContract $repository
     */
    public function __construct(RepositoryContract $repository) {
        $this->repository = $repository;
    }

    public function getRepository(): RepositoryContract {
        return $this->repository;
    }
}
