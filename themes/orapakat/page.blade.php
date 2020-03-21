@extends("theme::orapakat.partials.master_")
@section('titles',"$page->page_title")
@section('content')
<meta property="og:title" content="{{ $page->page_title }}"/>
    <meta property="og:url" content="{{ FunctionStatic::url_post($page->page_slug) }}"/>
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($page->page_body), $limit = 450, $end = '...') }}"/>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($page->page_body), $limit = 450, $end = '...') }}"/>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">{{ $page->page_title }}</h1>
                    <p class="lead text-white">
                        Publish on {{ FunctionStatic::tgl_indo($page->page_publish_date) }}
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
                <!-- Blog Post -->
                <div class="card mb-4">
                    @if(!is_null($page->page_image))
                    <img class="card-img-top" src="{{ $theme_files.$page->page_image }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $page->page_title }}</h2>
                        <p class="card-text">{!! $page->page_body !!}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="btn-group">
                            <a href="http://www.facebook.com/sharer/sharer.php?u={{ FunctionStatic::url_page($page->page_slug) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share Facebook</a>
                            <a href="http://twitter.com/share?url={{ FunctionStatic::url_page($page->page_slug) }}&text={{ $page->page_title }}" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i> Share Twitter</a>
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