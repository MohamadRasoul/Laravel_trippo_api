<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\Comment;

use App\Services\ImageService;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\Mobile\CommentResource;
use App\Models\Experience;
use App\Models\Place;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CommentController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/comment/index",
     *    operationId="IndexComment",
     *    tags={"Comment"},
     *    summary="Get All comments",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="perPage",
     *       example=10,
     *       in="query",
     *       description="Number of item per page",
     *       required=false,
     *       @OA\Schema(
     *           type="integer",
     *       )
     *    ),
     *    @OA\Parameter(
     *        name="page",
     *        example=1,
     *        in="query",
     *        description="Page number",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="filter[place_id]",
     *        in="query",
     *        description="filter by place",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="filter[experience_id]",
     *        in="query",
     *        description="filter by experience",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="filter[plane_id]",
     *        in="query",
     *        description="filter by plane",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="this is all comments"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="comments",
     *                 type="object",
     *                 ref="#/components/schemas/CommentResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function index()
    {

        $comments = QueryBuilder::for(Comment::latest())
            ->allowedFilters([
                AllowedFilter::exact('place_id'),
                AllowedFilter::exact('experience_id'),
                AllowedFilter::exact('plane_id'),
            ]);

        return response()->success(
            'this is all comments',
            [
                "comments" => CommentResource::collection($comments->paginate(request()->perPage ?? $comments->count())),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/comment/{id}/show",
     *    operationId="Showcomment",
     *    tags={"Comment"},
     *    summary="Get comment By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="comment ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="this is your comment"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="comment",
     *                 type="object",
     *                 ref="#/components/schemas/CommentResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function show(comment $comment)
    {
        return response()->success(
            'this is your comment',
            [
                "comment" => new CommentResource($comment),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/comment/place/{placeId}/store",
     *    operationId="storePlaceComment",
     *    tags={"Comment"},
     *    summary="Add comment to place",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *    @OA\Parameter(
     *        name="placeId",
     *        example=1,
     *        in="path",
     *        description="place ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreCommentRequest")
     *       )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="comment is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="comment",
     *                 type="object",
     *                 ref="#/components/schemas/CommentResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function storePlaceComment(StoreCommentRequest $request, Place $place)
    {
        $comment = $place->comments()->create($request->validated());


        $placeComments = $place->comments;

        $place->update([
            'ratting'    => $placeComments->sum('rating') / $placeComments->count(),
        ]);


        foreach ($request->images as $image) {
            (new ImageService)->storeImage(
                model: $comment,
                image: $image,
                collection: 'comment'
            );
        }

        return response()->success(
            'comment is added success',
            [
                "comment" => new CommentResource($comment),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/comment/experience/{experienceId}/store",
     *    operationId="storeExperienceComment",
     *    tags={"Comment"},
     *    summary="Add comment to experience",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *    @OA\Parameter(
     *        name="experienceId",
     *        example=1,
     *        in="path",
     *        description="place ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreCommentRequest")
     *       )
     *    ),
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="comment is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="comment",
     *                 type="object",
     *                 ref="#/components/schemas/CommentResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function storeExperienceComment(StoreCommentRequest $request, Experience $experience)
    {
        $comment = $experience->comments()->create($request->validated());



        $experienceComments = $experience->comments();

        $experience->update([
            'rating'    => $experienceComments->sum('rating') / $experienceComments->count(),
        ]);

        foreach ($request->images as $image) {
            (new ImageService)->storeImage(
                model: $comment,
                image: $image,
                collection: 'comment'
            );
        }

        return response()->success(
            'comment is added success',
            [
                "comment" => new CommentResource($comment),
            ]
        );
    }
}
