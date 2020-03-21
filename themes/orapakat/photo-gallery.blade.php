@extends("theme::orapakat.partials.master_")
@section('titles','Galeri Foto')
@section('content')
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Galeri Foto</h1>
                    <p class="lead text-white">
                        Semua Album Galeri Foto/Kegiatan
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
                <div class="card-columns">
                @foreach($photo as $foto)
                    <div class="card mb-3">
                        <img class="card-img-top img-fluid" src="{{ $theme_files.$foto->album_cover }}" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">{{ $foto->album_title }}</h6>
                            <a href="{{ FunctionStatic::url_photo($foto->album_slug) }}" class="btn btn-sm btn-info">Selengkapnya <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="card-footer text-muted">
                            Publish on {{ FunctionStatic::tgl_indo($foto->album_publish_date) }}
                        </div>
                    </div>
                @endforeach
                </div>
                <!-- Pagination -->
                {{ $photo->links("theme::orapakat.partials.paginate_") }}

            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection