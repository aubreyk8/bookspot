<header style="background-color: #{{ $book->theme->primary_color }}">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="app-showcase wow fadeInDown" data-wow-delay=".5s">
                    <img
                        src="{{ $book->cover_image }}"
                        alt="{{ ucwords($book->title) }}"
                        style="height: {{ $book->theme->cover_image_height }}px"
                    />
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="block wow fadeInRight" data-wow-delay="1s">
                    <h2 style="color: #{{ $book->theme->font_color }}; font-weight: bold">{{ ucwords($book->title) }}</h2>
                    <h2 style="color: #{{ $book->theme->font_color }};">{{ ucwords($book->sub_title) }}</h2>
                    <p style="color: #{{ $book->theme->font_color }};">{{ $book->description }}</p>
                    @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() === 'publication')
                        <p
                            style="color: #{{ $book->theme->font_color }};font-weight: bold; padding-left: 15px; font-size: 20px;padding-bottom: 0px; margin-bottom: 0px;">
                            R{{ $book->price }} only
                        </p>
                        <div class="download-btn">
                            <a href="{{ route('checkout', ['slug' => $slug]) }}">
                                <img src="/images/buy-now-yellow.png" alt="Buy Now" height="80" width="200">
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
