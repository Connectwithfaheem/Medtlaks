@extends('frontend_layout.master')
@section('content')

    <div class="col-12 p-4">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Top Tests</h4>
        </div>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="row p-4">

            @php
                $count = 1;
            @endphp
            @if (isset($SpecialTest) && count($SpecialTest) > 0)
                @foreach ($SpecialTest as $Special)
                    @if (!empty($Special->category) && !empty($Special->SpecialRelation) && count($Special->SpecialRelation) > 0)
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
                                                    <tr>
                                                        <th>Tests</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($Special->SpecialRelation as $item)
                                                        @php
                                                        @endphp

                                                        @if (!empty($item->title))
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ url('BlogDetail?custom_url=' . $item->blog[0]->custom_url) }}"
                                                                        class="link-primary">{{ $item->title }}</a>
                                                                </td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
