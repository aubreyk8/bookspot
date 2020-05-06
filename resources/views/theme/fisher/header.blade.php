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
                    <h2 style="color: white; font-weight: bold">{{ ucwords($book->title) }}</h2>
                    <h2>{{ ucwords($book->sub_title) }}</h2>
                    <p>{{ $book->description }}</p>
                    <div class="download-btn">
                        <button
                            class="btn btn-lg"
                            style="background-color: #{{ $book->theme->secondary_color }};"
                        >
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
