<section class="team_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>Doctors</span>
            </h2>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel team_carousel">
                @foreach ($doctors as $doctor)
                    @if ($doctor->status)
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    @if ($doctor->image)
                                        <img src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image">
                                    @endif
                                </div>
                                <div class="detail-box">
                                    <h5>{{ $doctor->first_name }}</h5>
                                    <h6>{{ $doctor->specialization }}</h6>
                                    <div class="social_box">
                                        <a href="{{ $doctor->facebook }}" target="_blank">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ $doctor->twitter }}" target="_blank">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ $doctor->linkedin }}" target="_blank">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ $doctor->instagram }}" target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
