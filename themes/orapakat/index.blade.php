@extends("theme::orapakat.partials.master_")
@section('titles',"$config->config_title_web")
@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($slider as $key => $sld)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="@if($key == '0') active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
                @foreach($slider as $key => $sldr)
                <div class="carousel-item @if($key == '0') active @endif" style="background-image: url('{{ $theme_files.$sldr->slider_image }}')">
                    <div class="black-overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">{{ $sldr->slider_title }}</h2>
                    <p class="lead">{{ $sldr->slider_description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4"></h1>
                @foreach($post as $posting)
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-body">
                            @if(!is_null($posting->post_image))
                            <img class="w-100" src="{{ $theme_files.$posting->post_image }}" alt="Card image cap">
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h4 class="card-title text-bold">{{ $posting->post_title }}</h4>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($posting->post_body), $limit = 200, $end = '...') }}</p>
                                <a href="{{ FunctionStatic::url_post($posting->post_slug) }}" class="btn btn-sm btn-info">Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Publish on {{ FunctionStatic::tgl_indo($posting->post_publish_date) }}
                    </div>
                    
                    
                </div>
                @endforeach
                <div class="text-center justify-content-center mb-4">
                    <a href="{{ url('postingan') }}" class="btn btn-info"> Lihat Lebih Banyak Postingan </a>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection