@extends('frontend_layout.master')
@section('content')
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row" style="color: black">

                <div style="display: flex;
                flex-direction: column;">
                    <span style="width:20rem" class="h4 badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                        Terms & Conditions
                    </span>

                    <div>
                        @if (isset($terms) && count($terms) > 0)
                            @foreach ($terms as $terms)
                                @if ($terms->cmsPages == 1)
                                    {!! $terms->content !!}
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
