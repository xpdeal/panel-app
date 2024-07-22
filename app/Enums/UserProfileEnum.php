<?php

namespace App\Enums;

enum UserProfileEnum: string
{
    case PROFILE_KEY_COUNTRY = 'country';
    case PROFILE_KEY_CURRENCY = 'currency';
    case PROFILE_KEY_LANGUAGE = 'language';
    case PROFILE_KEY_PHONE_NUMBER = 'phone_number';
    case PROFILE_KEY_TAX_ID = 'tax_id';
    case PROFILE_KEY_TAX_ID_TYPE = 'tax_id_type';

    public function label(): string
    {
        return match ($this) {
            self::PROFILE_KEY_COUNTRY => __('country'),
            self::PROFILE_KEY_CURRENCY => __('currency'),
            self::PROFILE_KEY_LANGUAGE => __('language'),
            self::PROFILE_KEY_PHONE_NUMBER => __('phone_number'),
            self::PROFILE_KEY_TAX_ID => __('tax_id'),
            self::PROFILE_KEY_TAX_ID_TYPE => __('tax_id_type'),
        };
    }
}
