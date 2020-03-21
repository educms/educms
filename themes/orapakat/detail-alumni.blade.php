@extends("theme::orapakat.partials.master_")
@section('titles',"$detail->alumni_nama")
@section('content')
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Biodata Alumni</h1>
                    <p class="lead text-white">
                        {{ $detail->alumni_nama }}
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
                    @if(!is_null($detail->alumni_photo))
                    <center><img src="{{ $theme_files.$detail->alumni_photo }}" alt="Card image cap"></center>
                    @endif
                    <div class="card-body">
                        <table class="table" style="font-size:12px;">
                            <tr>
                                <td width="100">NIS / NISN</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_nis }}</td>
                            </tr>
                            <tr>
                                <td width="100">NAMA LENGKAP</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_nama }}</td>
                            </tr>
                            <tr>
                                <td width="100">TEMPAT,TGL.LAHIR</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_tempat_lahir }}, {{ FunctionStatic::tgl_indo($detail->alumni_tgl_lahir) }}</td>
                            </tr>
                            <tr>
                                <td width="100">JENIS KELAMIN</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_jk }}</td>
                            </tr>
                            <tr>
                                <td width="100">ALAMAT LENGKAP</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_alamat }}</td>
                            </tr>
                            <tr>
                                <td width="100">TAHUN MASUK</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_masuk }}</td>
                            </tr>
                            <tr>
                                <td width="100">TAHUN KELUAR</td>
                                <td>:</td>
                                <td>{{ $detail->alumni_keluar }}</td>
                            </tr>
                        </table>
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