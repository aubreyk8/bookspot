<header style="background-color: #0000cc">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="app-showcase wow fadeInDown" data-wow-delay=".5s">
                    <img src="{{ $book->cover_image }}" alt="{{ ucwords($book->title) }}" style="height: 450px">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="block wow fadeInRight" data-wow-delay="1s">
                    <h2 style="color: white; font-weight: bold">{{ ucwords($book->title) }}</h2>
                    <h2>Being Productive.</br>Manage Your Life Day to Day</h2>
                    <p>{{ $book->description }}</p>
                    <div class="download-btn">
                        <button class="btn btn-lg" style="background-color: gold;">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
