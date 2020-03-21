@extends("theme::orapakat.partials.master_")
@section('titles',"$detail->pendidik_nama")
@section('content')
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Biodata Staf dan Tenaga Pendidik</h1>
                    <p class="lead text-white">
                        {{ $detail->pendidik_nama }}
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
                    @if(!is_null($detail->pendidik_photo))
                    <center><img src="{{ $theme_files.$detail->pendidik_photo }}" alt="Card image cap"></center>
                    @endif
                    <div class="card-body">
                        <table class="table" style="font-size:12px;">
                            <tr>
                                <td width="100">NIP</td>
                                <td>:</td>
                                <td>{{ $detail->pendidik_nip }}</td>
                            </tr>
                            <tr>
                                <td width="100">NAMA LENGKAP</td>
                                <td>:</td>
                                <td>{{ $detail->pendidik_nama }}</td>
                            </tr>
                            <tr>
                                <td width="100">TEMPAT,TGL.LAHIR</td>
                                <td>:</td>
                                <td>{{ $detail->pendidik_tempat_lahir }}, {{ FunctionStatic::tgl_indo($detail->pendidik_tgl_lahir) }}</td>
                            </tr>
                            <tr>
                                <td width="100">ALAMAT LENGKAP</td>
                                <td>:</td>
                                <td>{{ $detail->pendidik_alamat }}</td>
                            </tr>
                            <tr>
                                <td width="100">JABATAN</td>
                                <td>:</td>
                                <td>{{ $detail->pendidik_jabatan }}</td>
                            </tr>
                            <tr>
                                <td width="100">KETERANGAN</td>
                                <td>:</td>
                                <td>{{ $detail->pendidik_keterangan }}</td>
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