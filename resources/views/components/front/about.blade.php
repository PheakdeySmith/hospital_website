@foreach ($abouts as $about)
    @if ($about->status)
        <section class="about_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            @if ($about->image)
                                <img src="{{ asset('storage/' . $about->image) }}" alt="About Image">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    About <span>{{ $about->title }}</span>
                                </h2>
                            </div>
                            <p>
                                {{ $about->description }}
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach
