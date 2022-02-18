<?php

declare(strict_types=1);

namespace Kadirov\Component\Billing\Payment\Payme\Interfaces;

use Kadirov\Entity\PaymeTransaction;

interface PaymeAfterFinishPaymentInterface
{
    public function afterFinishPayment(PaymeTransaction $transaction): void;
}
