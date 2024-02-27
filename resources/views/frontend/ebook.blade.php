@extends('frontend_layout.master')
@section('content')
    <div class="col-12 p-4">

        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Top eBooks</h4>
        </div>

    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="row p-4">

            @php
                $count = 1;
            @endphp
            @if (isset($E_Book) && count($E_Book) > 0)
                @foreach ($E_Book as $Special)
                    @if (!empty($Special->category) && !empty($Special->E_BookRelation) && count($Special->E_BookRelation) > 0)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <div class="accordion-item">

                                    <h2 class="accordion-header" id="flush-heading{{ $count }}">
                                        <button class="accordion-button collapsed rounded text-light"
                                            style="background-color: rgb(92, 92, 255);" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $count }}"
                                            aria-expanded="false" aria-controls="flush-collapse{{ $count }}">

                                            {{ $Special->category }}

                                        </button>
                                    </h2>

                                    <div id="flush-collapse{{ $count }}" class="accordion-collapse collapse"
                                        style="width: 100%; position: relative; z-index: 1; background: rgb(240, 240, 240);"
                                        aria-labelledby="flush-heading{{ $count }}"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <table class="table rounded">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Special->E_BookRelation as $item)
                                                        @php
                                                        @endphp
                                                        @if (!empty($item->title))
                                                            <tr>
                                                                <div class="container-fluid mb-3">
                                                                    <div class="container">
                                                                        <div
                                                                            class="owl-carousel news-carousel carousel-item-4 position-relative">
                                                                            <div class="position-relative overflow-hidden"
                                                                                style="height: 300px; width: 150px;">
                                                                                <img class="img-fluid h-100"
                                                                                    src="{{ asset('E_bookThumbnail/' . $item->thumbnail) }}"
                                                                                    style="object-fit: cover; width: 70rem;">
                                                                                <div class="overlay">
                                                                                    <div class="mb-2">
                                                                                    </div>
                                                                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                                                                        target="_blank"
                                                                                        href="{{ $item->drive }}">{{ $item->title }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach
            @endif

        </div>
    </div>

@endsection
