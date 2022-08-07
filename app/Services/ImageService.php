<?php

namespace App\Services;

use Bepsvpt\Blurhash\Facades\BlurHash;
use Intervention\Image\ImageManagerStatic as Image;



class ImageService
{
    public function storeImage(
        $model,
        $image,
        $collection,
        $customProperties = []
    ) {
        if (!empty($image)) {
            // dd($image, env('APP_URL', 'http://127.0.0.1:8000'), str_contains($image, env('APP_URL')));

            // try {
            if (str_contains($image, env('APP_URL', 'http://127.0.0.1:8000'))) {
                $image = str_replace(env('APP_URL'), "", $image);
                $mediaImage = $model
                    ->addMedia(public_path($image))
                    ->withCustomProperties($customProperties)
                    ->preservingOriginal()
                    ->toMediaCollection($collection);
            } else {
                $mediaImage = $model
                    ->addMedia(public_path('images/temporary-upload/') . $image)
                    ->withCustomProperties($customProperties)
                    ->preservingOriginal()
                    ->toMediaCollection($collection);
            };

            $image = Image::make($model->getFirstMediaPath($collection));

            $hashImage = BlurHash::encode($image);

            $mediaImage->setCustomProperty('hash', $hashImage);

            $mediaImage->save();
            // } catch (\Exception $ex) {
            //     throw $ex;
            // }
        };
    }

    public function storeStaticImage(
        $model,
        $image,
        $collection,
        $folderName
    ) {
        if (!empty($image)) {
            try {
                $model->clearMediaCollection($collection);

                $mediaImage = $model
                    ->addMedia(public_path('images/static/') . $folderName . "/" . $image)
                    ->preservingOriginal()
                    ->toMediaCollection($collection);

                $image = Image::make($model->getFirstMediaPath($collection));

                $hashImage = BlurHash::encode($image);

                $mediaImage->setCustomProperty('hash', $hashImage);

                $mediaImage->save();
            } catch (\Exception $ex) {
                throw $ex;
            }
        };
    }
}
