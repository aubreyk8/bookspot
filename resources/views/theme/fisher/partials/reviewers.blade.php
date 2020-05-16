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
            <div class="row message-section-lg">
                @foreach($book->reviewer as $reviewer)
                    <div class="
                        @if(count($book->reviewer) === 1)col-sm-12 col-md-4 col-md-offset-4
                        @elseif(count($book->reviewer) === 2) col-sm-12 col-md-6
                        @elseif(count($book->reviewer) === 3) col-sm-12 col-md-4
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
            <div class="row message-section-lg">
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
            <div class="row message-section-ms">
                @foreach($book->reviewer as $reviewer)
                    <div class="col-sm-12">
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
                                {{ $reviewer->message }}
                            </div>
                        </div>
                        <div class="clearfix"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
<style>
    .message-section-ms {
        display: none;
    }
    @media only screen and (max-width: 600px) {
        .message-section-lg {
            display: none;
        }

        .message-section-ms {
            display: block;
        }
    }
</style>
@endif
