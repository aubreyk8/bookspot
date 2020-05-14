<header style="background-color: #{{ $book->theme->primary_color }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="block wow fadeInRight text-center" data-wow-delay="1s">
                    <h2 style="color: #{{ $book->theme->font_color }}; font-weight: bold">{{ ucwords($book->title) }}</h2>
                </div>
            </div>
        </div>
    </div>
</header>
