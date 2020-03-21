@extends('backend::partials.master')
@section('titles','Page')
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
                    <h1 class="m-0 text-dark">Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Page</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahpage" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Buat Page Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-page" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>GAMBAR</th>
                                <th>JUDUL</th>
                                <th>BODY</th>
                                <th>PUBLISH</th>
                                <th>TEMPLATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahpage" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buat Page Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/page/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="page_title_add" name="page_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="page_slug_add" name="page_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">BODY</label>
                            <div class="col-sm-12">
                                <textarea name="page_body" class="form-control textarea" rows="10" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">GAMBAR</label>
                            <label class="col-sm-6">TEMPLATE</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="page_image" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar post (png,jpg,jpeg,gif)</label>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <select class="form-control select2dt1" name="page_template"required>
                                    <option value="none">Template Default</option>
                                @foreach($files as $key => $file)
                                    <option value="{{ $file->getRelativePathname() }}">{{ $file->getRelativePathname() }}</option>
                                @endforeach
                                </select>
                            </div>               
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">STATUS</label>
                            <label class="col-sm-6">PUBLISH</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="page_status"required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
                            </div>   
                            <div class="col-sm-6 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="page_publish_date" value="{{ date('Y-m-d') }}">
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
    <div id="editpage" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Page</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/page/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="hidden" id="page_id" name="page_id" required>
                                <input type="text" class="form-control" id="page_title" name="page_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="page_slug" name="page_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">BODY</label>
                            <div class="col-sm-12">
                                <textarea id="page_body" name="page_body" class="form-control textarea" rows="10" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">GAMBAR</label>
                            <label class="col-sm-6">TEMPLATE</label>
                            <div class="col-sm-6 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="page_image" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar post (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>                                
                            <div class="col-sm-6">
                                <select class="form-control select2dt2" name="page_template" id="page_template" required>
                                    <option value="none">Template Default</option>
                                @foreach($files as $key => $file)
                                    <option value="{{ $file->getRelativePathname() }}">{{ $file->getRelativePathname() }}</option>
                                @endforeach
                                </select>
                            </div>             
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">STATUS</label>
                            <label class="col-sm-6">PUBLISH</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="page_status" id="page_status" required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
                            </div>  
                            <div class="col-sm-6 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="page_publish_date" id="page_publish_date" value="{{ date('Y-m-d') }}">
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
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $("#json-page").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/page/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'page_image', name: 'page_image' },
                        { data: 'page_title', name: 'page_title' },
                        { data: 'page_body', name: 'page_body' },
                        { data: 'page_publish_date', name: 'page_publish_date' },
                        { data: 'page_template', name: 'page_template' },
                        { data: 'page_status', name: 'page_status' },
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var slug = $(this).attr('data-slug');
            var body = $(this).attr('data-body');
            var publish = $(this).attr('data-publish');
            var template = $(this).attr('data-template');
            var status = $(this).attr('data-status');

            $.get('{{ url("mypanel/website/page/value/click") }}',{ 'id': id }, 
                function( data ) {
                    $('#page_body').summernote('code', data.body);
                }
            );

            $('#page_id').val(id);
            $('#page_title').val(title);
            $('#page_slug').val(slug);
            $('#page_publish').val(publish);
            $('#page_template').val(template).trigger('change');
            $('#page_status').val(status);
        }); 

        $('#page_title_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'page','param':'page_slug' }, 
                function( data ) {
                    $('#page_slug_add').val(data.slug);
                }
            );
        });

        $('#page_title').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'page','param':'page_slug' }, 
                function( data ) {
                    $('#page_slug').val(data.slug);
                }
            );
        });
    </script>    
@endsection