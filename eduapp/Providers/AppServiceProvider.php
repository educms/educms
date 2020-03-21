<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configs = DB::table('config')->first();
        $sosmeds = DB::table('sosmed')->get();
        $tagss = DB::table('tag')->get();
        $links = DB::table('link')->get();
        $posts = DB::table('post')->orderBy('post_publish_date','DESC')->limit(3)->get();
        $categories = DB::table('categories')->get();
        $themes = DB::table('config')->first();
        $link = DB::table('link')->get();
        $photos = DB::table('album')->where('album_status','published')->limit(3)->orderBy('album_publish_date','DESC')->get();
        $videos = DB::table('video')->where('video_status','published')->limit(3)->orderBy('video_publish_date','DESC')->get();
        $base = config('educms_config.base_url_educms');
        $base_url= url('/')."/";
        $this->loadViewsFrom(base_path().'/themes', 'theme');
        $this->loadViewsFrom(base_path().'/backend', 'backend');
        view()->share('theme_name', $themes->config_themes);
        view()->share('theme_asset', $base.'themes/'.$themes->config_themes.'/assets/');
        view()->share('theme_files', $base.'files/');
        view()->share('backend_asset', $base.'backend/assets/');
        view()->share('post_link', $base_url.'post/');
        view()->share('page_link', $base_url.'page/');
        view()->share('link_wrap', $link);
        view()->share('config', $configs);
        view()->share('sosmed', $sosmeds);
        view()->share('tags', $tagss);
        view()->share('link', $links);
        view()->share('post_default', $posts);
        view()->share('photo_sidebar', $photos);
        view()->share('video_sidebar', $videos);
        view()->share('kategori', $categories);
    }
}
