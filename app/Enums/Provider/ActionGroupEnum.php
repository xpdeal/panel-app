<?php

namespace App\Enums\Provider;

enum ActionGroupEnum: string
{
    case BET = 'bet';
    case BONUS = 'bonus';
    case COLLECT = 'collect';
    case FREE_RE_SPIN = 'freeReSpin';
    case FREE_SPIN = 'freeSpin';
    case SPIN = 'spin';
    case WIN = 'win';

    public function getLabel(): string
    {
        return match ($this) {
            self::BET => __('bet'),
            self::BONUS => __('bonus'),
            self::COLLECT => __('collect'),
            self::FREE_RE_SPIN => __('freeReSpin'),
            self::FREE_SPIN => __('freeSpin'),
            self::SPIN => __('spin'),
            self::WIN => __('win')
        };
    }
}
