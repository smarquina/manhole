<?php

namespace Shared\Http\Controllers;

use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="0.1",
 *         title="Manhole API",
 *         description="Simple API for Manhole build.",
 *         @OA\Contact(
 *             email="sergyzen@gmail.com"
 *         ),
 *         @OA\License(
 *             name="Apache 2.0",
 *             url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *         )
 *     ),
 *     @OA\Server(
 *         description="Simple API for Manhole build.",
 *         url=""
 *     ),
 *     @OA\Tag(name="ride", description="List and build manhole")
 * )
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"https"}
 *     @SWG\Info(
 *         version="1.0.0"
 *     )
 * )
 */
class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    protected $pageLength = 10;
    protected $page       = 1;

    /**
     * ApiController constructor.
     */
    public function __construct() {
        $this->pageLength = request()->get('pageSize', $this->pageLength);
        $this->page       = request()->get('page', $this->page); // Get the ?page=1 from the url;
    }

    /**
     * Simulates the Model::paginate response to make all Json responses uniform.
     *
     * @param ResourceCollection|null $resourceCollection
     * @param integer|null            $pageLength
     * @return array
     */
    public function paginate(ResourceCollection $resourceCollection = null, ?int $pageLength = null): array {
        $pageLength = $pageLength ?? $this->pageLength;
        $items      = $resourceCollection ?? [];
        $lap        = new LengthAwarePaginator($items, $items->count(), // Total items
                                               $pageLength, // Items per page
                                               $this->page, // Current page
                                               ['path' => request()->url(), 'query' => request()->query()]);
        $lapData    = $lap->toArray();

        return array('data' => array_values($lap->forPage($this->page, $pageLength)->toArray()),

                     'pagination' => ['links'      => ['first' => $lapData['first_page_url'],
                                                       'last'  => $lapData['last_page_url'],
                                                       'prev'  => $lapData['prev_page_url'],
                                                       'next'  => $lapData['next_page_url'],],
                                      'total'      => (int)$lapData['total'],
                                      'pageSize'   => (int)$lapData['per_page'],
                                      'totalPages' => (int)$lapData['last_page'],
                                      'page'       => (int)$lapData['current_page'],
                                      'from'       => (int)$lapData['from'],
                                      'to'         => (int)$lapData['to'],]);
    }

    public function jsonResponse(array $data): \Illuminate\Http\JsonResponse {
        return response()->json(compact('data'));
    }

    /**
     * @param int         $code
     * @param string|null $msg
     * @return JsonResponse
     */
    final protected function responseWithError(int $code, string $msg = null): JsonResponse {
        return response()->json(["message"     => $msg ?? Response::$statusTexts[$code] ?? 'Fatal error',
                                 "code"        => $code,
                                 "status_code" => $code,
                                 "status"      => Response::$statusTexts[$code] ?? 'Fatal error',
                                ], $code);
    }
}
