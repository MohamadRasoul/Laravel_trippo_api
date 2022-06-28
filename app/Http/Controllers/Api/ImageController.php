<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @OA\Post(
     *    path="/api/image/upload",
     *    operationId="UploadImage",
     *    tags={"Image"},
     *    summary="Upload Image",
     *    description="",
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                required={"image"},
     *                 @OA\Property(
     *                     description="image to upload",
     *                     property="image",
     *                     type="file",
     *                ),
     *             )
     *         )
     *    ),
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
     *              example="image is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="imageName",
     *                 example="hello.jpg"
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
    public function uploadImage(Request $request)
    {

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        $filename = time() . '-' . request()->image->getClientOriginalName();

        request()->image->move(public_path('images/temporary-upload'), $filename);

        return response()->success(
            "you image is upload",
            [
                "imageName" => $filename,
            ]
        );
    }

    public function uploadImageBase64(Request $request)
    {
        if ($request->image64) {
            $folderPath = public_path('images/temporary-upload/');
            $base64Image = explode(";base64,", $request->image64);

            $explodeImage = explode("image/", $base64Image[0]);

            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $fileName = uniqid() . '.' . $imageType;

            $file = $folderPath . $fileName;

            file_put_contents($file, $image_base64);

            return response()->success(
                "you image is upload",
                [
                    "imageName" => $fileName,
                ]
            );
        }
    }
}
