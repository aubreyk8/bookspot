@if(!empty($book->reviewer))
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title wow pulse" data-wow-delay=".5s">
                        <h2>Reviewers</h2>
                        <p>
                            The following reviewers highly recommends this book.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($book->reviewer as $reviewer)
                    <div class="
                        @if(count($book->reviewer) === 1) col-md-4 col-sm-6 col-md-offset-4
                        @elseif(count($book->reviewer) === 2) col-md-6 col-sm-6
                        @elseif(count($book->reviewer) === 3) col-md-4 col-sm-6
                        @endif">
                        <div class="media wow fadeInUp" data-wow-delay=".7s">
                            <img
                                class="media-object pull-left"
                                src="{{ $reviewer->image }}"
                                alt="{{ $reviewer->names }}"
                                height="170"
                            >
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{ $reviewer->names }}
                                </h4>
                                <p>
                                    {{ $reviewer->job_title }}
                                </p>
                                <p class="social-link">
                                    @if($reviewer->facebook)
                                        <a class="btn-facebook" href="{{ $reviewer->facebook }}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    @endif

                                    @if($reviewer->twitter)
                                        <a class="btn-twitter" href="{{ $reviewer->twitter }}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <br/>
                @foreach($book->reviewer as $reviewer)
                    <div class="
                        @if(count($book->reviewer) === 1) col-md-4 col-sm-6 col-md-offset-4
                        @elseif(count($book->reviewer) === 2) col-md-6 col-sm-6
                        @elseif(count($book->reviewer) === 3) col-md-4 col-sm-6
                        @endif">
                        {{ $reviewer->message }}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
