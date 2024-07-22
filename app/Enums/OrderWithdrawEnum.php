<?php

namespace App\Enums;

enum OrderWithdrawEnum: string
{
    case WAITING = 'waiting';
    case COMPLETED = 'completed';
    case REFUNDED = 'refunded';
    case CANCELED = 'canceled';

    public function getLabel(): string
    {
        return match ($this) {
            self::WAITING => __('deposit_waiting'),
            self::REFUNDED => __('deposit_refunded'),
            self::COMPLETED => __('deposit_completed'),
            self::CANCELED => __('deposit_canceled')
        };
    }
}
