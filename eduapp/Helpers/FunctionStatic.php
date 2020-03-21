<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use DB;

class FunctionStatic
{
    public static function url_post($slug)
    {
        return url('post').'/'.$slug;
    }
    
    public static function url_page($slug)
    {
        return url('page').'/'.$slug;
    }
    
    public static function url_categories($slug)
    {
        return url('category').'/'.$slug;
    }
    
    public static function url_photo($slug)
    {
        return url('photo').'/'.$slug;
    }
    
    public static function url_video($slug)
    {
        return url('video').'/'.$slug;
    }
    public static function url_siswa($slug)
    {
        return url('peserta-didik').'/'.$slug;
    }
    public static function url_pendidik($slug)
    {
        return url('staf-pendidik').'/'.$slug;
    }
    public static function url_alumni($slug)
    {
        return url('alumni').'/'.$slug;
    }
    
    public static function url_tags($id)
    {
        $tag = DB::table('tag')->where('tag_id',$id)->first();
        return url('tag').'/'.$tag->tag_slug;
    }

    public static function tgl_indo($tgl)
    {
        $date = explode("-",@$tgl);
        return $date[2].'/'.$date[1].'/'.$date[0];
    }

    public static function tags($idtags)
    {
        $tag = DB::table('tag')->where('tag_id',$idtags)->first();
        return $tag->tag_title;
    }

    public static function url_menu($id)
    {
        $menu = DB::table('menu')->where('menu_id',$id)->first();
        if ($menu->menu_type == 'Link') {
            return $menu->menu_link;
        }elseif ($menu->menu_type == 'Page'){
            $idpages = $menu->menu_page;
            $pages = DB::table('page')->where('page_id',$idpages)->first();
            return url('page').'/'.$pages->page_slug;
        }
    }

    public static function versi_app()
    {
        return '1.0';
    }
    
}