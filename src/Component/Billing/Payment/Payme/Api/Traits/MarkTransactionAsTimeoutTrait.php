<?php

declare(strict_types=1);

namespace Kadirov\Component\Billing\Payment\Payme\Api\Traits;

use Kadirov\Component\Billing\Payment\Payme\Constants\PaymeCancelingReason;
use Kadirov\Component\Billing\Payment\Payme\Constants\PaymeTransactionState;
use Kadirov\Component\Billing\Payment\Payme\PaymeTransactionManager;
use Kadirov\Entity\PaymeTransaction;

trait MarkTransactionAsTimeoutTrait
{
    private function markTransactionAsTimeout(
        PaymeTransaction $transaction,
        PaymeTransactionManager $transactionManager
    ): void {
        $transaction->setState(PaymeTransactionState::CANCELED);
        $transaction->setCancelTime(time());
        $transaction->setReason(PaymeCancelingReason::TIMEOUT);
        $transactionManager->save($transaction, true);
    }
}
