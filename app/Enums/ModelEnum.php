<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;

enum ModelEnum: string
{
    use Values, Names, Options;

    case Place       = 'App\Models\Place';
    case City        = 'App\Models\City';
    case Experience  = 'App\Models\Experience';
}
