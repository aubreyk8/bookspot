<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title wow pulse" data-wow-delay=".5s">
                    <h2>Whats Inside</h2>
                </div>
                <hr/>
                <br/><br/>
            </div>
        </div>
        <div class="row">
            @foreach($book->topics as $topics)
                <div class="col-md-6 col-sm-6">
                    <div class="block">
                        <div class="media wow fadeInDown" data-wow-delay=".5s">
                            <span
                                class="fa fa-list pull-left"
                                style="background-color: #{{ $book->theme->icon_color }}; color: #{{ $book->theme->font_color }}; padding: 15px; font-size: 35px">
                            </span>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $topics->topic }}</h4>
                                <p>{{ $topics->brief_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
    </div>
</section>
