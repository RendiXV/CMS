@extends('layouts.member')

@section('content')
    <div class="container-xxl py-5">
        <div class="container ">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Galeri</h1>
                <p>Foto Galeri {{ $kategoriGaleri->nama }}</p>
            </div>

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($galeri as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="{{ $item->gambar() }}"
                            data-caption="{{ $item->kategori_galeri->nama }}" data-fancybox="gallery">
                            <div class="rounded p-2">
                                <div class="">
                                    <img src="{{ $item->gambar() }}" class="img-fluid" alt=""
                                        style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px;">
                                </div>
                            </div>
                        </a>
                        <div class="portfolio-info">
                            <h4>{{ $item->judul }}</h4>
                            <div class="portfolio-links">
                                <a href="{{ $item->gambar() }}" data-gallery="portfolioGallery" class="portfokio-lightbox"
                                    title="{{ $item->judul }}"><i class="bi bi-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- <div class="container mt-3 py-5 mb-5">
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Galeri</h2>
                    <p>Foto Galeri {{ $kategoriGaleri->nama }}</p>
                </header>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galeri as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <a href="{{ $item->gambar() }}" data-caption="{{ $item->kategori_galeri->nama }}"
                                    data-fancybox="gallery">
                                    <img src="{{ $item->gambar() }}" class="img-fluid" alt=""
                                        style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px;">
                                </a>
                                <div class="portfolio-info">
                                    <h4>{{ $item->judul }}</h4>
                                    <div class="portfolio-links">
                                        <a href="{{ $item->gambar() }}" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title="{{ $item->judul }}"><i
                                                class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div> --}}
@endsection
