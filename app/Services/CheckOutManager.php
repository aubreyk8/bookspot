<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\SaleRepository;

/**
 * Class CheckOutManager
 * @package App\Services
 */
class CheckOutManager
{
    /**
     * @var SaleRepository
     */
    private SaleRepository $saleRepository;

    /**
     * CheckOutManager constructor.
     * @param SaleRepository $saleRepository
     */
    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    /**
     * @param int $book_id
     * @param int $order_id
     * @param int $sale_id
     * @return bool
     */
    public function validate(int $book_id, int $order_id, int $sale_id): bool
    {
        $sale = $this->saleRepository->find($sale_id);

        return $sale->book_id === $book_id
            && $sale->order_id === $order_id
            && $sale->id === $sale_id;
    }

    /**
     * @param int $sale_id
     * @return string
     */
    public function generateDownloadLink(int $sale_id): string
    {
        $sale = $this->saleRepository->find($sale_id)->toArray();

        if (is_null($sale['link'])) {
            $sale['link'] = Str::uuid()->toString();
            $sale = $this->saleRepository->persist($sale);
        }

        return route('download', ['id' => $sale['link']]);
    }
}
