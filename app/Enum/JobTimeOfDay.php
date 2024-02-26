<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;
enum JobTimeOfDay: string implements HasLabel
{
    case EARLY_AM = "Early AM";
    case DAYTIME = 'Daytime';
    case EVENING = 'Evening';
    case NIGHT   = 'Night';

    public function getLabel(): ?string
    {
        return $this->name;
    }

}
