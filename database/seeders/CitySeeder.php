<?php

namespace Database\Seeders;

use App\Models\City;
use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{


    public function run()
    {
        $cities = [
            [
                'name'         => 'Aleppo',
                'description'   => 'Aleppo is one of the oldest continuously inhabited cities in the world; it may have been inhabited since the sixth millennium BC.[11] Excavations at Tell as-Sawda and Tell al-Ansari, just south of the old city of Aleppo, show that the area was occupied by Amorites by the latter part of the third millennium BC.[12] That is also the time at which Aleppo is first mentioned in cuneiform tablets unearthed in Ebla and Mesopotamia, which speak of it as part of the Amorite state of Yamhad, and note its commercial and military importance.[13] Such a long history is attributed to its strategic location as a trading center between the Mediterranean Sea and Mesopotamia.',
                'latitude'   => '36.201696',
                'longitude'  => '37.136989',
                "image_main"   => "https://ichef.bbci.co.uk/news/624/cpsprodpb/1645D/production/_92692219_syria_aleppo_g.jpg",
                "image1"       => "https://youimg1.tripcdn.com/target/100u11000000q9oys0259_C_640_320_Q70.jpg_.webp?proc=source%2Ftrip",
                "image2"       => "https://media.gettyimages.com/photos/syria-aleppo-bab-alfaraj-clock-tower-picture-id668763563?s=612x612",
                "image3"       => "https://media.gettyimages.com/photos/syria-aleppo-bab-alfaraj-clock-tower-picture-id668763563?s=612x612",
            ],
            [
                'name'         => 'Damascus',
                'description'  => 'Damascus is one of the oldest continuously inhabited cities in the world.[11] First settled in the 3rd millennium BC, it was chosen as the capital of the Umayyad Caliphate from 661 to 750. After the victory of the Abbasid dynasty, the seat of Islamic power was moved to Baghdad. Damascus saw its importance decline throughout the Abbasid era, only to regain significant importance in the Ayyubid and Mamluk periods. Today, it is the seat of the central government of Syria. As of September 2019, eight years into the Syrian Civil War, Damascus was named the least livable city out of 140 global cities in the Global Liveability Ranking.',
                'latitude'  => '33.513797',
                'longitude'  => '36.277427',
                "image_main"   => "https://cdn.britannica.com/91/177991-050-D8667CD8/Umayyad-Mosque-Damascus.jpg",
                "image1"       => "https://www.gpsmycity.com/img/gd/4429.jpg",
                "image2"       => "https://i.pinimg.com/originals/71/dd/70/71dd70cc17e9c112208af1f0a7d37619.jpg",
                "image3"       => "https://i.pinimg.com/originals/71/dd/70/71dd70cc17e9c112208af1f0a7d37619.jpg",

            ],
            [
                'name'        => 'Homs',
                'description'  => 'Homs did not emerge into the historical record until the 1st century BCE at the time of the Seleucids. It later became the capital of a kingdom ruled by the Emesene dynasty who gave the city its name. Originally a center of worship for the sun god El-Gabal, it later gained importance in Christianity under the Byzantines. Homs was conquered by the Muslims in the 7th century and made capital of a district that bore its current name. Throughout the Islamic era, Muslim dynasties contending for control of Syria sought after Homs due to the city\'s strategic position in the area. Homs began to decline under the Ottomans and only in the 19th century did the city regain its economic importance when its cotton industry boomed. During French Mandate rule, the city became a center of insurrection and, after independence in 1946, a center of Baathist resistance to the first Syrian governments. During the Syrian civil war, much of the city was devastated due to the Siege of Homs; reconstruction to affected parts of the city is underway with major reconstruction beginning in 2018.',
                'latitude'  => '34.728042',
                'longitude'  => '36.7125393',
                "image_main"  => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHH6cUv0npKN30gvjuoK0X_sd-vnlFDx-BWw&usqp=CAU",
                "image1"      => "https://c8.alamy.com/comp/C2H6A9/homs-syria-syrian-old-middle-east-town-city-C2H6A9.jpg",
                "image2"      => "https://media.wsimag.com/attachments/896863cf53df5081d41fbe9488efda26b9cd3b7e/store/fill/410/308/a64c7565f69543b97382e52a578f2f4dd0d42ef52e3eead759ecb079d94d/Building-in-Homs-Before-dot-dot-dot.jpg",
                "image3"      => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHH6cUv0npKN30gvjuoK0X_sd-vnlFDx-BWw&usqp=CAU",
            ],
        ];

        foreach ($cities as $city) {
            $newCity = City::create([
                'name'      => $city['name'],
                'description'  => $city['description'],
                'latitude'  => $city['latitude'],
                'longitude' => $city['longitude'],
            ]);

            (new ImageService)->storeUrlImage(
                model: $newCity,
                image: $city['image_main'],
                collection: 'city',
            );
            // (new ImageService)->storeUrlImage(
            //     model: $newCity,
            //     image: 'https://source.unsplash.com/random/?city',
            //     collection: 'city_admin',
            // );
            // (new ImageService)->storeUrlImage(
            //     model: $newCity,
            //     image: $city['image2'],
            //     collection: 'city_admin',
            // );
            // (new ImageService)->storeUrlImage(
            //     model: $newCity,
            //     image: $city['image3'],
            //     collection: 'city_admin',
            // );
        };

        // \App\Models\City::factory(5)->create()
        //     ->each(
        //         function ($city) {
        //             (new ImageService)->storeUrlImage(
        //                 model: $city,
        //                 image: 'https://source.unsplash.com/random/?travel,city',
        //                 collection: 'city',
        //             );
        //             (new ImageService)->storeUrlImage(
        //                 model: $city,
        //                 image: 'https://source.unsplash.com/random/?travel,city',
        //                 collection: 'city_admin',
        //             );
        //             (new ImageService)->storeUrlImage(
        //                 model: $city,
        //                 image: 'https://source.unsplash.com/random/?travel,city',
        //                 collection: 'city_admin',
        //             );
        //             (new ImageService)->storeUrlImage(
        //                 model: $city,
        //                 image: 'https://source.unsplash.com/random/?travel,city',
        //                 collection: 'city_admin',
        //             );
        //         }
        //     );
    }
}
