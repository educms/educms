@extends('backend::partials.master')
@section('titles','Photo Gallery')
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
                    <h1 class="m-0 text-dark">Photo Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Photo Gallery</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahphoto" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Photo Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-photo" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>COVER</th>
                                <th>JUDUL</th>
                                <th>TGL.</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahphoto" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Photo Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/photo/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="album_title_add" name="album_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="album_slug_add" name="album_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">COVER</label>
                            <label class="col-sm-6">PHOTO</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="album_cover" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                                    <label class="custom-file-label">Upload cover (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" multiple name="album_photo[]" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                                    <label class="custom-file-label">Upload photo (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>              
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">STATUS</label>
                            <label class="col-sm-6">PUBLISH</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="album_status" required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
                            </div>  
                            <div class="col-sm-6 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="album_publish_date" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
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
    <div id="editphoto" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Photo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/photo/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="hidden" id="album_id" name="album_id" required>
                                <input type="text" class="form-control" id="album_title" name="album_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="album_slug" name="album_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">COVER</label>
                            <label class="col-sm-6">STATUS</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="album_cover" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload cover (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control" name="album_status" id="album_status" required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
                            </div>             
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">TAMBAH PHOTO</label>
                            <div class="col-sm-12 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" multiple name="album_photo[]" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload photo (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>              
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">LIST FILE PHOTO</label>
                            <div class="col-sm-12">
                                <div id="list_photo"></div>
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
            var table = $("#json-photo").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/photo/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'album_cover', name: 'album_cover' },
                        { data: 'album_title', name: 'album_title' },
                        { data: 'album_publish_date', name: 'album_publish_date' },
                        { data: 'album_status', name: 'album_status' }
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var slug = $(this).attr('data-slug');
            var status = $(this).attr('data-status');

            $('#album_id').val(id);
            $('#album_title').val(title);
            $('#album_slug').val(slug);
            $('#album_status').val(status);

            $('#list_photo').load('{{ url("mypanel/website/photo/list") }}/'+id);
        }); 

        $(document).on('click', '#delphoto', function (e) {
            var id = $(this).attr('data-idp');
            var image = $(this).attr('data-imagep');
            $.get('{{ url("mypanel/website/photo/list/delete/act") }}',{ 'id':id,'image':image }, 
                function( data ) {
                    $('#list_photo').load('{{ url("mypanel/website/photo/list") }}/'+id);
                }
            );
        });
        
        $('#album_title_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'album','param':'album_slug' }, 
                function( data ) {
                    $('#album_slug_add').val(data.slug);
                }
            );
        });

        $('#album_title').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'album','param':'album_slug' }, 
                function( data ) {
                    $('#album_slug').val(data.slug);
                }
            );
        });
    </script>    
@endsection