<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;

enum AdminPermission: int
{
    use Values, Names, Options;

    case CITY_All                = 10000;
    case CATEGORY_All            = 10100;
    case CITIZEN_SERVICE_All     = 10200;
    case SERVICE_PRICE_All       = 10300;
    case TRANSFORM_ACTION_All    = 10400;
    case USER_POINT_All          = 10500;
    case UPDATE_VIEWS_LIKES_All  = 10600;
    case AD_All                  = 10700;
    case FAVORITE_SYRIA_ALL      = 10800;
    case FAVORITE_CITY_ALL       = 10900;

    case SERVICE_ACCESS          = 20001;
    case SERVICE_CREATE          = 20002;
    case SERVICE_UPDATE          = 20003;
    case SERVICE_DELETE          = 20004;
    case SERVICE_DATA_UPLOAD     = 20005;

    case SEND_NOTIFICATION       = 20000;

    case SUBSCRIPTION            = 20100;

    case ADD_ADMIN               = 30000;
}
