@extends("theme::orapakat.partials.master_")
@section('titles',"$detail->video_title")
@section('content')
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Galeri Video</h1>
                    <p class="lead text-white">
                        {{$detail->video_title}}
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
                    <iframe src="{{ $detail->video_embed }}" style="width:100%;min-height:350px;" frameborder="0"></iframe>
                    <div class="card-body">
                    {{$detail->video_title}}
                    </div>
                    <div class="card-footer text-muted">
                        <div class="btn-group">
                            <a href="http://www.facebook.com/sharer/sharer.php?u={{ FunctionStatic::url_video($detail->video_slug) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share Facebook</a>
                            <a href="http://twitter.com/share?url={{ FunctionStatic::url_video($detail->video_slug) }}&text={{ $detail->video_title }}" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i> Share Twitter</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection