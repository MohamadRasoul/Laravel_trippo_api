<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\Experience;

use App\Services\ImageService;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Http\Resources\Mobile\ExperienceResource;

class ExperienceController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/experience/index",
     *    operationId="IndexExperience",
     *    tags={"Experience"},
     *    summary="Get All Experiences",
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
     *              example="this is all experiences"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="experiences",
     *                 type="object",
     *                 ref="#/components/schemas/ExperienceResource"
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
        $experiences = Experience::orderBy('id');

        return response()->success(
            'this is all Experiences',
            [
                "experiences" => ExperienceResource::collection($experiences->paginate(request()->perPage ?? $experiences->count())),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/experience/{id}/show",
     *    operationId="ShowExperience",
     *    tags={"Experience"},
     *    summary="Get Experience By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Experience ID",
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
     *              example="this is your experience"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="experience",
     *                 type="object",
     *                 ref="#/components/schemas/ExperienceResource"
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
    public function show(Experience $experience)
    {
        return response()->success(
            'this is your experience',
            [
                "experience" => new ExperienceResource($experience),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/experience/store",
     *    operationId="StoreExperience",
     *    tags={"Experience"},
     *    summary="Add Experience",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreExperienceRequest")
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
     *              example="experience is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="experience",
     *                 type="object",
     *                 ref="#/components/schemas/ExperienceResource"
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
    public function store(StoreExperienceRequest $request)
    {
        $experience = Experience::create($request->validated());

        foreach ($request->images as $image) {
            (new ImageService)->storeImage(
                model: $experience,
                image: $image,
                collection: 'experience'
            );
        }
        return response()->success(
            'experience is added success',
            [
                "experience" => new ExperienceResource($experience),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/experience/{id}/update",
     *    operationId="UpdateExperience",
     *    tags={"Experience"},
     *    summary="Edit Experience",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="Experience ID",
     *       required=true,
     *       @OA\Schema(
     *           type="integer"
     *       )
     *    ),
     *
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/UpdateExperienceRequest")
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
     *              example="experience is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="experience",
     *                 type="object",
     *                 ref="#/components/schemas/ExperienceResource"
     *              ),
     *           )
     *        ),
     *     ),
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
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->validated());

        foreach ($request->images as $image) {
            (new ImageService)->storeImage(
                model: $experience,
                image: $image,
                collection: 'experience'
            );
        }

        return response()->success(
            'experience is updated success',
            [
                "experience" => new ExperienceResource($experience),
            ]
        );
    }


    /**
     * @OA\Delete(
     *    path="/api/mobile/experience/{id}/delete",
     *    operationId="DeleteExperience",
     *    tags={"Experience"},
     *    summary="Delete Experience By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Experience ID",
     *        required=true,
     *        @OA\Schema(
     *            type="integer"
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
     *              example="experience is deleted success"
     *           ),
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
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return response()->success('experience is deleted success');
    }
}
