@extends('backend::partials.master')
@section('titles','Tahun Pelajaran')
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
                    <h1 class="m-0 text-dark">Tahun Pelajaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tahun Pelajaran</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahtahun_pelajaran" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Tahun Pelajaran</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-tahun_pelajaran" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="150">#</th>
                                <th>SLUG</th>
                                <th>JUDUL</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahtahun_pelajaran" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tahun Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/tahun-pelajaran/add/act') }}" autocomplete="off" method="POST" >
                    {{ csrf_field() }}
                    <div class="modal-body form-horizontal text-sm">
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tahun_pelajaran_nama_add" name="tahun_pelajaran_nama" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">SLUG</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="tahun_pelajaran_slug_add" name="tahun_pelajaran_slug" required>
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
    <div id="edittahun_pelajaran" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Tahun Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/direktori/tahun-pelajaran/edit/act') }}" autocomplete="off" method="POST" >
                    {{ csrf_field() }}
                    <div class="modal-body form-horizontal text-sm">
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL</label>
                            <div class="col-sm-8">
                                <input type="hidden" id="tahun_pelajaran_id" name="tahun_pelajaran_id" required>
                                <input type="text" class="form-control" id="tahun_pelajaran_nama" name="tahun_pelajaran_nama" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">SLUG</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="tahun_pelajaran_slug" name="tahun_pelajaran_slug" required>
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
            var table = $("#json-tahun_pelajaran").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/direktori/tahun-pelajaran/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'tahun_pelajaran_slug', name: 'tahun_pelajaran_slug' },
                        { data: 'tahun_pelajaran_nama', name: 'tahun_pelajaran_nama' }
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var slug = $(this).attr('data-slug');

            $('#tahun_pelajaran_id').val(id);
            $('#tahun_pelajaran_nama').val(title);
            $('#tahun_pelajaran_slug').val(slug);
        }); 
        $('#tahun_pelajaran_nama_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'tahun_pelajaran','param':'tahun_pelajaran_slug' }, 
                function( data ) {
                    $('#tahun_pelajaran_slug_add').val(data.slug);
                }
            );
        });
        $('#tahun_pelajaran_nama').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'tahun_pelajaran','param':'tahun_pelajaran_slug' }, 
                function( data ) {
                    $('#tahun_pelajaran_slug').val(data.slug);
                }
            );
        });
    </script>    
@endsection