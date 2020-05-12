<?php

namespace App\Services\Payment;

use Illuminate\View\View;

/**
 * Class PayFastPaymentManager
 * @package App\Services\Payment
 */
class PayFastPaymentManager implements PaymentInterface
{
    /**
     * @param int $book_id
     * @return View
     * @throws \Throwable
     */
    public function render(int $book_id): View
    {
        return View('theme.fisher.payfast')->render();
    }
}
