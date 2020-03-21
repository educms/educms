    <footer class="educms_area">
        <!-- Top Footer Area Start -->
        <div class="foo_top_header_one section_padding_100_70">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="educms_part">
                            <h5>Media Sosial</h5>
                            <ul class="educms_social_links">
                                @foreach($sosmed as $medsos)
                                <li><a href="{{ $medsos->sosmed_url }}" target="_blank"><i class="{{ $medsos->sosmed_icon }}" aria-hidden="true"></i> {{ $medsos->sosmed_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="educms_part m-top-15">
                            <h5>Tags Widget</h5>
                            <ul class="educms_widget">
                                @foreach($tags as $tag)
                                <li><a href="{{ FunctionStatic::url_tags($tag->tag_id) }}">{{ $tag->tag_title }}</a></li>
                                @endforeach    
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="educms_part">
                            <h5>Link / Tautan Terkait</h5>
                            <ul class="educms_links">
                                @foreach($link as $ln)
                                <li><a href="{{ $ln->link_url }}" target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $ln->link_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="educms_part m-top-15">
                            <h5>Kategori</h5>
                            <ul class="educms_links">
                                @foreach($kategori as $kt)
                                <li><a href="{{ FunctionStatic::url_categories($kt->categories_slug) }}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $kt->categories_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="educms_part">
                            <h5>Berita Terbaru</h5>
                            @foreach($post_default as $ps)
                            <div class="educms_blog_area">
                                <div class="educms_thumb">
								    <img class="img-fluid" src="{{ $theme_files.$ps->post_image }}" alt="">
                                </div>
                                <a href="{{ FunctionStatic::url_post($ps->post_slug) }}">{{ \Illuminate\Support\Str::limit(strip_tags($ps->post_title), $limit = 50, $end = '...') }}</a>
                                <p class="educms_date">{{ FunctionStatic::tgl_indo($ps->post_publish_date) }}</p>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($ps->post_body), $limit = 50, $end = '...') }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="educms_part">
                            <h5>Kontak</h5>
                            <div class="educms_single_contact_info">
                                <h6>Phone:</h6>
                                <p>{{ $config->config_telp }}</p>
                            </div>
                            <div class="educms_single_contact_info">
                                <h6>Email:</h6>
                                <p>{{ $config->config_email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Start -->
        <div class=" educms_bottom_header_one p-3 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>&copy; {{ $config->config_title_web }}, Powered by EDUCMS {{ FunctionStatic::versi_app() }} <a href="https://orapakat.com" target="_blank"><b>Orapakat Dev</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>