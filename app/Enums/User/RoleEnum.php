<?php

namespace App\Enums\User;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case STAFF = 'staff';
    case MANAGER = 'manager';
    case PLAYER = 'player';
    case PARTNER = 'partner';
    case SUB_PARTNER = 'sub_partner';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => __('role.admin'),
            self::PLAYER => __('role.player'),
            self::PARTNER => __('role.partner'),
            self::SUB_PARTNER => __('role.sub_partner'),
        };
    }
}
