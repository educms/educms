@extends("theme::orapakat.partials.master_")
@section('titles','Alumni')
@section('content')
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Alumni</h1>
                    <p class="lead text-white">
                        Semua Alumni
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
                <div class="row">
                @foreach($alumni as $didik)
                <!-- Blog Post -->
                <div class="col-sm-6">
                    <a href="{{ FunctionStatic::url_alumni($didik->alumni_slug) }}" class="links_directori">
                    <div class="card px-2 my-2">
                        <div class="row">
                            <div class="col-sm-3 p-3">
                                @if(!is_null($didik->alumni_photo))
                                <img class="w-100" src="{{ $theme_files.$didik->alumni_photo }}" alt="Card image cap">
                                @endif
                            </div>
                            <div class="col-sm-9 p-3">
                                <small class="font-weight-bold">{{ $didik->alumni_nama }}</small><br />
                                <small>{{ $didik->alumni_masuk }} - {{ $didik->alumni_keluar }}</small>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                </div>
                <!-- Pagination -->                
                {{ $alumni->links("theme::orapakat.partials.paginate_") }}

            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection