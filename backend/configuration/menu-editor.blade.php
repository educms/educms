@extends('backend::partials.master')
@section('titles','Menu Editor')
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
                    <h1 class="m-0 text-dark">Menu Editor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Menu Editor</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">
                            TAMBAH ITEM MENU
                        </h3>
                    </div>
                    <div class="card-body form-horizontal text-sm">
                      <form method="POST" autocomplete="off" action="{{ url('mypanel/configuration/menu-editor/add/act') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-4">LABEL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="menu_title" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">JENIS</label>
                            <div class="col-sm-8">
                                <select name="menu_type" id="jenis" class="form-control" required>
                                  <option value="">Pilih Jenis Menu</option>
                                  <option value="Link">Link</option>
                                  <option value="Page">Page</option>
                                </select>
                            </div>                    
                        </div>
                        <div id="content_link"></div>
                        <div class="form-group row">
                            <label class="col-sm-4">SUB MENU</label>
                            <div class="col-sm-8">
                                <select name="menu_sub" class="form-control select2dt2">
                                  <option value="">Menu Utama</option>
                                  @foreach($menu as $mn)
                                  <option value="{{$mn->menu_id}}">{{$mn->menu_title}}</option>
                                  @endforeach
                                </select>
                            </div>                    
                        </div>
                        <div class="row">
                            <label class="col-sm-4">&nbsp;</label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>                    
                        </div>
                      </form>  
                    </div>
                </div>  
            </div>
            <div class="col-md-7">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">
                            MAIN MENU
                        </h3>
                    </div>
                    <div class="card-body text-sm">
                        @foreach($menu as $menuku)
                          <div class="card card-indigo collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">{{ $menuku->menu_title }}</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" onclick="confirm_delete('Anda yakin akan menghapus menu {{ $menuku->menu_title }}?','mypanel/configuration/menu-editor/delete/{{ $menuku->menu_id }}')"><i class="fas fa-trash"></i></button>
                              </div>
                            </div>
                          </div>
                          @php
                            $idsub = $menuku->menu_id;
                            $sub = DB::table('menu')->whereNotNull('menu_sub')->where('menu_sub',$idsub)->orderBy('menu_id','ASC')->get();
                          @endphp
                          @foreach($sub as $subku)
                            <div class="card card-danger collapsed-card ml-5">
                              <div class="card-header">
                                <h3 class="card-title">{{ $subku->menu_title }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" onclick="confirm_delete('Anda yakin akan menghapus sub menu {{ $subku->menu_title }}?','mypanel/configuration/menu-editor/delete/{{ $subku->menu_id }}')"><i class="fas fa-trash"></i></button>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        @endforeach
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <script>
        $(document).on('click', '#jenis', function (e) {
            var type = $('#jenis').val();
            if(type === 'Link'){
                $('#content_link').html('\
                    <div class="form-group row">\
                        <label class="col-sm-4">LINK/PATH</label>\
                        <div class="col-sm-8">\
                            <input type="text" class="form-control" name="menu_link" required>\
                        </div>\
                    </div>');
            }else if(type === 'Page'){
              $('#content_link').load('{{ url("mypanel/configuration/menu-editor/page/show") }}');
            }  
        });
    </script>
    <!-- /.content -->
@endsection
