<?php

namespace App\Enums;

enum UserSummaryEnum: string
{
    case SCORE = 'score';
    case CPA_QUALIFIED = 'cpa_qualified';
    case FIRST_DEPOSIT = 'first_deposit';
    case BAN = 'ban';
    case WITHDRAW_QUALIFIED = 'withdraw_qualified';
    case PROXY_DETECTED = 'proxy_detected';
    case MULTI_ACCOUNT_DETECTED = 'multi_account_detected';
    case TOTAL_ROUND = 'total_round';
    case TOTAL_SUM_ROUND = 'total_sum_round';
    case BOUNTY_COMPLETED = 'bounty_completed';
    case BOUNTY_FULFILLED = 'bounty_fulfilled';
    case TOTAL_CASH_IN = 'total_cash_in';
    case TOTAL_CASH_OUT = 'total_cash_out';
    case TOTAL_WIN = 'total_win';
    case TOTAL_SUM_WIN = 'total_sum_win';
    case COUNT_CASH_IN = 'count_cash_in';
    case COUNT_CASH_OUT = 'count_cash_out';
    case COUNT_REFERRAL = 'count_referral';
    case TOTAL_SUM_CPA = 'total_sum_cpa';
    case TOTAL_SUM_REVENUE = 'total_sum_revenue';

    public function getLabel(): string
    {
        return match ($this) {
            self::SCORE => 'Score',
            self::CPA_QUALIFIED => 'CPA Qualified',
            self::FIRST_DEPOSIT => 'First Deposit',
            self::BAN => 'Ban',
            self::WITHDRAW_QUALIFIED => 'Withdraw Qualified',
            self::PROXY_DETECTED => 'Proxy Detected',
            self::MULTI_ACCOUNT_DETECTED => 'Multi Account Detected',
            self::TOTAL_ROUND => 'Total Round',
            self::TOTAL_SUM_ROUND => 'Total Sum Round',
            self::BOUNTY_COMPLETED => 'Bounty Completed',
            self::BOUNTY_FULFILLED => 'Bounty Fulfilled',
            self::TOTAL_CASH_IN => 'Total Cash In',
            self::TOTAL_CASH_OUT => 'Total Cash Out',
            self::TOTAL_WIN => 'Total Win',
            self::TOTAL_SUM_WIN => 'Total Sum Win',
            self::COUNT_CASH_IN => 'Count Cash In',
            self::COUNT_CASH_OUT => 'Count Cash Out',
            self::COUNT_REFERRAL => 'Count Referral',
            self::TOTAL_SUM_CPA => 'Total Sum CPA',
            self::TOTAL_SUM_REVENUE => 'Total SumRevenue',
        };
    }
}
