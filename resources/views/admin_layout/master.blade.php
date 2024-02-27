@include('admin_layout.header_asset')

<body>
    <div id="app" class="">
        <div class="main-wrapper main-wrapper-1">
            @include('admin_layout.header')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                @yield('content')

                            </div>

                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>

</body>

</html>
@include('admin_layout.footer')
@include('admin_layout.footer_asset')
