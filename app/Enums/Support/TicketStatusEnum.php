<?php

declare(strict_types=1);

namespace App\Enums\Support;

enum TicketStatusEnum: string
{
    case OPEN = 'open';
    case CLOSE = 'close';
    case WAITING = 'waiting';

    public function getLabel(): string
    {
        return match ($this) {
            self::OPEN => __('sidebar'),
            self::CLOSE => __('menu'),
            self::WAITING => __('navbar'),
        };
    }
}
