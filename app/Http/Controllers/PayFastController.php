<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Repositories\OrderRepository;
use App\Repositories\SaleRepository;

/**
 * Class PayFastController
 * @package App\Http\Controllers
 */
class PayFastController extends Controller
{
    /**
     * @param string $id
     * @param OrderRepository $orderRepository
     * @param SaleRepository $saleRepository
     * @return View
     */
    public function success(string $id, OrderRepository $orderRepository, SaleRepository $saleRepository): View
    {
        $id = base64_decode($id);
        $order = $orderRepository->find($id);

        $inputs = $order->toArray();
        $inputs['successful'] = true;
        $inputs['cancelled'] = false;

        $orderRepository->persist($inputs);

        $book = $order->book;

        if (is_null($order->sale)) {
            $saleRepository->persist([
                'book_id' => $book->id,
                'user_id' => $book->author->id,
                'order_id' => $order->id,
                'price' => $book->price,
                'expires_on' => Carbon::now()->addHours(48)->toDateTimeString()
            ]);
        }

        return view('theme.fisher.thank-you', compact('book'));
    }

    /**
     * @param string $id
     * @param OrderRepository $orderRepository
     * @return View
     */
    public function cancelled(string $id, OrderRepository $orderRepository): View
    {
        $id = base64_decode($id);
        $order = $orderRepository->find($id);

        $inputs = $order->toArray();
        $inputs['cancelled'] = true;

        $orderRepository->persist($inputs);

        $book = $order->book;

        return view('theme.fisher.checkout', compact('book'));
    }
}
