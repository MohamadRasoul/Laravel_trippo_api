<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\Names;

enum Gender: string
{
    use Values, Names;

    case MALE = '0'; 
    case FEMALE  = '1';
}
