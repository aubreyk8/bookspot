<?php

namespace App\Repositories;

use App\Models\Order;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository extends BaseRepository
{
    /**
     * @var string
     */
    public string $prototype = Order::class;

    /**
     * @param int $id
     * @return Order
     */
    public function createOrderFromBook(int $id): Order
    {
        return $this->persist([
            'book_id' => $id,
        ]);
    }
}
