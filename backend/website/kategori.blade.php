@extends('backend::partials.master')
@section('titles','Kategori')
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
                    <h1 class="m-0 text-dark">Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                    <a href="##" data-toggle="modal" data-target="#tambahKategori" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Kategori</a>
                </h3>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="json-kategori" class="table table-bordered table-striped" style="width:100%;font-size:13px;">
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
    <div id="tambahKategori" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/categories/add/act') }}" autocomplete="off" method="POST" >
                    {{ csrf_field() }}
                    <div class="modal-body form-horizontal text-sm">
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="categories_title_add" name="categories_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">SLUG</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="categories_slug_add" name="categories_slug" required>
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
    <div id="editkategori" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('mypanel/website/categories/edit/act') }}" autocomplete="off" method="POST" >
                    {{ csrf_field() }}
                    <div class="modal-body form-horizontal text-sm">
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL</label>
                            <div class="col-sm-8">
                                <input type="hidden" id="categories_id" name="categories_id" required>
                                <input type="text" class="form-control" id="categories_title" name="categories_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">SLUG</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="categories_slug" name="categories_slug" required>
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
            var table = $("#json-kategori").DataTable({
            processing: true,
            language:{processing: '<i class="fa fa-compact-disc fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            serverSide: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: '{{ url("mypanel/website/categories/json") }}',
            columns: [
                        { data: 'actions', name: 'actions', className: 'text-center', orderable: false },
                        { data: 'categories_slug', name: 'categories_slug' },
                        { data: 'categories_title', name: 'categories_title' }
                    ]
            });
        });

        $(document).on('click', '.edit', function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var slug = $(this).attr('data-slug');

            $('#categories_id').val(id);
            $('#categories_title').val(title);
            $('#categories_slug').val(slug);
        }); 
        $('#categories_title_add').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'categories','param':'categories_slug' }, 
                function( data ) {
                    $('#categories_slug_add').val(data.slug);
                }
            );
        });
        $('#categories_title').change(function(e) {
            $.get('{{ url("mypanel/website/slug/create") }}',{ 'title': $(this).val(),'table':'categories','param':'categories_slug' }, 
                function( data ) {
                    $('#categories_slug').val(data.slug);
                }
            );
        });
    </script>    
@endsection