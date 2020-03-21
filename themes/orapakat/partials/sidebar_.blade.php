<div class="col-md-4">
    <!-- Search Widget -->
    <div class="card my-4">
        <h6 class="card-header">Search</h6>
        <div class="card-body">
        <form action="{{ url('search') }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="searching" placeholder="Masukkan keyword" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" id="button-addon2"> <i class="fa fa-search"></i> </button>
                </div>
            </div>
        </form>    
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h6 class="card-header">Link / Tautan</h6>
        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                @foreach($link_wrap as $link)
                <a href="{{ $link->link_url }}" class="list-group-item list-group-item-action" target="_blank">{{ $link->link_title }}</a>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Side Widget -->
    <div class="card my-4">
        <h6 class="card-header">Sambutan</h6>
        <div class="card-body text-center">
            <img class="card-img-top" src="{{ $theme_files.$config->config_foto_kepala }}" alt="Card image cap"><br /><br />
            <small><b>{{ $config->config_kepala_sekolah }}</b></small><br />
            <small> -= {{ $config->config_label_kepala }} =-</small><br /><br />
            {{ \Illuminate\Support\Str::limit(strip_tags($config->config_sambutan), $limit = 150, $end = '...') }}
        </div>
        <div class="card-footer text-center">
            <small><a href="{{ url('sambutan') }}" class="links_">Selengkapnya</a></small>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h6 class="card-header">Gallery Photo Terbaru</h6>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($photo_sidebar as $fotod)
                <li class="media mb-3">
                    <img src="{{ $theme_files.$fotod->album_cover }}" width="64" class="mr-3" alt="">
                    <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="{{ FunctionStatic::url_photo($fotod->album_slug) }}" class="links_">{{ $fotod->album_title }}</a></h6>
                        <small>{{ FunctionStatic::tgl_indo($fotod->album_publish_date) }}</small>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h6 class="card-header">Gallery Video Terbaru</h6>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($video_sidebar as $videod)
                <li class="media mb-3">
                    <img src="{{ $videod->video_thumbnail }}" width="64" class="mr-3" alt="">
                    <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="{{ FunctionStatic::url_video($videod->video_slug) }}" class="links_">{{ $videod->video_title }}</a></h6>
                        <small>{{ FunctionStatic::tgl_indo($videod->video_publish_date) }}</small>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>