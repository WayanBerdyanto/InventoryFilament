<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentMethod: string implements HasColor, HasIcon, HasLabel
{
    case Dana = 'dana';

    case Cash = 'cash';

    case Shopee = 'shopee';

    case Ovo = 'ovo';

    case Qris = 'qris';

    public function getLabel(): string
    {
        return match ($this) {
            self::Dana => 'Dana',
            self::Cash => 'Cash',
            self::Shopee => 'Shopee',
            self::Ovo => 'Ovo',
            self::Qris => 'Qris',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Dana => 'info',
            self::Cash => Color::Gray,
            self::Shopee => Color::Orange,
            self::Ovo => Color::Purple,
            self::Qris => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Dana => 'heroicon-m-sparkles',
            self::Cash => 'heroicon-m-circle-stack',
            self::Shopee => 'heroicon-c-shopping-bag',
            self::Ovo => 'heroicon-m-check-badge',
            self::Qris => 'heroicon-m-x-circle',
        };
    }
}
