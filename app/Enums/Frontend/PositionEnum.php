<?php

namespace App\Enums\Frontend;

enum PositionEnum: string
{
    case TOP = 'top';
    case BOTTOM = 'bottom';
    case LEFT = 'left';
    case RIGHT = 'right';
    case NONE = 'none';
    case MIDDLE = 'middle';
    case HEADER = 'header';
    case FOOTER = 'footer';
    case BACKGROUND = 'background';
    case SIDEBAR = 'sidebar';

    case TOP_REGISTER = 'top_register';
    case TOP_LOGIN = 'top_login';

    public function getLabel(): string
    {
        return match ($this) {
            self::TOP => __('top'),
            self::BOTTOM => __('bottom'),
            self::LEFT => __('left'),
            self::RIGHT => __('right'),
            self::NONE => __('none'),
            self::MIDDLE => __('middle'),
            self::HEADER => __('header'),
            self::FOOTER => __('footer'),
            self::BACKGROUND => __('background'),
            self::SIDEBAR => __('sidebar'),
            self::TOP_REGISTER => __('top_register'),
            self::TOP_LOGIN => __('top_login'),
        };
    }
}
