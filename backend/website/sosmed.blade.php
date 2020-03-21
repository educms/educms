@extends('backend::partials.master')
@section('titles','Media Sosial')
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
                    <h1 class="m-0 text-dark">Media Sosial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Media Sosial</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahsosmed" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Media Sosial</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-sosmed" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="150">#</th>
                                <th>JUDUL</th>
                                <th>URL</th>
                                <th>ICON</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahsosmed" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Media Sosial</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/sosmed/add/act') }}" autocomplete="off" method="POST" >
                    {{ csrf_field() }}
                    <div class="modal-body form-horizontal text-sm">
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">URL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_url" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">ICON (FONT AWESOME)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_icon" required>
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
    <div id="editlink" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Media Sosial</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/sosmed/edit/act') }}" autocomplete="off" method="POST" >
                    {{ csrf_field() }}
                    <div class="modal-body form-horizontal text-sm">
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL</label>
                            <div class="col-sm-8">
                                <input type="hidden" id="sosmed_id" name="sosmed_id" required>
                                <input type="text" class="form-control" id="sosmed_title" name="sosmed_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">URL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sosmed_url" name="sosmed_url" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">ICON (FONT AWESOME)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sosmed_icon" name="sosmed_icon" required>
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
            var table = $("#json-sosmed").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/sosmed/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'sosmed_title', name: 'sosmed_title' },
                        { data: 'sosmed_url', name: 'sosmed_url' },
                        { data: 'sosmed_icon', name: 'sosmed_icon' }
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var url = $(this).attr('data-url');
            var icon = $(this).attr('data-icon');

            $('#sosmed_id').val(id);
            $('#sosmed_title').val(title);
            $('#sosmed_url').val(url);
            $('#sosmed_icon').val(icon);
        }); 
    </script>    
@endsection