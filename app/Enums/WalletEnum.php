<?php

namespace App\Enums;

enum WalletEnum: string
{
    case DEFAULT = 'default';
    case BOUNTY = 'bounty';
    case POINT = 'point';
    case AFFILIATE = 'affiliate';

    public function getLabel(): string
    {
        return match ($this) {
            self::DEFAULT => __('wallet.default'),
            self::BOUNTY => __('wallet.bounty'),
            self::POINT => __('wallet.point'),
            self::AFFILIATE => __('wallet.affiliate'),
        };
    }
}
