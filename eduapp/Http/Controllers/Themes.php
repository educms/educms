<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use DB;

    class Themes extends Controller {

        public function base_themes()
        {
            $themes = DB::table('config')->first();
            return $themes->config_themes;
        }
        
        public function base_asset_themes()
        {
            $themes = DB::table('config')->first();
            return base_path().'/themes/'.$themes->config_themes.'/assets/';
        }

        public function post()
        {
            $post = DB::table('post')->where('post_status','Published')->orderBy('post_publish_date','DESC')->paginate(8);
            return view('theme::'.$this->base_themes().'.post',['post'=>$post]);
        }
        
        public function index()
        {
            $post = DB::table('post')->where('post_status','Published')->orderBy('post_publish_date','DESC')->limit(5)->get();
            $slider = DB::table('slider')->where('slider_status','Published')->orderBy('slider_id','DESC')->get();
            return view('theme::'.$this->base_themes().'.index',['post'=>$post,'slider'=>$slider]);
        }
        
        public function detail_post($slug)
        {
            $post = DB::table('post AS a')
                    ->leftJoin('categories AS b','a.post_categories','=','b.categories_id')
                    ->where('post_status','Published')
                    ->where('post_slug',$slug)
                    ->orderBy('post_publish_date','DESC')
                    ->first();
            
            $idcat = $post->post_categories;
            $idpost = $post->post_id;
            $default = DB::table('post AS a')
                    ->leftJoin('categories AS b','a.post_categories','=','b.categories_id')
                    ->where('post_status','Published')
                    ->where('post_categories',$idcat)
                    ->where('post_id','!=',$idpost)
                    ->orderBy('post_publish_date','DESC')
                    ->limit(2)
                    ->get();
                        
            return view('theme::'.$this->base_themes().'.detail-post',['post'=>$post,'related'=>$default]);
        }
        
        public function page($slug)
        {
            $page = DB::table('page')
                    ->where('page_status','Published')
                    ->where('page_slug',$slug)
                    ->orderBy('page_publish_date','DESC')
                    ->first();
            if ($page->page_template == 'none') {
                return view('theme::'.$this->base_themes().'.page',['page'=>$page]);
            }else{
                $expl = explode(".blade.",$page->page_template);
                return view('theme::'.$this->base_themes().'.plugins.'.$expl[0]);
            }    
        }

        public function category($slug)
        {
            $category = DB::table('categories')->where('categories_slug',$slug)->first();
            $idcat = $category->categories_id;
            $post = DB::table('post')->where('post_categories',$idcat)->where('post_status','Published')->orderBy('post_publish_date','DESC')->paginate(8);
            return view('theme::'.$this->base_themes().'.category',['post'=>$post, 'cat'=>$category]);
        }
        
        public function tag($slug)
        {
            $tag = DB::table('tag')->where('tag_slug',$slug)->first();
            $idtag = $tag->tag_id;
            $post = DB::table('post')
                    ->whereRaw("FIND_IN_SET(?, post_tags) > 0", [$idtag])
                    ->where('post_status','Published')
                    ->orderBy('post_publish_date','DESC')->paginate(8);
            return view('theme::'.$this->base_themes().'.tag',['post'=>$post, 'tag'=>$tag]);
        }

        public function sambutan()
        {
            return view('theme::'.$this->base_themes().'.sambutan');
        }

        public function search(Request $req)
        {
            $search = $req->input('searching');
            $post = DB::table('post')
                    ->where('post_title','like','%'.$search.'%')
                    ->where('post_status','Published')
                    ->orderBy('post_publish_date','DESC')->paginate(8);
            return view('theme::'.$this->base_themes().'.search',['post'=>$post, 'search'=>$search]);
        }

        public function photo_gallery()
        {
            $photo = DB::table('album')
                    ->where('album_status','Published')
                    ->orderBy('album_publish_date','DESC')->paginate(15);
            return view('theme::'.$this->base_themes().'.photo-gallery',['photo'=>$photo]);
        }
        
        public function detail_photo_gallery($id)
        {
            $detail = DB::table('album')
                    ->where('album_slug',$id)
                    ->where('album_status','Published')
                    ->first();

            $thumbnail = explode(',', $detail->album_photo);        
            return view('theme::'.$this->base_themes().'.detail-photo-gallery',['detail'=>$detail,'thumb'=>$thumbnail]);
        }
        
        public function video_gallery()
        {
            $video = DB::table('video')
                    ->where('video_status','Published')
                    ->orderBy('video_publish_date','DESC')->paginate(15);
            return view('theme::'.$this->base_themes().'.video-gallery',['video'=>$video]);
        }
        
        public function detail_video_gallery($id)
        {
            $video = DB::table('video')
                    ->where('video_slug',$id)
                    ->where('video_status','Published')
                    ->first();
            return view('theme::'.$this->base_themes().'.detail-video-gallery',['detail'=>$video]);
        }

        public function peserta_didik()
        {
            $peserta = DB::table('siswa AS a')
                    ->leftJoin('kelas AS b','a.siswa_kelas','=','b.kelas_id')
                    ->orderBy('siswa_nis','ASC')
                    ->paginate(24);
            return view('theme::'.$this->base_themes().'.peserta-didik',['peserta'=>$peserta]);
        }
        
        public function detail_peserta_didik($slug)
        {
            $peserta = DB::table('siswa AS a')
                    ->leftJoin('kelas AS b','a.siswa_kelas','=','b.kelas_id')
                    ->where('siswa_slug',$slug)
                    ->first();
            return view('theme::'.$this->base_themes().'.detail-peserta-didik',['detail'=>$peserta]);
        }

        public function staf_pendidik()
        {
            $staf = DB::table('pendidik')
                    ->orderBy('pendidik_nama','ASC')
                    ->paginate(24);
            return view('theme::'.$this->base_themes().'.staf-pendidik',['staf'=>$staf]);
        }
        
        public function detail_staf_pendidik($slug)
        {
            $staf = DB::table('pendidik')
                    ->where('pendidik_slug',$slug)
                    ->first();
            return view('theme::'.$this->base_themes().'.detail-staf-pendidik',['detail'=>$staf]);
        }
        
        public function alumni()
        {
            $alumni = DB::table('alumni')
                    ->orderBy('alumni_masuk','ASC')
                    ->paginate(24);
            return view('theme::'.$this->base_themes().'.alumni',['alumni'=>$alumni]);
        }
        
        public function detail_alumni($slug)
        {
            $alumni = DB::table('alumni')
                    ->where('alumni_slug',$slug)
                    ->first();
            return view('theme::'.$this->base_themes().'.detail-alumni',['detail'=>$alumni]);
        }

    }
?>        