<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;
use App\Services\CheckOutManager;
use App\Http\Requests\CheckOutRequest;

/**
 * Class CheckOutController
 * @package App\Http\Controllers
 */
class CheckOutController extends Controller
{
    /**
     * @param CheckOutRequest $request
     * @param CheckOutManager $checkOutManager
     * @return View
     */
    public function complete(CheckOutRequest $request, CheckOutManager $checkOutManager): View
    {
        $validation = $checkOutManager->validate(
            base64_decode($request->input('book_id')),
            base64_decode($request->input('order_id')),
            base64_decode($request->input('sale_id'))
        );

        if (!$validation) {
            return redirect()->back();
        }

        $book = Book::find(base64_decode($request->input('book_id')));

        $downloadLink = $checkOutManager->generateDownloadLink(base64_decode($request->input('sale_id')));

        return view('theme.fisher.download', compact('book', 'downloadLink'));
    }
}
