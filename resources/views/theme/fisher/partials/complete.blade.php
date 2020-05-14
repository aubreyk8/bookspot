<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title wow pulse" data-wow-delay=".5s">
                    <h2>Thank you</h2>
                </div>
                <hr/>
                <br/><br/>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success text-center">
                Thank you the order. Please fill in your email address below and we will send you a download link.
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3">
                <form method="post" action="{{ route('checkout.complete') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <label for="email" class="col-form-label form-label">E-mail</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required/>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 text-center">
                            <button type="submit" class="btn btn-success button-style"><span class="fa fa-book"></span>
                                Send Me A Download Link
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="{{ base64_encode($order->id) }}"/>
                    <input type="hidden" name="book_id" value="{{ base64_encode($book->id) }}">
                    <input type="hidden" name="sale_id" value="{{ base64_encode($sale->id) }}">
                </form>
            </div>
        </div>
    </div>
</section>
<style>

    @media screen and (max-width: 800px) {

        .form-label {
            float: left;
            display: block
        }

        .button-style {
            margin-top: 10px;
        }
    }
</style>
