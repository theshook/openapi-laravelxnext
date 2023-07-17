<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Practice API Documentation",
 *      description="Practice API description",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 *
 * @OA\Tag(
 *     name="Practice",
 *     description="API Endpoints of Practice"
 * )
 *
 * @OA\Schema(
 *      schema="Pagination",
 *      type="object",
 *      @OA\Property(property="current_page", type="number"),
 *      @OA\Property(property="first_page_url", type="string"),
 *      @OA\Property(property="from", type="number"),
 *      @OA\Property(property="last_page", type="number"),
 *      @OA\Property(property="last_page_url", type="string"),
 *      @OA\Property(property="links", type="array", title="PaginationLinks",
 *          @OA\Items(
 *              @OA\Property(property="url", type="string", nullable=true),
 *              @OA\Property(property="label", type="string"),
 *              @OA\Property(property="active", type="boolean")
 *          )
 *      ),
 *      @OA\Property(property="next_page_url", type="string", nullable=true),
 *      @OA\Property(property="path", type="string"),
 *      @OA\Property(property="per_page", type="number"),
 *      @OA\Property(property="prev_page_url", type="string", nullable=true),
 *      @OA\Property(property="to", type="number"),
 *      @OA\Property(property="total", type="number"),
 * )
 *
 * @OA\Schema(
 *   schema="CreatedAndUpdatedDates",
 *   type="object",
 *   @OA\Property(property="created_at", type="string", format="date-time", description="Creation date"),
 *   @OA\Property(property="updated_at", type="string", format="date-time", description="Last update date"),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @param string $modelName The name of the model schema to use for the data property in the paginated data schema
     *
     */
    function dynamicSchema($modelName)
    {
        return <<<EOD
            /**
             * @OA\Schema(
             *     schema="PaginatedData",
             *     @OA\Property(property="current_page", type="number"),
             *     @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/{$modelName}")),
             *     @OA\Property(property="first_page_url", type="string"),
             *     @OA\Property(property="from", type="number"),
             *     @OA\Property(property="last_page", type="number"),
             *     @OA\Property(property="last_page_url", type="string"),
             *     @OA\Property(
             *         property="links",
             *         type="array",
             *         @OA\Items(
             *             @OA\Property(property="url", type="string", nullable=true),
             *             @OA\Property(property="label", type="string"),
             *             @OA\Property(property="active", type="boolean")
             *         )
             *     ),
             *     @OA\Property(property="next_page_url", type="string", nullable=true),
             *     @OA\Property(property="path", type="string"),
             *     @OA\Property(property="per_page", type="number"),
             *     @OA\Property(property="prev_page_url", type="string", nullable=true),
             *     @OA\Property(property="to", type="number"),
             *     @OA\Property(property="total", type="number"),
             * )
             */
        EOD;
    }
}
