<?php


namespace Manhole\Domain\Models;


use App\Manhole\Exceptions\ManholeException;
use Shared\Domain\Models\EnumTrait;

final class Material {

    use EnumTrait;

    public const IRON  = 'iron';
    public const STEEL = 'steel';
    public const STONE = 'stone';

    private $value;

    /**
     * @throws ManholeException
     */
    public function __construct(string $value) {
        if (!in_array($value, self::getValues(), true)) {
            throw new ManholeException("Non valid value");
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue(string $value): self {
        $this->value = $value;
        return $this;
    }
}
