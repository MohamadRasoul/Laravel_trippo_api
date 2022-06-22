<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Resources\Mobile\AnswerResource;
use App\Models\Answer;
use App\Models\Question;


class AnswerController extends Controller
{
    /**
     * @OA\Post(
     *    path="/Api/mobile/answer/question/{questionId}/store",
     *    operationId="StoreAnswer",
     *    tags={"Answer"},
     *    summary="Add Answer",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *    @OA\Parameter(
     *        name="questionId",
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
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreAnswerRequest")
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
     *              example="answer is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="answer",
     *                 type="object",
     *                 ref="#/components/schemas/AnswerResource"
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
    public function store(StoreAnswerRequest $request, Question $question)
    {
        $answer = $question->answers()->create($request->validated());

        return response()->success(
            'answer is added success',
            [
                "answer" => new AnswerResource($answer),
            ]
        );
    }


    /**
     * @OA\Delete(
     *    path="/Api/mobile/answer/{id}/delete",
     *    operationId="DeleteAnswer",
     *    tags={"Answer"},
     *    summary="Delete Answer By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Answer ID",
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
     *              example="answer is deleted success"
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
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return response()->success('answer is deleted success');
    }
}
