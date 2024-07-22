<?php

namespace App\Enums;

enum PromotionTypeEnum: string
{
    case DEFAULT_GIFT_CARD_AMOUNT = 'default_amount';
    case FREE_SPINS = 'free_spins';
    case CASH_BACK = 'cash_back';
    case BOUNTY_GIFT_CARD_AMOUNT = 'bounty_amount';

    public function label(): string
    {
        return match ($this) {
            self::DEFAULT_GIFT_CARD_AMOUNT => __('gift_card'),
            self::FREE_SPINS => __('free_spins'),
            self::CASH_BACK => __('cash_back'),
            self::BOUNTY_GIFT_CARD_AMOUNT => __('bounty_amount'),
            default => __('unknown')
        };
    }
}
