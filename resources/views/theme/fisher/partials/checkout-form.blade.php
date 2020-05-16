<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title wow pulse" data-wow-delay=".5s">
                    <h2>Check Out</h2>
                </div>
                <hr/>
                <br/><br/>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'checkout.cancelled')
            <div class="alert alert-danger text-center">
                Checkout process has been cancelled, please click pay now to try again!
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <th>Book</th>
                        <th>Price</th>
                        <th>Author</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>R{{ $book->price }}</td>
                            <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-center">
                                @inject('payment', 'App\Services\Payment\PayFastPaymentManager')
                                {!! $payment->render($book->id) !!}
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
