<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Resources\Mobile\AnswerResource;
use App\Http\Resources\Mobile\QuestionResource;
use App\Models\City;
use App\Models\Question;


class QuestionController extends Controller
{


    /**
     * @OA\Get(
     *    path="/api/mobile/question/city/{cityId}/index",
     *    operationId="IndexByCity",
     *    tags={"Question"},
     *    summary="Get All Questions By City",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *    @OA\Parameter(
     *        name="cityId",
     *        example=1,
     *        in="path",
     *        description="City ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
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
     *              example="this is all questions belong to your city"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="questions",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/QuestionResource"
     *                 )
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
    public function indexByCity(City $city)
    {
        $questions = $city->questions()->latest();

        return response()->success(
            'this is all questions belong to your city',
            [
                "questions" => QuestionResource::collection($questions->paginate(request()->perPage ?? $questions->count())),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/question/city/{cityId}/store",
     *    operationId="StoreQuestion",
     *    tags={"Question"},
     *    summary="Add Question",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *    @OA\Parameter(
     *        name="cityId",
     *        example=1,
     *        in="path",
     *        description="City ID",
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
     *           @OA\Schema(ref="#/components/schemas/StoreQuestionRequest")
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
     *              example="question is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="question",
     *                 type="object",
     *                 ref="#/components/schemas/QuestionResource"
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
    public function store(StoreQuestionRequest $request, City $city)
    {
        $question = $city->questions()->create($request->validated());

        return response()->success(
            'question is added success',
            [
                "question" => new QuestionResource($question),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/question/{id}/show",
     *    operationId="ShowQuestion",
     *    tags={"Question"},
     *    summary="Get Question By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Question ID",
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
     *              example="this is your question"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                    property="question",
     *                    type="object",
     *                    ref="#/components/schemas/QuestionResource"
     *                 ),
     *                @OA\Property(
     *                   property="answers",
     *                   type="array",
     *                   @OA\Items(
     *                      type="object",
     *                      ref="#/components/schemas/AnswerResource"
     *                   )
     *                ),
     *              ),
     *           )
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
    public function show(Question $question)
    {
        $answers = $question->Answers();
        return response()->success(
            'this is your question',
            [
                "question" => new QuestionResource($question),
                "answers" => AnswerResource::collection($answers->paginate(request()->perPage ?? $answers->count())),
            ]
        );
    }


    /**
     * @OA\Delete(
     *    path="/api/mobile/question/{id}/delete",
     *    operationId="DeleteQuestion",
     *    tags={"Question"},
     *    summary="Delete Question By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Question ID",
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
     *              example="question is deleted success"
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
    public function destroy(Question $question)
    {
        $question->delete();

        return response()->success('question is deleted success');
    }
}
