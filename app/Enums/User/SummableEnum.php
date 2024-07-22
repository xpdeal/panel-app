<?php

namespace App\Enums\User;

enum SummableEnum: string
{
    case SUM_ORDER_CASH_IN = 'sum_order_cash_in';
    case SUM_ORDER_CASH_OUT = 'sum_order_cash_out';
    case SUM_INVOICE_CASH_IN = 'sum_invoice_cash_in';
    case COUNT_ORDER_CASH_IN = 'count_order_cash_in';
    case SUM_INVOICE_CASH_OUT = 'sum_invoice_cash_out';
    case COUNT_ORDER_CASH_OUT = 'count_order_cash_out';
    case LOCK_ORDER_CASH_OUT = 'lock_order_cash_out';

    public static function exists(string $value): bool
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return true;
            }
        }

        return false;
    }

    public function label(): string
    {
        return match ($this) {
            self::SUM_ORDER_CASH_IN => __('sum_order_cash_in'),
            self::SUM_ORDER_CASH_OUT => __('sum_order_cash_out'),
            self::SUM_INVOICE_CASH_IN => __('sum_invoice_cash_in'),
            self::COUNT_ORDER_CASH_IN => __('count_order_cash_in'),
            self::SUM_INVOICE_CASH_OUT => __('sum_invoice_cash_out'),
            self::COUNT_ORDER_CASH_OUT => __('count_order_cash_out'),
            self::LOCK_ORDER_CASH_OUT => __('lock_order_cash_out'),
        };
    }
}
