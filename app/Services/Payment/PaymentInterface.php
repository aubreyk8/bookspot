<?php

namespace App\Services\Payment;

use Illuminate\View\View;

/**
 * Interface PaymentInterface
 * @package App\Services\Payment
 */
interface PaymentInterface
{
    public function render(int $book_id): View;
}
