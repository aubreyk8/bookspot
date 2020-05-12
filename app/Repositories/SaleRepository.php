<?php

namespace App\Repositories;

use App\Models\Sale;

/**
 * Class SaleRepository
 * @package App\Repositories
 */
class SaleRepository extends BaseRepository
{
    protected string $prototype = Sale::class;
}
