@extends('backend::partials.master')
@section('titles','Alumni')
@section('content')
    @if(session('add'))
        {!! session('add') !!}
    @endif
    @if(session('delete'))
        {!! session('delete') !!}
    @endif
    @if(session('edit'))
        {!! session('edit') !!}
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Alumni</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Alumni</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-indigo">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="##" data-toggle="modal" data-target="#tambahalumni" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Alumni Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-alumni" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>PHOTO</th>
                                <th>NIS/NISN & NAMA</th>
                                <th>TEMPAT, TGL.LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>ALAMAT</th>
                                <th>TAHUN MASUK</th>
                                <th>TAHUN KELUAR</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahalumni" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Alumni</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/alumni/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">NIS/NISN/NPM & NAMA LENGKAP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="alumni_nis" placeholder="NIS/NISN/NPM">
                            </div>                    
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alumni_nama_add" name="alumni_nama" placeholder="Nama Lengkap" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="alumni_slug_add" name="alumni_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TEMPAT, TGL.LAHIR</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="alumni_tempat_lahir" placeholder="Tempat," required>
                            </div>             
                            <div class="col-sm-5 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="alumni_tgl_lahir" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">ALAMAT LENGKAP</label>
                            <div class="col-sm-12">
                                <textarea name="alumni_alamat" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">JENIS KELAMIN</label>
                            <label class="col-sm-6">PHOTO</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="alumni_jk"required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>   
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="alumni_photo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload foto profil (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>                  
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">TAHUN MASUK</label>
                            <label class="col-sm-6">TAHUN KELUAR</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="alumni_masuk" placeholder="tahun masuk" required>
                            </div>              
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="alumni_keluar" placeholder="tahun keluar" required>
                            </div>              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="editalumni" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Peserta Didik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/alumni/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">NIS/NISN/NPM & NAMA LENGKAP</label>
                            <div class="col-sm-4">
                                <input type="hidden" id="alumni_id" name="alumni_id">
                                <input type="text" class="form-control" id="alumni_nis" name="alumni_nis" placeholder="NIS/NISN/NPM">
                            </div>                    
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alumni_nama" name="alumni_nama" placeholder="Nama Lengkap" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="alumni_slug" name="alumni_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TEMPAT, TGL.LAHIR</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="alumni_tempat_lahir" name="alumni_tempat_lahir" placeholder="Tempat," required>
                            </div>             
                            <div class="col-sm-5 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" id="alumni_tgl_lahir" name="alumni_tgl_lahir" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">ALAMAT LENGKAP</label>
                            <div class="col-sm-12">
                                <textarea id="alumni_alamat" name="alumni_alamat" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">JENIS KELAMIN</label>
                            <label class="col-sm-6">PHOTO</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="alumni_jk" name="alumni_jk"required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div> 
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="alumni_photo" name="alumni_photo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload fot profil (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">TAHUN MASUK</label>
                            <label class="col-sm-6">TAHUN KELUAR</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="alumni_masuk" name="alumni_masuk" placeholder="tahun masuk" required>
                            </div>              
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="alumni_keluar" name="alumni_keluar" placeholder="tahun keluar" required>
                            </div>              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $("#json-alumni").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/direktori/alumni/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'alumni_photo', name: 'alumni_photo' },
                        { data: 'alumni_nama', name: 'alumni_nama' },
                        { data: 'ttl', name: 'ttl' },
                        { data: 'alumni_jk', name: 'alumni_jk' },
                        { data: 'alumni_alamat', name: 'alumni_alamat' },
                        { data: 'alumni_masuk', name: 'alumni_masuk' },
                        { data: 'alumni_keluar', name: 'alumni_keluar' }
                    ]
            });
        });

        $('#alumni_nama_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'alumni','param':'alumni_slug' }, 
                function( data ) {
                    $('#alumni_slug_add').val(data.slug);
                }
            );
        });
        
        $('#alumni_nama').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'alumni','param':'alumni_slug' }, 
                function( data ) {
                    $('#alumni_slug').val(data.slug);
                }
            );
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var slug = $(this).attr('data-slug');
            var nis = $(this).attr('data-nis');
            var nama = $(this).attr('data-nama');
            var tempat = $(this).attr('data-tempatlahir');
            var tgl = $(this).attr('data-tgllahir');
            var jk = $(this).attr('data-jk');
            var alamat = $(this).attr('data-alamat');
            var masuk = $(this).attr('data-masuk');
            var keluar = $(this).attr('data-keluar');

            $('#alumni_id').val(id);
            $('#alumni_slug').val(slug);
            $('#alumni_nis').val(nis);
            $('#alumni_nama').val(nama);
            $('#alumni_tempat_lahir').val(tempat);
            $('#alumni_tgl_lahir').val(tgl);
            $('#alumni_jk').val(jk);
            $('#alumni_alamat').val(alamat);
            $('#alumni_masuk').val(masuk);
            $('#alumni_keluar').val(keluar);
        }); 
    </script>    
@endsection