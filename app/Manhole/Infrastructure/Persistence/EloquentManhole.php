<?php


namespace Manhole\Infrastructure\Persistence;

use Manhole\Domain\Models\Manhole;
use Shared\Infrastructure\Persistence\Eloquent\BaseModel;
use Shared\Infrastructure\Persistence\Eloquent\UuidsTrait;

class EloquentManhole extends BaseModel {

    use UuidsTrait;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'guid';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manholes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['radio',
                           'material',
                           'decoration',
                           'size'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['guid'       => 'string',
                        'radio'      => 'float',
                        'material'   => 'string',
                        'decoration' => 'boolean',
                        'size'       => 'string'];

    /**
     * Create Eloquent model from domain model.
     *
     * @param Manhole $manhole
     * @return $this
     */
    public static function bootFromModel(Manhole $manhole): EloquentManhole {
        $model             = new self();
        $model->radio      = $manhole->getRadio();
        $model->material   = $manhole->getMaterial()->getValue();
        $model->decoration = $manhole->getDecoration();
        $model->size       = optional($manhole->getSize())->getValue();

        return $model;
    }
}
