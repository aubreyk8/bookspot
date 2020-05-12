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
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <th>Order No</th>
                        <th>Book</th>
                        <th>Price</th>
                        <th>Author</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-sm-1">12345</td>
                            <td>{{ $book->title }}</td>
                            <td>R{{ $book->price }}</td>
                            <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                @inject('payment', 'App\Services\Payment\PayFastPaymentManager')
                                {!! $payment->render($book->id) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
