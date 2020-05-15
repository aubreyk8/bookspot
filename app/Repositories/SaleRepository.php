<?php

namespace App\Repositories;

use App\Models\Sale;
use Orchid\Attachment\Models\Attachment;

/**
 * Class SaleRepository
 * @package App\Repositories
 */
class SaleRepository extends BaseRepository
{
    protected string $prototype = Sale::class;

    /**
     * @param string $link
     * @return Attachment
     */
    public function getDownload(string $link): Attachment
    {
        $sale = Sale::where('link', $link)->get()->first();
        $sale->downloads = isset($sale->downloads) ? $sale->downloads ++ : 1;
        $sale->save();

        return $sale->book->attachment()->get()->last();
    }
}