<?php

namespace App\Http\Controllers;

use App\Repositories\SaleRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class DownloadController
 * @package App\Http\Controllers
 */
class DownloadController extends Controller
{
    /**
     * @param $id
     * @param SaleRepository $saleRepository
     * @return BinaryFileResponse
     */
    public function download(string $id, SaleRepository $saleRepository): BinaryFileResponse
    {
        $attachment = $saleRepository->getDownload($id);

        return response()->download(
            public_path('storage/' . $attachment->path . $attachment->name . '.' . $attachment->extension),
            $attachment->original_name,
            [
                'Content-Type' => $attachment->getMimeType(),
            ]
        );
    }
}
