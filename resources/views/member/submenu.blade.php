@extends('layouts.member')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    <style>
        #mapid {
            min-height: 500px;
        }

        table tr th {
            text-align: center;
        }

        td {
            text-align: center;
        }
    </style>
@endsection

@section('js')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <script>
        var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }},
            {{ config('leaflet.map_center_longitude') }}
        ], {{ config('leaflet.zoom_level') }});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var markers = L.markerClusterGroup();

        axios.get('{{ route('api.peta.index') }}')
            .then(function(response) {
                var marker = L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng).bindPopup(function(layer) {
                            return layer.feature.properties.map_popup_content;
                        });
                    }
                });
                markers.addLayer(marker);
            })
            .catch(function(error) {
                console.log(error);
            });
        map.addLayer(markers);

        var theMarker;
    </script>
@endsection

@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            @if ($submenu->konten->halaman != '')
                @if ($submenu->konten->halaman->judul)
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">{{ $submenu->konten->halaman->judul }}</h1>
                        </div>
                    </div>
                @endif
                {{-- Atas --}}
                @if ($submenu->konten->halaman->atas_kiri == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->atas_kiri == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>

                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->atas_kiri == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->atas_kiri == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                @if ($submenu->konten->halaman->atas_tengah == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->atas_tengah == 'Galeri')
                            <!-- Galeri Start -->
                            <x-galeri></x-galeri>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->atas_tengah == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>

                            <div class="col">
                                <x-anggaran></x-anggaran>
                            </div>
                        @elseif ($submenu->konten->halaman->atas_tengah == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                @if ($submenu->konten->halaman->atas_kanan == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->atas_kanan == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->atas_kanan == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->atas_kanan == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif
        </div>
    </div>

    {{-- Akhir Atas --}}
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        @if ($submenu->konten->halaman->gambar != null)
                            <img class="img-fluid w-100"
                                src="{{ $submenu->konten->halaman ? $submenu->konten->halaman->gambar() : 'no_image' }}">
                        @endif
                    </div>
                </div>



                {{-- <img class="rounded" src="{{ $submenu->konten->halaman ? $submenu->konten->halaman->gambar() : 'no_image' }}"
            alt="Gambar"
            style="width: 100%; height: 500px; object-fit: cover; border-top: 5px solid blue; border-bottom: 5px solid red;"> --}}

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    @if ($submenu->konten->halaman->teks)
                        <p class="mb-4">{!! $submenu->konten->halaman->teks !!}</p>
                    @endif
                </div>


                {{-- <div class="card border-0">
            {!! $submenu->konten->halaman->teks !!}
        </div> --}}


                {{-- Tengah --}}
                @if ($submenu->konten->halaman->tengah_kiri == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->tengah_kiri == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->tengah_kiri == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>

                            <div class="col">
                                <x-anggaran></x-anggaran>
                            </div>
                        @elseif ($submenu->konten->halaman->tengah_kiri == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                @if ($submenu->konten->halaman->tengah == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->tengah == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->tengah == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->tengah == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                @if ($submenu->konten->halaman->tengah_kanan == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->tengah_kanan == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->tengah_kanan == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->tengah_kanan == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                {{-- Akhir Tengah --}}

                {{-- Bawah --}}
                @if ($submenu->konten->halaman->bawah_kiri == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->bawah_kiri == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->bawah_kiri == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->bawah_kiri == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                @if ($submenu->konten->halaman->bawah_tengah == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->bawah_tengah == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->bawah_tengah == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->bawah_tengah == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif

                @if ($submenu->konten->halaman->bawah_kanan == 'Slide')
                    <!-- Carousel Start -->
                    <div class="col">
                        <x-slide></x-slide>
                    </div>
                    <!-- Carousel End -->
                        @elseif ($submenu->konten->halaman->bawah_kanan == 'Galeri')
                            <!-- Galeri Start -->
                            <div class="col">
                                <x-galeri></x-galeri>
                            </div>
                            <!-- Galeri End -->
                        @elseif ($submenu->konten->halaman->bawah_kanan == 'Peta')
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id="mapid"></div>
                                </div>
                            </div>
                        @elseif ($submenu->konten->halaman->bawah_kanan == 'Kontak')
                            <div class="col">
                                <x-kontak></x-kontak>
                            </div>
                @endif




                {{-- Akhir Bawah --}}
            @elseif ($submenu->konten->artikel != '')
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            @if ($submenu->konten->artikel->gambar != null)
                                <img class="img-fluid w-100"
                                    src="{{ $submenu->konten->artikel ? $submenu->konten->artikel->gambar() : 'no_image' }}">
                            @endif
                        </div>
                    </div>

                    {{-- <img class="rounded" src="{{ $submenu->konten->artikel ? $submenu->konten->artikel->gambar() : 'no_image' }}"
            alt="Gambar"
            style="width: 100%; height: 500px; object-fit: cover; border-top: 5px solid blue; border-bottom: 5px solid red;"> --}}

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">{{ $submenu->konten->artikel->judul }}</h1>
                        <p class="mb-4">{!! $submenu->konten->artikel->teks !!}</p>
                    </div>
                </div>
            </div>
        </div>



        {{-- <h1 class="mt-4 text-uppercase">{{ $submenu->konten->artikel->judul }}</h1>
    <div class="card border-0">
        {!! $submenu->konten->artikel->teks !!}
    </div> --}}
    @elseif ($submenu->konten->kegiatan != '')
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    @if ($submenu->konten->kegiatan->gambar != null)
                        <img class="img-fluid w-100"
                            src="{{ $submenu->konten->kegiatan ? $submenu->konten->kegiatan->gambar() : 'no_image' }}">
                    @endif
                </div>
            </div>
            {{-- <img class="rounded" src="{{ $submenu->konten->kegiatan ? $submenu->konten->kegiatan->gambar() : 'no_image' }}"
            alt="Gambar"
            style="width: 100%; height: 500px; object-fit: cover; border-top: 5px solid blue; border-bottom: 5px solid red;"> --}}

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">{{ $submenu->konten->kegiatan->judul }}</h1>
                <p class="mb-4">{!! $submenu->konten->kegiatan->teks !!}</p>
            </div>
        </div>

        </div>
        </div>


        {{-- <h1 class="mt-4 text-uppercase">{{ $submenu->konten->kegiatan->judul }}</h1>
    <div class="card border-0">
        {!! $submenu->konten->kegiatan->teks !!}
    </div> --}}
    @else
        <h1>Tidak Ada Konten</h1>
        @endif

    @endsection
