<?php


namespace Manhole\Application;


use App\Manhole\Exceptions\ManholeException;
use Manhole\Domain\Models\Manhole;
use Manhole\Domain\Models\Size;
use Manhole\Domain\Repositories\ManholeRepositoryContract;
use Shared\Services\BaseService;

class CreateManhole extends BaseService {

    /**
     * @param ManholeRepositoryContract $repository
     */
    public function __construct(ManholeRepositoryContract $repository) {
        parent::__construct($repository);
    }

    /**
     * Store new manhole cover.
     *
     * @param array $values
     * @return Manhole
     */
    public function buildManholeCover(array $values): Manhole {
        $manhole = class_hydrate($values, new Manhole);
        return $this->repository->save($manhole);
    }

    /**
     * Set manhole size attribute.
     *
     * @throws \Exception
     */
    public function setSize(Manhole $manhole): Manhole {
        switch ($radio = $manhole->getRadio()) {
            case $radio < config('parameters.manhole.size.min_value'):
                throw new ManholeException(trans('manhole.errors.invalid_radio'));
            case $radio < config('parameters.manhole.size.' . Size::S):
                $size = Size::S;
                break;
            case $radio < config('parameters.manhole.size.' . Size::M):
                $size = Size::M;
                break;
            case $radio < config('parameters.manhole.size.' . Size::L):
                $size = Size::L;
                break;
            default:
                $size = Size::XL;
                break;
        }

        $manhole->setSize($size);
        return $manhole;
    }
}
