<?php

namespace App\Enums;

enum CastOptionEnum: string
{
    case BOOLEAN = 'boolean';
    case INTEGER = 'integer';
    case STRING = 'string';
    case ARRAY = 'array';
    case OBJECT = 'object';
    case JSON = 'json';

    public function getLabel(): string
    {
        return match ($this) {
            self::BOOLEAN => __('boolean'),
            self::INTEGER => __('integer'),
            self::STRING => __('string'),
            self::ARRAY => __('array'),
            self::OBJECT => __('object'),
            self::JSON => __('json'),
        };
    }
}
