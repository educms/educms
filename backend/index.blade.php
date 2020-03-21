@extends('backend::partials.master')
@section('titles','Dashboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-8">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">
                            README
                        </h3>
                    </div>
                    <div class="card-body">
                        CMS ini didesign untuk website sekolah baik SD SMP maupun SMA sederajat, dengan beberapa fitur pada umumnya yakni:
                        <ul>
                          <li><b>Post</b> : untuk membuat berita atau artikel</li>
                          <li><b>Page</b> : untuk membuat halaman</li>
                          <li><b>Slider</b> : untuk menambahkan gambar bergerak (slide) pada halaman utama website</li>
                          <li><b>Link</b> : untuk menambahkan situs penting</li>
                          <li><b>Media Sosial</b> : untuk menambahkan url media sosial sekolah (Facebook,Twitter,Youtube, dll..)</li>
                          <li><b>Photo Gallery</b> : untuk menambahkan album foto kegiatan/ foto lainnya</li>
                          <li><b>Video</b> : untuk menambahkan video kegiatan/ video lainnya, hanya tersedia untuk url youtube saja.</li>
                          <li><b>Staf dan Tenaga Pendidik</b> : untuk menambahkan list/daftar biodata dari staf dan tenaga pendidik</li>
                          <li><b>Peserta Didik</b> : untuk menambahkan list/daftar biodata dari peserta didik</li>
                          <li><b>Alumni</b> : untuk menambahkan list/daftar biodata dari alumni</li>
                        </ul>
                        Selain fitur diatas anda juga bisa membuat dan mengubah menu secara mandiri di <b>Menu Editor</b>. selain itu juga anda juga bisa merubah nama website, no.telp, alamat email, tema website dan juga logo website di konfigurasi <b>General</b>.
                        <p>CMS ini akan kami kembangkan secara berkala sesuai dengan perkembangan sekolah. apabila anda ingin ikut usul apa saja yang harus dikembangkan. silahkan bisa Whatsapp ke nomor <b>+6281334430992</b> atau email ke <b>educmsofficial@gmail.com</b></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">
                            EDUCMS {{ FunctionStatic::versi_app() }} released
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>
                          Yang sedang anda gunakan ini adalah EDUCMS {{ FunctionStatic::versi_app() }}. selalu cek di github kami <a href="https://github.com/educms/educms" target="_blank">EDUCMS</a> untuk update yang terbaru. Apabila anda ingin donasi sebagai bentuk support pengembangan CMS ini, bisa dikirimkan ke Rekening:<br />
                          <ul>
                            <li><b>BCA</b> A.n AH HANDOYO <b>0100076934</b></li>
                            <li><b>BRI</b> A.n AH HANDOYO <b>631101014954533</b></li>
                            <li><b>BTN</b> A.n AH HANDOYO <b>022301500044342</b></li>
                            <li><b>BANK JATIM</b> A.n AH HANDOYO <b>0176016795</b></li>
                          </ul>
                          CMS ini bisa didapatkan dengan gratis di github kami <a href="https://github.com/educms/educms" target="_blank">EDUCMS</a>
                        </p>
                    </div>
                </div>            
            </div>
        </div>
    </section>
@endsection
