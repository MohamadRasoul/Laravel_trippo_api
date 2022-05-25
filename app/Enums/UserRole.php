<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;

enum UserRole: STRING
{
    use Values, Names, Options;

    case SUPER_ADMIN         = 'Super Admin';
    case CITY_ADMIN          = 'City Admin';
    case TYPE_ADMIN          = 'Type Admin';
    case ADMIN               = 'Admin';
    case USER               = 'User';
}
