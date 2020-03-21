@extends('backend::partials.master')
@section('titles','Slider')
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
                    <h1 class="m-0 text-dark">Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Slider</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahslider" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Slider Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-slider" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>GAMBAR</th>
                                <th>JUDUL</th>
                                <th>DESKRIPSI</th>
                                <th>URL</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahslider" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Slider Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/slider/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="slider_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">DESKRPSI</label>
                            <div class="col-sm-12">
                                <textarea name="slider_description" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">URL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="slider_url" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">GAMBAR</label>
                            <label class="col-sm-6">STATUS</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="slider_image" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar post (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control" name="slider_status" required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
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
    <div id="editslider" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Slider</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/slider/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="hidden" id="slider_id" name="slider_id" required>
                                <input type="text" class="form-control" id="slider_title" name="slider_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">DESKRPSI</label>
                            <div class="col-sm-12">
                                <textarea name="slider_description" id="slider_description" class="form-control" rows="5" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">URL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="slider_url" name="slider_url" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">GAMBAR</label>
                            <label class="col-sm-6">STATUS</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="slider_image" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar post (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control" id="slider_status" name="slider_status" required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
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
            var table = $("#json-slider").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/slider/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'slider_image', name: 'slider_image' },
                        { data: 'slider_title', name: 'slider_title' },
                        { data: 'slider_description', name: 'slider_description' },
                        { data: 'slider_url', name: 'slider_url' },
                        { data: 'slider_status', name: 'slider_status' }
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var desc = $(this).attr('data-desc');
            var url = $(this).attr('data-url');
            var status = $(this).attr('data-status');

            $('#slider_id').val(id);
            $('#slider_title').val(title);
            $('#slider_description').val(desc);
            $('#slider_url').val(url);
            $('#slider_status').val(status);
        }); 
    </script>    
@endsection