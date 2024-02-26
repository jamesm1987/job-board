<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum JobHours: string implements HasLabel
{
    case 0_16 = '0-16 hours per week';
    case 17_31 = '17-31 hours per week';
    case 31_PLUS = '31+ hours per week';

    public function getLabel(): ?string
    {
        return $this->name;
        
        // or
    
        return match ($this) {
            self::0_16 => '0-16 hours per week',
            self::17_31 => '17-31 hours per week',
            self::31_PLUS => '31+ hours per week',
        };
    }

}
