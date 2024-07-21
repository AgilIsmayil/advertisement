@extends('site.core.layout')

@section('content')
    <main>
        <section class="announcement px-4 py-2">
            <div class="row mt-4">
                <div class="col-12 col-md-8">
                    <div>
                        <div class="autoinfoName">
                            {{ $advertisement->car . ' ' . $advertisement->model . ' , ' . $advertisement->year . ' , ' . $advertisement->distance }},
                            2.0 L, 2018 il, 63 000 km
                        </div>
                        <<div class="f-carousel" id="myCarousel">
                          @foreach($advertisement->photos as $photo)
                            <div class="f-carousel__slide "
                                data-thumb-src="{{$photo->photo}}">
                                <a href="" data-fancybox="gallery"
                                    data-src="{{$photo->photo}}"
                                    data-caption="Caption #1">
                                    <img
                                        src="{{$photo->photo}}" />

                                </a>
                            </div>
                           @endforeach
                    </div>

                    <div>
                        <span> Yeniləndi: {{ $advertisement->updated_at }}</span>
                        <span cla>Baxışların sayı: 1435</span>
                    </div>
                    <hr />

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Şəhər</div>
                                <div class="infoAutoAboutData">{{ $advertisement->city }}</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Marka</div>
                                <div class="infoAutoAboutData">{{ $advertisement->car }}</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Model</div>
                                <div class="infoAutoAboutData">{{ $advertisement->model }}</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Buraxılış ili</div>
                                <div class="infoAutoAboutData">{{ $advertisement->year }}</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Ban növü</div>
                                <div class="infoAutoAboutData">
                                    {{ $advertisement->ban }}
                                </div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Rəng</div>
                                <div class="infoAutoAboutData">{{ $advertisement->color }}</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Benzin</div>
                                <div class="infoAutoAboutData">{{ $advertisement->fuel_type }}</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Yürüş</div>
                                <div class="infoAutoAboutData">{{ $advertisement->distance }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Sürətlər qutusu</div>
                                <div class="infoAutoAboutData">Avtomat</div>
                            </div>
                            <div class="infoAutoAbout">
                                <div class="infoAutoAboutKey">Ötürücü</div>
                                <div class="infoAutoAboutData">{{ $advertisement->gear }}</div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="">
                        @foreach ($advertisement->suppliers as $supplier)
                            <span class="badge bg-secondary">{{ $supplier->name }}</span>
                        @endforeach
                    </div>
                </div>

                <hr />
            </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="autoinfoRight">
                    <div class="autoinfoPrice">{{ $advertisement->price . ' ' . $advertisement->currency }}</div>
                    <div class="autoinfoUserBlock">
                        <div class="autoinfoUserBlockLeft">
                            <div class="autoinfoUserBlockLeftName">{{ $advertisement->creator }}</div>
                            <span class="autoinfoUserBlockLeftCountry">{{ $advertisement->city }}</span>
                            <span class="autoinfoUserBlockLeftCountry">{{ $advertisement->creator_phone }}</span>

                        </div>
                        <div class="autoinfoUserBlockRight">
                            <div class="autoinfoUserBlockIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    @push('other-css')
        <link rel="stylesheet" href="{{ asset('site-front/fancy/index.css') }}">
        {{-- Fancy Box forSlider --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.css" />
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        {{-- End of FancyBoxForSlider --}}
    @endpush

    @push('other-js')
        <script>
            Fancybox.bind('[data-fancybox="gallery"]', {});

            const container = document.getElementById("myCarousel");
            const options = {
                axis: "x",
                Dots: false,
                Thumbs: {
                    type: "modern", // have classic type
                },
            };

            new Carousel(container, options, {
                Thumbs
            });
        </script>
    @endpush
@endsection
