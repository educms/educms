@extends("theme::orapakat.partials.master_")
@section('titles',"Sambutan $config->config_label_kepala")
@section('content')
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Sambutan {{$config->config_label_kepala}}</h1>
                    <p class="lead text-white">
                        {{ $config->config_kepala_sekolah }}
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
                    <div class="card-body">
                            <center><img src="{{ $theme_files.$config->config_foto_kepala }}" alt="Card image cap"></center>
                            <br />
                            <p class="card-text">{!! $config->config_sambutan !!}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="btn-group">
                            <a href="http://www.facebook.com/sharer/sharer.php?u={{ url('sambutan') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share Facebook</a>
                            <a href="http://twitter.com/share?url={{ url('sambutan') }}&text=Sambutan {{$config->config_label_kepala}}" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i> Share Twitter</a>
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