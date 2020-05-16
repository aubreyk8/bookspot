<?php

namespace App\Http\Controllers;

use App\Repositories\SaleRepository;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

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
     * @throws FileNotFoundException
     */
    public function download(string $id, SaleRepository $saleRepository): BinaryFileResponse
    {
        $attachment = $saleRepository->getDownload($id);

        $fileContents = Storage::disk($attachment->disk)
            ->get(
                $attachment->path .
                $attachment->name .
                '.' .
                $attachment->extension
            );

        $tempFile = storage_path('app/tmp/' . $attachment->name);

        file_put_contents($tempFile, $fileContents);

        return response()->download(
            $tempFile,
            $attachment->original_name,
            [
                'Content-Type' => $attachment->getMimeType(),
            ]
        );
    }
}
