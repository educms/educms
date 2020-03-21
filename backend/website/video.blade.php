@extends('backend::partials.master')
@section('titles','Video')
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
                    <h1 class="m-0 text-dark">Video</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Video</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahvideo" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Video Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-video" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>THUMBNAIL</th>
                                <th>JUDUL</th>
                                <th>LINK</th>
                                <th>TGL</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahvideo" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Video Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/video/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="video_title_add" name="video_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="video_slug_add" name="video_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">LINK (youtube.com)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="video_link" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">PUBLISH</label>
                            <label class="col-sm-6">STATUS</label>
                            <div class="col-sm-6 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="video_publish_date" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control" name="video_status" required>
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
    <div id="editvideo" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Video</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/video/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="hidden" id="video_id" name="video_id" required>
                                <input type="text" class="form-control" id="video_title" name="video_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="video_slug" name="video_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">LINK (youtube.com)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="video_link" name="video_link" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">STATUS</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="video_status" name="video_status" required>
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
            var table = $("#json-video").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/video/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'video_thumbnail', name: 'video_thumbnail' },
                        { data: 'video_title', name: 'video_title' },
                        { data: 'video_link', name: 'video_link' },
                        { data: 'video_publish_date', name: 'video_publish_date' },
                        { data: 'video_status', name: 'video_status' }
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var slug = $(this).attr('data-slug');
            var link = $(this).attr('data-link');
            var status = $(this).attr('data-status');

            $('#video_id').val(id);
            $('#video_title').val(title);
            $('#video_slug').val(slug);
            $('#video_link').val(link);
            $('#video_status').val(status);
        }); 

        $('#video_title_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'video','param':'video_slug' }, 
                function( data ) {
                    $('#video_slug_add').val(data.slug);
                }
            );
        });

        $('#video_title').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'video','param':'video_slug' }, 
                function( data ) {
                    $('#video_slug').val(data.slug);
                }
            );
        });
    </script>    
@endsection