<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Answer;


class AnswerController extends Controller
{


     /**
      * @OA\Delete(
      *    path="/api/dashboard/answer/{id}/delete",
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
