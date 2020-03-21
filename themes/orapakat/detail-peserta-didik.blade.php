@extends("theme::orapakat.partials.master_")
@section('titles',"$detail->siswa_nama")
@section('content')
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Biodata Peserta Didik</h1>
                    <p class="lead text-white">
                        {{ $detail->siswa_nama }}
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
                    @if(!is_null($detail->siswa_photo))
                    <center><img src="{{ $theme_files.$detail->siswa_photo }}" alt="Card image cap"></center>
                    @endif
                    <div class="card-body">
                        <table class="table" style="font-size:12px;">
                            <tr>
                                <td width="100">NIS / NISN</td>
                                <td>:</td>
                                <td>{{ $detail->siswa_nis }}</td>
                            </tr>
                            <tr>
                                <td width="100">NAMA LENGKAP</td>
                                <td>:</td>
                                <td>{{ $detail->siswa_nama }}</td>
                            </tr>
                            <tr>
                                <td width="100">TEMPAT,TGL.LAHIR</td>
                                <td>:</td>
                                <td>{{ $detail->siswa_tempat_lahir }}, {{ FunctionStatic::tgl_indo($detail->siswa_tgl_lahir) }}</td>
                            </tr>
                            <tr>
                                <td width="100">JENIS KELAMIN</td>
                                <td>:</td>
                                <td>{{ $detail->siswa_jk }}</td>
                            </tr>
                            <tr>
                                <td width="100">ALAMAT LENGKAP</td>
                                <td>:</td>
                                <td>{{ $detail->siswa_alamat }}</td>
                            </tr>
                            <tr>
                                <td width="100">KELAS</td>
                                <td>:</td>
                                <td>{{ $detail->kelas_nama }}</td>
                            </tr>
                            <tr>
                                <td width="100">KETERANGAN</td>
                                <td>:</td>
                                <td>{{ $detail->siswa_keterangan }}</td>
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