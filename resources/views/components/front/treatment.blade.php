<section class="treatment_section layout_padding">
    <div class="side_img">
        <img src="{{ asset('assets') }}/images/treatment-side-img.jpg" alt="">
    </div>
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Hospital <span>Treatment</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($treatments as $treatment)
                @if ($treatment->status)
                    <div class="col-md-6 col-lg-3">
                        <div class="box">
                            <div class="img-box">
                                @if ($treatment->image)
                                    <img src="{{ asset('storage/' . $treatment->image) }}" alt="Treatment Image">
                                @endif
                            </div>
                            <div class="detail-box">
                                <h4>
                                    {{ $treatment->title }}
                                </h4>
                                <p>
                                    {{ $treatment->description }}
                                </p>
                                <a href="">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
