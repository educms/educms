@extends("theme::orapakat.partials.master_")
@section('titles',"$detail->album_title")
@section('content')
<link href="{{ $theme_asset }}css/lightgallery.min.css" rel="stylesheet">
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Galeri Foto</h1>
                    <p class="lead text-white">
                        {{$detail->album_title}}
                    </p>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4"></h1>
                <div class="card mb-3">
                    <img class="card-img-top img-fluid" src="{{ $theme_files.$detail->album_cover }}" alt="Card image cap">
                </div>
                <div class="card-columns" id="lightgallery">
                @foreach($thumb as $tmb)
                    @if(!empty($tmb))
                    <div class="card mb-3" data-responsive="{{ $theme_files.$tmb }}" data-src="{{ $theme_files.$tmb }}">
                        <img class="card-img-top img-fluid" src="{{ $theme_files.$tmb }}" alt="Galeri Foto">
                    </div>
                    @endif
                @endforeach
                </div>
                <div class="card-footer">
                    <div class="btn-group">
                        <a href="http://www.facebook.com/sharer/sharer.php?u={{ FunctionStatic::url_photo($detail->album_slug) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share Facebook</a>
                        <a href="http://twitter.com/share?url={{ FunctionStatic::url_photo($detail->album_slug) }}&text={{ $detail->album_title }}" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i> Share Twitter</a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <script src="{{ $theme_asset }}js/lightgallery.js"></script>
    <script>
        $(document).ready(function(){
            $('#lightgallery').lightGallery(); 
        });
    </script>
@endsection