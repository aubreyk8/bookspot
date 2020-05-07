<section id="showcase" style="background-color: #{{ $book->theme->primary_color }}; height: 400px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center wow fadeInUp" data-wow-delay=".5s">
                    <img
                        src="{{ $book->cover_image }}"
                        alt="{{ ucwords($book->title) }}"
                        height="{{ $book->theme->secondary_image_height }}"
                    >
                </div>
            </div>
        </div>
    </div>
</section>

<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title wow pulse" data-wow-delay=".5s">
                    <h2>What You Get</h2>
                    <p>
                        What You Get When You Buy This Book
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="block wow fadeInLeft" data-wow-delay=".7s">
                    <img src="/images/acrobatpdf.jpg" height="130" alt="Book Format">
                    <h3>Publication Format</h3>
                    <p>
                        This is an electronic book (eBook). Upon making payment, you will be able to download the
                        book in PDF format. You can read the book from your smartphone, tablet or personal computer.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="block wow fadeInLeft" data-wow-delay=".8s">
                    <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" height="130">
                    <h3>Publication Contents</h3>
                    <p>
                        This book is jam packed with {{ $book->topics->count() }} intuitive and inspiring chapters.
                        authored by {{ $book->author->first_name }} {{ $book->author->last_name }} recommended by many.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-sm-offset-4">
                <div class="block wow fadeInLeft" data-wow-delay="1.1s">
                    <div style="height: 80px;"></div>
                    <h3 style="color: green; font-weight: bold;">R{{ $book->price }} Only</h3>
                    <img src="/images/buy-now-yellow.png" alt="Buy Now" height="130" width="300">
                </div>
            </div>
        </div>
    </div>
</section>
