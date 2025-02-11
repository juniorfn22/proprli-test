<?php

namespace App\Http\Controllers;


use App\Http\Resources\BuildingResource;
use App\Services\BuildingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @OA\Info(
 *      title="Task Management API",
 *      version="1.0.0",
 *      description="API Documentation for Task Management
"
 * )
 *
 * @OA\Schema(
 *      schema="Building",
 *      type="object",
 *      title="Building",
 *      required={"id", "name"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Empire State Building"),
 *      @OA\Property(property="created_at", type="string", format="date-time"),
 *      @OA\Property(property="updated_at", type="string", format="date-time")
 *  )
 */
class BuildingController extends Controller
{
    private BuildingService $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }

    /**
     * List all buildings.
     *
     * @OA\Get(
     *     path="/api/buildings",
     *     summary="Get list of buildings",
     *     tags={"Buildings"},
     *     @OA\Response(
     *         response=200,
     *         description="Building list returned successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Building")
     *         )
     *     )
     * )
     */
    public function index(): AnonymousResourceCollection
    {
        return BuildingResource::collection($this->buildingService->listBuildings());
    }

    /**
     * List a building with tasks and their comments.
     *
     * @OA\Get(
     *     path="/api/buildings/{building_id}/tasks",
     *     summary="Get a building with tasks and comments",
     *     tags={"Buildings"},
     *     @OA\Response(
     *         response=200,
     *         description="Building with tasks and comments returned successfully",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Building"))
     *     )
     * )
     */
    public function listBuildingTasksWithComments(int $building_id): JsonResponse
    {
        return response()->json($this->buildingService->listBuildingTasksWithComments($building_id));
    }
}
