<?php

namespace App\Services\Payment;

use App\Models\Book;
use App\Repositories\OrderRepository;
use Illuminate\View\View;

/**
 * Class PayFastPaymentManager
 * @package App\Services\Payment
 */
class PayFastPaymentManager implements PaymentInterface
{
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;

    /**
     * PayFastPaymentManager constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param int $book_id
     * @return View
     * @throws \Throwable
     */
    public function render(int $book_id): string
    {
        $book = Book::find($book_id);
        $order = $this->orderRepository->createOrderFromBook($book->id);

        return view('theme.fisher.partials.payfast', compact('book', 'order'))->render();
    }
}
