<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum JobHours: string implements HasLabel
{
    case HOURS_0_16 = '0-16 hours per week';
    case HOURS_17_31 = '17-31 hours per week';
    case HOURS_31_PLUS = '31+ hours per week';

        public function getLabel(): ?string
    {
        return $this->name;
    
    }

}
