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
}
