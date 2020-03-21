@extends('backend::partials.master')
@section('titles','General')
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
                    <h1 class="m-0 text-dark">General</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">General</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">
                            Konfigurasi General
                        </h3>
                    </div>
                    <div class="card-body form-horizontal text-sm">
                      <form action="{{ url('mypanel/configuration/general/edit/act') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-4">JUDUL WEBSITE</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="config_title_web" value="{{ $general->config_title_web }}" required>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">NO.TELP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="config_telp" value="{{ $general->config_telp }}" required>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">ALAMAT EMAIL</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="config_email" value="{{ $general->config_email }}" required>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">THEMES CMS</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="config_id" value="{{ $general->config_id }}" required>
                                <select name="config_themes" class="form-control select2dt1" required>
                                @foreach(array_map('basename', $data) as $key => $file)
                                    @if($general->config_themes == $file)
                                    <option value="{{ $file }}" selected>{{ $file }}</option>
                                    @else
                                    <option value="{{ $file }}">{{ $file }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">SAMBUTAN KEPALA SEKOLAH</label>
                            <div class="col-sm-8">
                                <textarea name="config_sambutan" class="form-control textarea" rows="5" required>{{ $general->config_sambutan }}</textarea>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">JENIS DAN NAMA PIMPINAN</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="config_label_kepala" value="{{ $general->config_label_kepala }}" required>
                            </div>                    
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="config_kepala_sekolah" value="{{ $general->config_kepala_sekolah }}" required>
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">FOTO {{ $general->config_label_kepala }}</label>
                            <div class="col-sm-8 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="config_foto_kepala" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload gambar pimpinan (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>                   
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">FAVICON DAN LOGO</label>
                            <div class="col-sm-4 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="config_favicon" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload favicon (png,jpg,jpeg,gif)</label>
                                </div>
                            </div>                   
                            <div class="col-sm-4 input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="config_logo" accept="image/png,image/jpg,image/jpeg,image/gif">
                                    <label class="custom-file-label">Upload logo (png,jpg,jpeg,gif)</label>
                                </div>
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
        </div>
    </section>
    <!-- /.content -->
@endsection
