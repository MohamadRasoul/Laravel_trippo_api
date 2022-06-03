<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;
use ArchTech\Enums\Names;

enum GenderEnum: string
{
    use InvokableCases, Values, Names;

    case MALE = 'male'; 
    case FEMALE  = 'female';
}
