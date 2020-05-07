<section id="testimonial" style="background-color: #{{ $book->theme->primary_color }}; height: 350px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div id="owl-example" class="owl-carousel">
                        @foreach($book->testimonials as $testimonial)
                            <div>
                                <h5 style="color: #{{ $book->theme->font_color }};">
                                    “{{ $testimonial->message }}”
                                    <span>{{ $testimonial->names }} - {{ $testimonial->job_title }}</span>
                                </h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
