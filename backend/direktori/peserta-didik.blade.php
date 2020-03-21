@extends('backend::partials.master')
@section('titles','Peserta Didik')
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
                    <h1 class="m-0 text-dark">Peserta Didik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peserta Didik</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahsiswa" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Peserta Didik Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-peserta-didik" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>PHOTO</th>
                                <th>NIS/NISN & NAMA</th>
                                <th>TEMPAT, TGL.LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>ALAMAT</th>
                                <th>KELAS</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahsiswa" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Peserta Didik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/peserta-didik/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">NIS/NISN/NPM & NAMA LENGKAP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="siswa_nis" placeholder="NIS/NISN/NPM">
                            </div>                    
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="siswa_nama_add" name="siswa_nama" placeholder="Nama Lengkap" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="siswa_slug_add" name="siswa_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TEMPAT, TGL.LAHIR</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="siswa_tempat_lahir" placeholder="Tempat," required>
                            </div>             
                            <div class="col-sm-5 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="siswa_tgl_lahir" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">JENIS KELAMIN</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="siswa_jk"required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">ALAMAT LENGKAP</label>
                            <div class="col-sm-12">
                                <textarea name="siswa_alamat" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">PHOTO</label>
                            <label class="col-sm-6">KELAS</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="siswa_photo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload fot profil (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control" name="siswa_kelas"required>
                                    @foreach($kelas as $class)
                                    <option value="{{ $class->kelas_id }}">{{ $class->kelas_nama }}</option>
                                    @endforeach
                                </select>
                            </div>               
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">KETERANGAN LAIN</label>
                            <div class="col-sm-12">
                                <textarea name="siswa_keterangan" class="form-control" rows="5"></textarea>
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
    <div id="editsiswa" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Peserta Didik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/peserta-didik/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">NIS/NISN/NPM & NAMA LENGKAP</label>
                            <div class="col-sm-4">
                                <input type="hidden" id="siswa_id" name="siswa_id">
                                <input type="text" class="form-control" id="siswa_nis" name="siswa_nis" placeholder="NIS/NISN/NPM">
                            </div>                    
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="siswa_nama" name="siswa_nama" placeholder="Nama Lengkap" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="siswa_slug" name="siswa_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TEMPAT, TGL.LAHIR</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="siswa_tempat_lahir" name="siswa_tempat_lahir" placeholder="Tempat," required>
                            </div>             
                            <div class="col-sm-5 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" id="siswa_tgl_lahir" name="siswa_tgl_lahir" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">JENIS KELAMIN</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="siswa_jk" name="siswa_jk"required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">ALAMAT LENGKAP</label>
                            <div class="col-sm-12">
                                <textarea id="siswa_alamat" name="siswa_alamat" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">PHOTO</label>
                            <label class="col-sm-6">KELAS</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="siswa_photo" name="siswa_photo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload fot profil (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control" id="siswa_kelas" name="siswa_kelas"required>
                                    @foreach($kelas as $class)
                                    <option value="{{ $class->kelas_id }}">{{ $class->kelas_nama }}</option>
                                    @endforeach
                                </select>
                            </div>               
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">KETERANGAN LAIN</label>
                            <div class="col-sm-12">
                                <textarea id="siswa_keterangan" name="siswa_keterangan" class="form-control" rows="5"></textarea>
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
            var table = $("#json-peserta-didik").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/direktori/peserta-didik/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'siswa_photo', name: 'siswa_photo' },
                        { data: 'siswa_nama', name: 'siswa_nama' },
                        { data: 'ttl', name: 'ttl' },
                        { data: 'siswa_jk', name: 'siswa_jk' },
                        { data: 'siswa_alamat', name: 'siswa_alamat' },
                        { data: 'kelas_nama', name: 'kelas_nama' },
                        { data: 'siswa_keterangan', name: 'siswa_keterangan' }
                    ]
            });
        });

        $('#siswa_nama_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'siswa','param':'siswa_slug' }, 
                function( data ) {
                    $('#siswa_slug_add').val(data.slug);
                }
            );
        });
        
        $('#siswa_nama').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'siswa','param':'siswa_slug' }, 
                function( data ) {
                    $('#siswa_slug').val(data.slug);
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
            var kelas = $(this).attr('data-kelas');
            var keterangan = $(this).attr('data-keterangan');

            $('#siswa_id').val(id);
            $('#siswa_slug').val(slug);
            $('#siswa_nis').val(nis);
            $('#siswa_nama').val(nama);
            $('#siswa_tempat_lahir').val(tempat);
            $('#siswa_tgl_lahir').val(tgl);
            $('#siswa_jk').val(jk);
            $('#siswa_alamat').val(alamat);
            $('#siswa_kelas').val(kelas);
            $('#siswa_keterangan').val(keterangan);
        }); 
    </script>    
@endsection