<?php

declare(strict_types=1);

namespace App\Enums;

enum MenuPositionEnum: string
{
    case SIDEBAR = 'sidebar';
    case SUBMENU = 'submenu';
    case NAVBAR = 'navbar';
    case SIDEBAR_MIDDLE = 'sidebar-middle';
    case MIDDLE = 'middle';

    case SIDEBAR_NAV = 'sidebar-nav';

    public function getLabel(): string
    {
        return match ($this) {
            self::SIDEBAR => __('sidebar'),
            self::SUBMENU => __('menu'),
            self::NAVBAR => __('navbar'),
            self::MIDDLE => __('middle'),
            self::SIDEBAR_MIDDLE => __('sidebar & categories'),
            self::SIDEBAR_NAV => __('sidebar & categories'),
            default => 'menu'
        };
    }
}
