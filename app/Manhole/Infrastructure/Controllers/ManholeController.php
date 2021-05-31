<?php

namespace Manhole\Infrastructure\Controllers;

use App\Manhole\Infrastructure\Requests\BuildManholeRequest;
use Illuminate\Http\Response;
use Manhole\Application\CreateManhole;
use Manhole\Infrastructure\Resources\ManholeResource;
use Shared\Infrastructure\Controllers\Controller;

class ManholeController extends Controller {

    /**
     * Health check.
     *
     * @return Response
     */
    public function hi(): Response {
        return response("Welcome to manhole API");
    }

    /**
     * Build new manhole cover.
     *
     * @param BuildManholeRequest $request
     * @param CreateManhole       $service
     * @return ManholeResource
     *
     * @OA\Post(
     *   path="/api/manhole_cover/build",
     *   summary="Store new manhole cover",
     *   tags={"manhole"},
     *   operationId="buildManholeCover",
     *   @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="material",
     *                     type="string",
     *                     nullable=false,
     *                     description="Choices: {iron,steel,stone}"
     *                 ),
     *                 @OA\Property (
     *                     property="radio",
     *                     type="number",
     *                     nullable=false,
     *                 ),
     *                 @OA\Property (
     *                     property="decoration",
     *                     type="boolean",
     *                     nullable=false,
     *                 ),
     *              ),
     *         )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Ok response",
     *    @OA\JsonContent(type="object",
     *      @OA\Property (property="data", ref="#/components/schemas/Manhole"),
     *    ),
     *  ),
     * @OA\Response(response="422", description="Request invalid. see errors"),
     * )
     */
    public function buildManholeCover(BuildManholeRequest $request, CreateManhole $service): ManholeResource {
        $values  = $request->all();
        $manhole = $service->buildManholeCover($values);

        return new ManholeResource($manhole);
    }
}
