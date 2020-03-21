@extends('backend::partials.master')
@section('titles','Staf Dan Tenaga Pendidik')
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
                    <h1 class="m-0 text-dark">Staf Dan Tenaga Pendidik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Staf Dan Tenaga Pendidik</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahpendidik" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Staf dan Tenaga Pendidik Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-staf-pendidik" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>PHOTO</th>
                                <th>NIP & NAMA</th>
                                <th>TEMPAT, TGL.LAHIR</th>
                                <th>ALAMAT</th>
                                <th>JABATAN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahpendidik" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Staf Dan Tenaga Pendidik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/staf-pendidik/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">NIP & NAMA LENGKAP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="pendidik_nip" placeholder="ID / NIP">
                            </div>                    
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pendidik_nama_add" name="pendidik_nama" placeholder="Nama Lengkap" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="pendidik_slug_add" name="pendidik_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TEMPAT, TGL.LAHIR</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="pendidik_tempat_lahir" placeholder="Tempat," required>
                            </div>             
                            <div class="col-sm-5 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="pendidik_tgl_lahir" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">ALAMAT LENGKAP</label>
                            <div class="col-sm-12">
                                <textarea name="pendidik_alamat" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">PHOTO</label>
                            <label class="col-sm-6">JABATAN</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="pendidik_photo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload fot profil (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="pendidik_jabatan" required>
                            </div>               
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">KETERANGAN LAIN</label>
                            <div class="col-sm-12">
                                <textarea name="pendidik_keterangan" class="form-control" rows="5"></textarea>
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
    <div id="editpendidik" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Staf Dan Tenaga Pendidik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/staf-pendidik/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">NIP & NAMA LENGKAP</label>
                            <div class="col-sm-4">
                                <input type="hidden" id="pendidik_id" name="pendidik_id">
                                <input type="text" class="form-control" id="pendidik_nip" name="pendidik_nip" placeholder="ID / NIP">
                            </div>                    
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pendidik_nama" name="pendidik_nama" placeholder="Nama Lengkap" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="pendidik_slug" name="pendidik_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TEMPAT, TGL.LAHIR</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="pendidik_tempat_lahir" name="pendidik_tempat_lahir" placeholder="Tempat," required>
                            </div>             
                            <div class="col-sm-5 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" id="pendidik_tgl_lahir" name="pendidik_tgl_lahir" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">ALAMAT LENGKAP</label>
                            <div class="col-sm-12">
                                <textarea id="pendidik_alamat" name="pendidik_alamat" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">PHOTO</label>
                            <label class="col-sm-6">JABATAN</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="pendidik_photo" name="pendidik_photo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload fot profil (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="pendidik_jabatan" name="pendidik_jabatan" required>
                            </div>               
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">KETERANGAN LAIN</label>
                            <div class="col-sm-12">
                                <textarea id="pendidik_keterangan" name="pendidik_keterangan" class="form-control" rows="5"></textarea>
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
            var table = $("#json-staf-pendidik").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/direktori/staf-pendidik/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'pendidik_photo', name: 'pendidik_photo' },
                        { data: 'pendidik_nama', name: 'pendidik_nama' },
                        { data: 'ttl', name: 'ttl' },
                        { data: 'pendidik_alamat', name: 'pendidik_alamat' },
                        { data: 'pendidik_jabatan', name: 'pendidik_jabatan' },
                        { data: 'pendidik_keterangan', name: 'pendidik_keterangan' }
                    ]
            });
        });

        $('#pendidik_nama_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'pendidik','param':'pendidik_slug' }, 
                function( data ) {
                    $('#pendidik_slug_add').val(data.slug);
                }
            );
        });
        
        $('#pendidik_nama').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'pendidik','param':'pendidik_slug' }, 
                function( data ) {
                    $('#pendidik_slug').val(data.slug);
                }
            );
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var slug = $(this).attr('data-slug');
            var nip = $(this).attr('data-nip');
            var nama = $(this).attr('data-nama');
            var tempat = $(this).attr('data-tempatlahir');
            var tgl = $(this).attr('data-tgllahir');
            var alamat = $(this).attr('data-alamat');
            var jabatan = $(this).attr('data-jabatan');
            var keterangan = $(this).attr('data-keterangan');

            $('#pendidik_id').val(id);
            $('#pendidik_slug').val(slug);
            $('#pendidik_nip').val(nip);
            $('#pendidik_nama').val(nama);
            $('#pendidik_tempat_lahir').val(tempat);
            $('#pendidik_tgl_lahir').val(tgl);
            $('#pendidik_alamat').val(alamat);
            $('#pendidik_jabatan').val(jabatan);
            $('#pendidik_keterangan').val(keterangan);
        }); 
    </script>    
@endsection