<?php

namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case WRITER = 'writer';
    case EDITOR = 'editor';
    case USER_MANAGER = 'user-manager';

    public function label(): string
    {
        return match ($this) {
            self::WRITER => 'Writers',
            self::EDITOR => 'Editors',
            self::USER_MANAGER => 'User Managers',
            self::ADMIN => 'Admin',
        };
    }
}
