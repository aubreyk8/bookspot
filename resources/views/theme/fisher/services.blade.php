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
                    <h2>Useful Tools For Your Life</h2>
                    <p>
                        Our platform is used for help people to reach their success day by day
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="block wow fadeInLeft" data-wow-delay=".7s">
                    <img src="/images/calender.png" alt="">
                    <h3>Daily Based</h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="block wow fadeInLeft" data-wow-delay=".8s">
                    <img src="/images/clock.png" alt="">
                    <h3>Timeline & Milestone</h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="block wow fadeInLeft" data-wow-delay="1.1s">
                    <img src="/images/user.png" alt="">
                    <h3>Community Support</h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
