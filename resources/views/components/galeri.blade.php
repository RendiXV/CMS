@php
    use App\Models\Tb_kategori_galeri;
    $kategoriGaleri = Tb_kategori_galeri::all();
@endphp

@foreach ($kategoriGaleri as $item)
        {{-- <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                </div>
            </div>
        </div> --}}
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href=""><img class="img-fluid" src="{{ $item->cover() }}" alt=""></a>
                                <div
                                    class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    {{ $item->nama }}</div>
                            </div>
                            <div class="p-4 pb-0">
                                {{-- <h5 class="text-primary mb-3">{{ $item->nama }}</h5> --}}
                                <a class="d-block h6 mb-2" href="galeri/{{ $item->slug }}"><span>Lihat</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endforeach

{{-- <section id="recent-blog-posts" class="recent-blog-posts">
    <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4">
                <div class="card-body">
                    @foreach ($kategoriGaleri as $item)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid" src="{{ $item->cover() }}"
                                            alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-dark mb-3">{{ $item->nama }}</h5>
                                    <a href="galeri/{{ $item->slug }}"
                                        class="d-block h5 mb-2 fs-6 readmore stretched-link mt-auto"><span>Lihat</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> --}}


{{-- ASLI --}}
{{-- <div class="card">
    <div class="container py-5 mb-5">
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Galeri</p>
                </header>
                <div class="row">
                    @foreach ($kategoriGaleri as $item)
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ $item->cover() }}" class="img-fluid" alt="">
                                </div>
                                <h3 class="post-title">{{ $item->nama }}</h3>
                                <a href="galeri/{{ $item->slug }}"class="readmore stretched-link mt-auto"><span>Lihat</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>

        </section>
    </div>
</div> --}}
