<?php


namespace Manhole\Infrastructure\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Manhole\Domain\Models\Manhole;

/**
 * Class ManholeResource
 * @package Manhole\Infrastructure\Resources
 * @OA\Schema(schema="Manhole", type="object")
 */
class ManholeResource extends JsonResource {
    /**
     * @OA\Property(
     *   property="guid",
     *   type="string",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="radio",
     *   type="number",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="material",
     *   type="string",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="decoration",
     *   type="boolean",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="size",
     *   type="string",
     *   nullable=false,
     * )
     */


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array {
        /** @var Manhole $manhole */
        $manhole = clone $this;

        return [
            'guid'       => $manhole->getGuid(),
            'radio'      => $manhole->getRadio(),
            'material'   => $manhole->getMaterial()->getValue(),
            'decoration' => $manhole->getDecoration(),
            'size'       => $manhole->getSize()->getValue(),
        ];
    }
}
