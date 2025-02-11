<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Tag(
 *     name="Comments",
 *     description="Endpoints related to comments"
 * )
 *
 * @OA\Schema(
 *      schema="Comment",
 *      type="object",
 *      title="Comment",
 *      required={"id", "task_id", "content"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="task_id", type="integer", example=12),
 *      @OA\Property(property="content", type="string", example="This is a comment."),
 *      @OA\Property(property="created_at", type="string", format="date-time"),
 *      @OA\Property(property="updated_at", type="string", format="date-time")
 *  )
 *
 * @OA\Schema(
 *      schema="Task",
 *      type="object",
 *      title="Task",
 *      required={"id", "title", "status", "building_id", "user_id"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="title", type="string", example="Fix the elevator"),
 *      @OA\Property(property="description", type="string", example="The elevator in building 3 is not working."),
 *      @OA\Property(property="status", type="string", example="pending"),
 *      @OA\Property(property="building_id", type="integer", example=2),
 *      @OA\Property(property="user_id", type="integer", example=5),
 *      @OA\Property(property="created_at", type="string", format="date-time"),
 *      @OA\Property(property="updated_at", type="string", format="date-time")
 *  )
 */
class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Get a list of all comments.
     *
     * @OA\Get(
     *     path="/api/comments",
     *     summary="List all comments",
     *     tags={"Comments"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Comment"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json($this->commentService->listComments());
    }

    /**
     * Create a new comment.
     *
     * @OA\Post(
     *     path="/api/comments",
     *     summary="Create a new comment",
     *     tags={"Comments"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"task_id", "content"},
     *             @OA\Property(property="task_id", type="integer", example=1),
     *             @OA\Property(property="content", type="string", example="This task is almost done!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Comment created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     )
     * )
     */
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        return $this->commentService->createComment($data);
    }
}
