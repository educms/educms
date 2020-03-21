@extends('backend::partials.master')
@section('titles','Posting')
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
                    <h1 class="m-0 text-dark">Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Post</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahpost" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Buat Post Baru</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-post" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
                        <thead>
                            <tr>
                                <th width="100">#</th>
                                <th>GAMBAR</th>
                                <th>JUDUL</th>
                                <th>BODY</th>
                                <th>KATEGORI</th>
                                <th>PUBLISH</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div id="tambahpost" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buat Post Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/post/add/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="post_title_add" name="post_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="post_slug_add" name="post_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">BODY</label>
                            <div class="col-sm-12">
                                <textarea name="post_body" class="form-control textarea" rows="10" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8">KATEGORI</label>
                            <label class="col-sm-4">PUBLISH</label>
                            <div class="col-sm-8">
                                <select class="form-control select2dt1" name="post_categories"required>
                                @foreach($cat as $kategori)
                                    <option value="{{ $kategori->categories_id }}">{{ $kategori->categories_title }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="post_publish_date" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                   
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8">GAMBAR</label>
                            <label class="col-sm-4">STATUS</label>
                            <div class="col-sm-8 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="post_image" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar post (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>   
                            <div class="col-sm-4">
                                <select class="form-control" name="post_status"required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
                            </div>                
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">Tag</label>
                            <div class="col-sm-12 input-group">
                                <select class="form-control select2dt2" multiple name="post_tags[]"required>
                                @foreach($tag as $tags)
                                    <option value="{{ $tags->tag_id }}">{{ $tags->tag_title }}</option>
                                @endforeach
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
    <div id="editpost" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/post/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-sm">
                        <div class="form-group row">
                            <label class="col-sm-12">JUDUL</label>
                            <div class="col-sm-12">
                                <input type="hidden" id="post_id" name="post_id" required>
                                <input type="text" class="form-control" id="post_title" name="post_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">SLUG</label>
                            <div class="col-sm-12">
                                <input type="text" readonly class="form-control" id="post_slug" name="post_slug" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">BODY</label>
                            <div class="col-sm-12">
                                <textarea id="post_body" name="post_body" class="form-control textarea" rows="10" required></textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8">KATEGORI</label>
                            <label class="col-sm-4">PUBLISH</label>
                            <div class="col-sm-8">
                                <select class="form-control select2dt3" name="post_categories" id="post_categories" required>
                                @foreach($cat as $kategori)
                                    <option value="{{ $kategori->categories_id }}">{{ $kategori->categories_title }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 input-group date date1" data-target-input="nearest">
                                <input type="text" class="form-control" readonly data-target=".date1" name="post_publish_date" id="post_publish_date" value="{{ date('Y-m-d') }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info"> <i class="fas fa-calendar"></i> </button>
                                </span>
                            </div>                   
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8">GAMBAR</label>
                            <label class="col-sm-4">STATUS</label>
                            <div class="col-sm-8 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="post_image" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar post (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>   
                            <div class="col-sm-4">
                                <select class="form-control" name="post_status" id="post_status" required>
                                    <option value="Published">Published</option>
                                    <option value="Depublished">Depublished</option>
                                </select>
                            </div>                
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">Tag</label>
                            <div class="col-sm-12 input-group">
                                <select class="form-control select2dt4" id="post_tags" multiple name="post_tags[]"required>
                                @foreach($tag as $tags)
                                    <option value="{{ $tags->tag_id }}">{{ $tags->tag_title }}</option>
                                @endforeach
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
            var table = $("#json-post").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/post/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'post_image', name: 'post_image' },
                        { data: 'post_title', name: 'post_title' },
                        { data: 'post_body', name: 'post_body' },
                        { data: 'categories_title', name: 'categories_title' },
                        { data: 'post_publish_date', name: 'post_publish_date' },
                        { data: 'post_status', name: 'post_status' },
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var slug = $(this).attr('data-slug');
            var body = $(this).attr('data-body');
            var categories = $(this).attr('data-categories');
            var publish = $(this).attr('data-publish');
            var status = $(this).attr('data-status');
            var tags = $(this).attr('data-tags');
            var tagsSplit = tags.split(',');

            $.get('{{ url("mypanel/website/post/value/click") }}',{ 'id': id }, 
                function( data ) {
                    $('#post_body').summernote('code', data.body);
                }
            );

            $('#post_id').val(id);
            $('#post_title').val(title);
            $('#post_slug').val(slug);
            $('#post_categories').val(categories).trigger('change');
            $('#post_tags').val(tagsSplit).trigger('change');
            $('#post_publish').val(publish);
            $('#post_status').val(status);
        }); 

        $('#post_title_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'post','param':'post_slug' }, 
                function( data ) {
                    $('#post_slug_add').val(data.slug);
                }
            );
        });

        $('#post_title').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'post','param':'post_slug' }, 
                function( data ) {
                    $('#post_slug').val(data.slug);
                }
            );
        });
    </script>    
@endsection