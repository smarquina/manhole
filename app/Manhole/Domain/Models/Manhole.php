<?php


namespace Manhole\Domain\Models;

use Ramsey\Uuid\Uuid;

final class Manhole {

    /** @var string $guid */
    private $guid;
    /** @var float $radio */
    private $radio;
    /** @var Material $material */
    private $material;
    /** @var boolean $decoration */
    private $decoration;
    /** @var Size $size */
    private $size;

    /**
     * Manhole constructor.
     */
    public function __construct() {
        $this->setGuid(Uuid::uuid4()->toString());
    }

    /**
     * @return string
     */
    public function getGuid(): string {
        return $this->guid;
    }

    /**
     * @param string $guid
     * @return $this
     */
    public function setGuid(string $guid): self {
        $this->guid = $guid;
        return $this;
    }

    /**
     * @return float
     */
    public function getRadio(): float {
        return $this->radio;
    }

    /**
     * @param float $radio
     * @return $this
     */
    public function setRadio(float $radio): self {
        $this->radio = $radio;
        return $this;
    }

    /**
     * @return Material
     */
    public function getMaterial(): Material {
        return $this->material;
    }

    /**
     * @param string $material
     * @return $this
     * @throws \App\Manhole\Exceptions\ManholeException
     */
    public function setMaterial(string $material): self {
        $this->material = new Material($material);
        return $this;
    }

    /**
     * @return bool
     */
    public function getDecoration(): bool {
        return $this->decoration;
    }

    /**
     * @param bool $decoration
     * @return $this
     */
    public function setDecoration(bool $decoration): self {
        $this->decoration = $decoration;
        return $this;
    }

    /**
     * @return Size
     */
    public function getSize(): ?Size {
        return $this->size;
    }

    /**
     * @param string $size
     * @return $this
     * @throws \App\Manhole\Exceptions\ManholeException
     */
    public function setSize(string $size): self {
        $this->size = new Size($size);
        return $this;
    }
}
