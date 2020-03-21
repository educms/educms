@extends("theme::orapakat.partials.master_")
@section('titles','Semua Postingan')
@section('content')
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">POSTINGAN</h1>
                    <p class="lead text-white">
                        Semua Postingan
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
                <!-- Pagination -->                
                {{ $post->links("theme::orapakat.partials.paginate_") }}

            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection