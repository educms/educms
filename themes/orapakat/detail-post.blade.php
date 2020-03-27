@extends("theme::orapakat.partials.master_")
@section('titles',"$post->post_title")
@section('content')
    <meta property="og:title" content="{{ $post->post_title }}"/>
    <meta property="og:url" content="{{ FunctionStatic::url_post($post->post_slug) }}"/>
    <meta property="og:image" content="{{ $theme_files.$post->post_image }}"/>
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->post_body), $limit = 450, $end = '...') }}"/>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->post_body), $limit = 450, $end = '...') }}"/>

    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="black-overlay"></div>
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">{{ $post->post_title }}</h1>
                    <p class="lead text-white">
                        Publish on {{ FunctionStatic::tgl_indo($post->post_publish_date) }}, 
                        <a href="{{ FunctionStatic::url_categories($post->categories_slug) }}">{{ $post->categories_title }}</a>
                    </p>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4"></h1>
                <!-- Blog Post -->
                <div class="card mb-4">
                    @if(!is_null($post->post_image))
                    <img class="card-img-top" src="{{ $theme_files.$post->post_image }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->post_title }}</h2>
                        <p class="card-text">{!! $post->post_body !!}</p>
                        <p>
                        @foreach(explode(',', $post->post_tags) as $itag)
                        <a href="{{ FunctionStatic::url_tags($itag) }}">#{{ FunctionStatic::tags($itag) }}</a> &nbsp;
                        @endforeach
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="btn-group">
                            <a href="http://www.facebook.com/sharer/sharer.php?u={{ FunctionStatic::url_post($post->post_slug) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share Facebook</a>
                            <a href="http://twitter.com/share?url={{ FunctionStatic::url_post($post->post_slug) }}&text={{ $post->post_title }}" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i> Share Twitter</a>
                        </div>
                    </div>
                </div>
                <h3 class="my-4">Postingan Terkait</h3>
                @foreach($related as $default)
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-body">
                            @if(!is_null($default->post_image))
                            <img class="w-100" src="{{ $theme_files.$default->post_image }}" alt="Card image cap">
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h4 class="card-title text-bold">{{ $default->post_title }}</h4>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($default->post_body), $limit = 200, $end = '...') }}</p>
                                <a href="{{ FunctionStatic::url_post($default->post_slug) }}" class="btn btn-sm btn-info">Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Publish on {{ FunctionStatic::tgl_indo($default->post_publish_date) }}
                    </div>
                </div>
                @endforeach
                <div class="card mb-4">
                    <div class="card-body">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            var disqus_shortname = 'edu-cms';
                            var disqus_url = '{{ FunctionStatic::url_post($post->post_slug) }}';

                            (function () {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = 'https://' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            @include("theme::orapakat.partials.sidebar_")
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection