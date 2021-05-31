<?php


namespace Shared\Domain\Models;


/**
 * Trait EnumTrait
 * @package App\Domain\Common\Models
 */
trait EnumTrait {

    /**
     * Get all constant values.
     *
     * @return array
     */
    public static function getValues(): array {
        $class = new \ReflectionClass(static::class);
        return array_values($class->getConstants());
    }
}
