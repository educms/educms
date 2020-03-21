<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use DB;
    use DataTables;
    use Illuminate\Support\Str;
    use File;

    class Backend extends Controller {

        public function add_toast($text)
        {
        return "
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
            });
            Toast.fire({
            type: 'success',
            title: '".$text."'
            })
        </script>
        ";
        }

        public function delete_toast($text)
        {
        return "
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
            });
            Toast.fire({
            type: 'error',
            title: '".$text."'
            })
        </script>
        ";
        }

        public function edit_toast($tetx)
        {
        return "
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
            });
            Toast.fire({
            type: 'warning',
            title: '".$tetx."'
            })
        </script>
        ";
        }

        public function tgl_indo($tgl)
        {
            $date = explode("-",@$tgl);
            return $date[2].'/'.$date[1].'/'.$date[0];
        }

        public function check_slug(Request $req)
        {
            $title = $req->input('title');
            $table = $req->input('table');
            $param = $req->input('param');
            $slug = Str::slug($title);
            $select = DB::table($table)->where($param,$slug)->count();
            if ($select > 0) {
                $slg = $slug.time();
            }else{
                $slg = $slug;
            }
            return response()->json(['slug' => $slg]);
        }
        // Website Kategori
        public function categories()
        {
            return view('backend::website.kategori');
        }

        public function categories_json()
        {
            $kategori = DB::table('categories')->get();

            $rtn = DataTables::of($kategori);
            $rtn->addColumn('actions',function($kategori){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editkategori" data-id="'.$kategori->categories_id.'" data-title="'.$kategori->categories_title.'" data-slug="'.$kategori->categories_slug.'" class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/categories/delete/'.$kategori->categories_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function categories_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('categories')->insert($data);
            if ($insert) {
                return redirect('mypanel/website/categories')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }

        public function categories_edit_act(Request $req)
        {
            $data = $req->except('_token');

            $update = DB::table('categories')->where('categories_id',$data['categories_id'])->update($data);
            if ($update) {
                return redirect('mypanel/website/categories')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }
        
        public function categories_delete($id)
        {
            $delete = DB::table('categories')->where('categories_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/categories')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }
        
        // Website Tag
        public function tag()
        {
            return view('backend::website.tag');
        }

        public function tag_json()
        {
            $tag = DB::table('tag')->get();

            $rtn = DataTables::of($tag);
            $rtn->addColumn('actions',function($tag){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#edittag" data-id="'.$tag->tag_id.'" data-title="'.$tag->tag_title.'" data-slug="'.$tag->tag_slug.'" class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/tag/delete/'.$tag->tag_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function tag_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('tag')->insert($data);
            if ($insert) {
                return redirect('mypanel/website/tag')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }

        public function tag_edit_act(Request $req)
        {
            $data = $req->except('_token');

            $update = DB::table('tag')->where('tag_id',$data['tag_id'])->update($data);
            if ($update) {
                return redirect('mypanel/website/tag')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }
        
        public function tag_delete($id)
        {
            $delete = DB::table('tag')->where('tag_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/tag')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Website Post
        public function post()
        {
            $cat = DB::table('categories')->get();
            $tag = DB::table('tag')->get();
            return view('backend::website.post',['cat'=>$cat,'tag'=>$tag]);
        }

        public function post_json()
        {
            $post = DB::table('post AS a')
                ->leftJoin('categories AS b','a.post_categories','=','b.categories_id')
                ->get();

            $rtn = DataTables::of($post);
            $rtn->addColumn('actions',function($post){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editpost" 
                                                data-id="'.$post->post_id.'" 
                                                data-title="'.$post->post_title.'" 
                                                data-slug="'.$post->post_slug.'" 
                                                data-categories="'.$post->post_categories.'" 
                                                data-publish="'.$post->post_publish_date.'" 
                                                data-status="'.$post->post_status.'" 
                                                data-tags="'.$post->post_tags.'" 
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/post/delete/'.$post->post_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('post_title',function($post){
                return $post->post_title."<br /><small>".$post->post_slug."</small>";
            });
            $rtn->editColumn('post_body',function($post){
                return Str::limit($post->post_body, $limit = 200, $end = '...');
            });
            $rtn->editColumn('post_image',function($post){
                if (!is_null($post->post_image)) {
                    return "<img src='".url('files')."/".$post->post_image."' width='100' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('post_publish_date',function($post){
                return $this->tgl_indo($post->post_publish_date);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function post_add_act(Request $req)
        {
            $post_id            = uniqid('post');
            $post_slug          = $req->input('post_slug');
            $post_title         = $req->input('post_title');
            $post_body          = $req->input('post_body');
            $post_image         = $req->file('post_image');
            $post_categories    = $req->input('post_categories');
            $post_owner         = session('user_id');
            $post_publish_date  = $req->input('post_publish_date');
            $post_status        = $req->input('post_status');
            $post_tags          = $req->input('post_tags');
            
            $tags = '';
            foreach ($post_tags as $value) {
                $tags.= $value.',';
            }
            $tag = rtrim($tags,',');

            if (!empty($post_image)) {
                $strname          = "post-".time();
                $destinationPath  = 'files/';
                $extensions     = $post_image->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $post_image->move($destinationPath, $filename);

                $insert = DB::table('post')
                        ->insert(['post_id'=>$post_id,
                                    'post_slug'=>$post_slug,
                                    'post_title'=>$post_title,
                                    'post_body'=>$post_body,
                                    'post_image'=>$filename,
                                    'post_categories'=>$post_categories,
                                    'post_owner'=>$post_owner,
                                    'post_publish_date'=>$post_publish_date,
                                    'post_status'=>$post_status,
                                    'post_tags'=>$tag]);

            }else{
                $insert = DB::table('post')
                        ->insert(['post_id'=>$post_id,
                                    'post_slug'=>$post_slug,
                                    'post_title'=>$post_title,
                                    'post_body'=>$post_body,
                                    'post_categories'=>$post_categories,
                                    'post_owner'=>$post_owner,
                                    'post_publish_date'=>$post_publish_date,
                                    'post_status'=>$post_status,
                                    'post_tags'=>$tag]);
            }

            if ($insert) {
                return redirect('mypanel/website/post')->with('add',$this->add_toast('Berhasil buat post baru'));
            }
            
        }

        public function post_value_click(Request $req)
        {
            $id = $req->input('id');
            $select = DB::table('post')->where('post_id',$id)->first();
            return response()->json(['body' => $select->post_body]);
        }

        public function post_edit_act(Request $req)
        {
            $post_id            = $req->input('post_id');
            $post_slug          = $req->input('post_slug');
            $post_title         = $req->input('post_title');
            $post_body          = $req->input('post_body');
            $post_image         = $req->file('post_image');
            $post_categories    = $req->input('post_categories');
            $post_owner         = session('user_id');
            $post_publish_date  = $req->input('post_publish_date');
            $post_status        = $req->input('post_status');
            $post_tags          = $req->input('post_tags');
            
            $tags = '';
            foreach ($post_tags as $value) {
                $tags.= $value.',';
            }
            $tag = rtrim($tags,',');

            if (!empty($post_image)) {
                $strname          = "post-".time();
                $destinationPath  = 'files/';
                $extensions     = $post_image->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $post_image->move($destinationPath, $filename);

                $insert = DB::table('post')
                        ->where('post_id',$post_id)
                        ->update(['post_slug'=>$post_slug,
                                    'post_title'=>$post_title,
                                    'post_body'=>$post_body,
                                    'post_image'=>$filename,
                                    'post_categories'=>$post_categories,
                                    'post_owner'=>$post_owner,
                                    'post_publish_date'=>$post_publish_date,
                                    'post_status'=>$post_status,
                                    'post_tags'=>$tag]);

            }else{
                $insert = DB::table('post')
                        ->where('post_id',$post_id)
                        ->update(['post_slug'=>$post_slug,
                                    'post_title'=>$post_title,
                                    'post_body'=>$post_body,
                                    'post_categories'=>$post_categories,
                                    'post_owner'=>$post_owner,
                                    'post_publish_date'=>$post_publish_date,
                                    'post_status'=>$post_status,
                                    'post_tags'=>$tag]);
            }

            if ($insert) {
                return redirect('mypanel/website/post')->with('edit',$this->edit_toast('Berhasil ubah post'));
            }
            
        }
        
        public function post_delete($id)
        {
            $delete = DB::table('post')->where('post_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/post')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }
        
        // Website Page
        public function page()
        {
            $conf = DB::table('config')->first();
            $data = File::allFiles(base_path().'/themes/'.$conf->config_themes.'/plugins/');
            return view('backend::website.page',['files'=>$data]);
        }

        public function page_json()
        {
            $page = DB::table('page')->get();

            $rtn = DataTables::of($page);
            $rtn->addColumn('actions',function($page){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editpage" 
                                                data-id="'.$page->page_id.'" 
                                                data-title="'.$page->page_title.'" 
                                                data-slug="'.$page->page_slug.'" 
                                                data-publish="'.$page->page_publish_date.'" 
                                                data-template="'.$page->page_template.'" 
                                                data-status="'.$page->page_status.'" 
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/page/delete/'.$page->page_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('page_title',function($page){
                return $page->page_title."<br /><small>".$page->page_slug."</small>";
            });
            $rtn->editColumn('page_body',function($page){
                return Str::limit($page->page_body, $limit = 200, $end = '...');
            });
            $rtn->editColumn('page_image',function($page){
                if (!is_null($page->page_image)) {
                    return "<img src='".url('files')."/".$page->page_image."' width='100' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('page_publish_date',function($page){
                return $this->tgl_indo($page->page_publish_date);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function page_add_act(Request $req)
        {
            $page_id            = uniqid('page');
            $page_slug          = $req->input('page_slug');
            $page_title         = $req->input('page_title');
            $page_body          = $req->input('page_body');
            $page_image         = $req->file('page_image');
            $page_owner         = session('user_id');
            $page_publish_date  = $req->input('page_publish_date');
            $page_template      = $req->input('page_template');
            $page_status        = $req->input('page_status');

            if (!empty($page_image)) {
                $strname          = "page-".time();
                $destinationPath  = 'files/';
                $extensions     = $page_image->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $page_image->move($destinationPath, $filename);

                $insert = DB::table('page')
                        ->insert(['page_id'=>$page_id,
                                    'page_slug'=>$page_slug,
                                    'page_title'=>$page_title,
                                    'page_body'=>$page_body,
                                    'page_image'=>$filename,
                                    'page_owner'=>$page_owner,
                                    'page_publish_date'=>$page_publish_date,
                                    'page_status'=>$page_status,
                                    'page_template'=>$page_template]);

            }else{
                $insert = DB::table('page')
                        ->insert(['page_id'=>$page_id,
                                    'page_slug'=>$page_slug,
                                    'page_title'=>$page_title,
                                    'page_body'=>$page_body,
                                    'page_owner'=>$page_owner,
                                    'page_publish_date'=>$page_publish_date,
                                    'page_status'=>$page_status,
                                    'page_template'=>$page_template]);
            }

            if ($insert) {
                return redirect('mypanel/website/page')->with('add',$this->add_toast('Berhasil buat page baru'));
            }
            
        }

        public function page_value_click(Request $req)
        {
            $id = $req->input('id');
            $select = DB::table('page')->where('page_id',$id)->first();
            return response()->json(['body' => $select->page_body]);
        }

        public function page_edit_act(Request $req)
        {
            $page_id            = $req->input('page_id');
            $page_slug          = $req->input('page_slug');
            $page_title         = $req->input('page_title');
            $page_body          = $req->input('page_body');
            $page_image         = $req->file('page_image');
            $page_owner         = session('user_id');
            $page_publish_date  = $req->input('page_publish_date');
            $page_template      = $req->input('page_template');
            $page_status        = $req->input('page_status');

            if (!empty($page_image)) {
                $strname          = "page-".time();
                $destinationPath  = 'files/';
                $extensions     = $page_image->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $page_image->move($destinationPath, $filename);

                $insert = DB::table('page')
                        ->where('page_id',$page_id)
                        ->update(['page_slug'=>$page_slug,
                                    'page_title'=>$page_title,
                                    'page_body'=>$page_body,
                                    'page_image'=>$filename,
                                    'page_owner'=>$page_owner,
                                    'page_publish_date'=>$page_publish_date,
                                    'page_status'=>$page_status,
                                    'page_template'=>$page_template]);

            }else{
                $insert = DB::table('page')
                        ->where('page_id',$page_id)
                        ->update(['page_slug'=>$page_slug,
                                    'page_title'=>$page_title,
                                    'page_body'=>$page_body,
                                    'page_owner'=>$page_owner,
                                    'page_publish_date'=>$page_publish_date,
                                    'page_status'=>$page_status,
                                    'page_template'=>$page_template]);
            }

            if ($insert) {
                return redirect('mypanel/website/page')->with('edit',$this->edit_toast('Berhasil ubah page'));
            }
            
        }
        
        public function page_delete($id)
        {
            $delete = DB::table('page')->where('page_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/page')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Website Slider
        public function slider()
        {
            return view('backend::website.slider');
        }

        public function slider_json()
        {
            $slider = DB::table('slider')->get();

            $rtn = DataTables::of($slider);
            $rtn->addColumn('actions',function($slider){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editslider" 
                                                data-id="'.$slider->slider_id.'" 
                                                data-title="'.$slider->slider_title.'" 
                                                data-desc="'.$slider->slider_description.'" 
                                                data-url="'.$slider->slider_url.'"
                                                data-status="'.$slider->slider_status.'"
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/slider/delete/'.$slider->slider_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('slider_image',function($slider){
                if (!is_null($slider->slider_image)) {
                    return "<img src='".url('files')."/".$slider->slider_image."' width='100' />";
                }else{
                    return '';
                }
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function slider_add_act(Request $req)
        {
            $slider_id          = uniqid('slider');
            $slider_title       = $req->input('slider_title');
            $slider_description = $req->input('slider_description');
            $slider_url         = $req->input('slider_url');
            $slider_status      = $req->input('slider_status');
            $slider_image       = $req->file('slider_image');
            $slider_owner       = session('user_id');

            if (!empty($slider_image)) {
                $strname          = "slider-".time();
                $destinationPath  = 'files/';
                $extensions     = $slider_image->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $slider_image->move($destinationPath, $filename);

                $insert = DB::table('slider')
                        ->insert(['slider_id'=>$slider_id,
                                    'slider_title'=>$slider_title,
                                    'slider_description'=>$slider_description,
                                    'slider_image'=>$filename,
                                    'slider_url'=>$slider_url,
                                    'slider_status'=>$slider_status,
                                    'slider_owner'=>$slider_owner]);

            }else{
                $insert = DB::table('slider')
                        ->insert(['slider_id'=>$slider_id,
                                    'slider_title'=>$slider_title,
                                    'slider_description'=>$slider_description,
                                    'slider_url'=>$slider_url,
                                    'slider_status'=>$slider_status,
                                    'slider_owner'=>$slider_owner]);
            }

            if ($insert) {
                return redirect('mypanel/website/slider')->with('add',$this->add_toast('Berhasil buat slider baru'));
            }
            
        }

        public function slider_edit_act(Request $req)
        {
            $slider_id          = $req->input('slider_id');
            $slider_title       = $req->input('slider_title');
            $slider_description = $req->input('slider_description');
            $slider_url         = $req->input('slider_url');
            $slider_status      = $req->input('slider_status');
            $slider_image       = $req->file('slider_image');

            if (!empty($slider_image)) {
                $strname          = "slider-".time();
                $destinationPath  = 'files/';
                $extensions     = $slider_image->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $slider_image->move($destinationPath, $filename);

                $insert = DB::table('slider')
                        ->where('slider_id',$slider_id)
                        ->update(['slider_title'=>$slider_title,
                                    'slider_description'=>$slider_description,
                                    'slider_image'=>$filename,
                                    'slider_url'=>$slider_url,
                                    'slider_status'=>$slider_status]);

            }else{
                $insert = DB::table('slider')
                        ->where('slider_id',$slider_id)
                        ->update(['slider_title'=>$slider_title,
                                    'slider_description'=>$slider_description,
                                    'slider_url'=>$slider_url,
                                    'slider_status'=>$slider_status]);
            }

            if ($insert) {
                return redirect('mypanel/website/slider')->with('edit',$this->edit_toast('Berhasil ubah slider'));
            }
            
        }
        
        public function slider_delete($id)
        {
            $delete = DB::table('slider')->where('slider_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/slider')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }
        
        // Website Link
        public function link()
        {
            return view('backend::website.link');
        }

        public function link_json()
        {
            $link = DB::table('link')->get();

            $rtn = DataTables::of($link);
            $rtn->addColumn('actions',function($link){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editlink" data-id="'.$link->link_id.'" data-title="'.$link->link_title.'" data-url="'.$link->link_url.'" class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/link/delete/'.$link->link_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function link_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('link')->insert($data);
            if ($insert) {
                return redirect('mypanel/website/link')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }

        public function link_edit_act(Request $req)
        {
            $data = $req->except('_token');

            $update = DB::table('link')->where('link_id',$data['link_id'])->update($data);
            if ($update) {
                return redirect('mypanel/website/link')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }
        
        public function link_delete($id)
        {
            $delete = DB::table('link')->where('link_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/link')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Website Sosmed
        public function sosmed()
        {
            return view('backend::website.sosmed');
        }

        public function sosmed_json()
        {
            $sosmed = DB::table('sosmed')->get();

            $rtn = DataTables::of($sosmed);
            $rtn->addColumn('actions',function($sosmed){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editsosmed" data-id="'.$sosmed->sosmed_id.'" data-title="'.$sosmed->sosmed_title.'" data-url="'.$sosmed->sosmed_url.'" data-icon="'.$sosmed->sosmed_icon.'" class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/sosmed/delete/'.$sosmed->sosmed_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function sosmed_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('sosmed')->insert($data);
            if ($insert) {
                return redirect('mypanel/website/sosmed')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }

        public function sosmed_edit_act(Request $req)
        {
            $data = $req->except('_token');

            $update = DB::table('sosmed')->where('sosmed_id',$data['sosmed_id'])->update($data);
            if ($update) {
                return redirect('mypanel/website/sosmed')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }
        
        public function sosmed_delete($id)
        {
            $delete = DB::table('sosmed')->where('sosmed_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/sosmed')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Website Photo Gallery
        public function photo()
        {
            return view('backend::website.photo');
        }

        public function photo_json()
        {
            $photo = DB::table('album')->get();

            $rtn = DataTables::of($photo);
            $rtn->addColumn('actions',function($photo){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editphoto" 
                                                data-id="'.$photo->album_id.'" 
                                                data-title="'.$photo->album_title.'"
                                                data-slug="'.$photo->album_slug.'"
                                                data-status="'.$photo->album_status.'"
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/photo/delete/'.$photo->album_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('album_cover',function($photo){
                if (!is_null($photo->album_cover)) {
                    return "<img src='".url('files')."/".$photo->album_cover."' width='100' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('album_publish_date',function($photo){
                return $this->tgl_indo($photo->album_publish_date);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function photo_add_act(Request $req)
        {
            $album_title        = $req->input('album_title');
            $album_slug         = $req->input('album_slug');
            $album_status       = $req->input('album_status');
            $album_publish_date = $req->input('album_publish_date');
            $album_cover        = $req->file('album_cover');
            $album_photo        = $req->file('album_photo');
            $destinationPath    = 'files/';

            $strcover   = "cover-album-".time();
            $extcover   = $album_cover->getClientOriginalExtension();
            $filecover  = $strcover.".".$extcover;
            $album_cover->move($destinationPath, $filecover);

            $photos = '';
            foreach ($album_photo as $key => $path) {
                $strphoto   = "photo-album-".time().$key;
                $extphoto   = $path->getClientOriginalExtension();
                $filephoto  = $strphoto.".".$extphoto;
                $path->move($destinationPath, $filephoto);

                $photos.= $filephoto.',';
            }
            $photoval = rtrim($photos,',');
            $photoval = ltrim($photoval,',');

            $insert = DB::table('album')
                    ->insert([
                            'album_title'=>$album_title,
                            'album_slug'=>$album_slug,
                            'album_cover'=>$filecover,
                            'album_publish_date'=>$album_publish_date,
                            'album_status'=>$album_status,
                            'album_photo'=>$photoval
                            ]);

            if ($insert) {
                return redirect('mypanel/website/photo')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }
        
        public function photo_edit_act(Request $req)
        {
            $album_id           = $req->input('album_id');
            $album_title        = $req->input('album_title');
            $album_slug         = $req->input('album_slug');
            $album_status       = $req->input('album_status');
            $album_cover        = $req->file('album_cover');
            $album_photo        = $req->file('album_photo');
            $destinationPath    = 'files/';

            if (!empty($album_cover) || !empty($album_photo)) {
                if (!empty($album_cover)) {
                    $strcover   = "cover-album-".time();
                    $extcover   = $album_cover->getClientOriginalExtension();
                    $filecover  = $strcover.".".$extcover;
                    $album_cover->move($destinationPath, $filecover);

                    $insert = DB::table('album')
                            ->where('album_id',$album_id)
                            ->update([
                                    'album_title'=>$album_title,
                                    'album_slug'=>$album_slug,
                                    'album_cover'=>$filecover,
                                    'album_status'=>$album_status
                                    ]);
                }elseif (!empty($album_photo)) {
                    $plist = DB::table('album')->where('album_id',$album_id)->first();
                    
                    if (!is_null($plist->album_photo) || !empty($plist->album_photo)) {
                        $existvalue = $plist->album_photo.',';
                    }else{
                        $existvalue = '';
                    } 
                    $photos = '';
                    foreach ($album_photo as $key => $path) {
                        $strphoto   = "photo-album-".time().$key;
                        $extphoto   = $path->getClientOriginalExtension();
                        $filephoto  = $strphoto.".".$extphoto;
                        $path->move($destinationPath, $filephoto);

                        $photos.= $filephoto.',';
                    }
                    $photoval = rtrim($photos,',');
                    $photoval = ltrim($photoval,',');

                    $insert = DB::table('album')
                            ->where('album_id',$album_id)
                            ->update([
                                    'album_title'=>$album_title,
                                    'album_slug'=>$album_slug,
                                    'album_status'=>$album_status,
                                    'album_photo'=>$existvalue.$photoval
                                    ]);
                }    
            }else{
                $insert = DB::table('album')
                        ->where('album_id',$album_id)
                        ->update([
                                'album_title'=>$album_title,
                                'album_slug'=>$album_slug,
                                'album_status'=>$album_status
                                ]);
            }

            if ($insert) {
                return redirect('mypanel/website/photo')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }

        public function photo_list($id)
        {
            $photo = DB::table('album')->where('album_id',$id)->first();
            $id = $photo->album_id;
            echo '<div class="row">';
            $len = count(explode(',', $photo->album_photo));
            foreach(explode(',', $photo->album_photo) as $no => $iphoto){
                if (!empty($iphoto)) {
                    $key = $no+1;
                    if ($key == 1) {
                        echo '
                        <div class="callout callout-danger col-md-3 text-center">
                            <a href="##" id="delphoto" data-idp="'.$id.'" data-imagep="'.$iphoto.'," class="text-white btn btn-xs btn-danger mb-2" ><i class="fa fa-trash"></i> Hapus Photo</a>
                            <img src="'.url("files").'/'.$iphoto.'" style="width:100%;position:relative;" />
                        </div>
                        ';
                    }elseif($key == $len) {
                        echo '
                        <div class="callout callout-danger col-md-3 text-center">
                            <a href="##" id="delphoto" data-idp="'.$id.'" data-imagep=",'.$iphoto.'" class="text-white btn btn-xs btn-danger mb-2" ><i class="fa fa-trash"></i> Hapus Photo</a>
                            <img src="'.url("files").'/'.$iphoto.'" style="width:100%;position:relative;" />
                        </div>
                        ';
                    }else{
                        echo '
                        <div class="callout callout-danger col-md-3 text-center">
                            <a href="##" id="delphoto" data-idp="'.$id.'" data-imagep="'.$iphoto.'," class="text-white btn btn-xs btn-danger mb-2" ><i class="fa fa-trash"></i> Hapus Photo</a>
                            <img src="'.url("files").'/'.$iphoto.'" style="width:100%;position:relative;" />
                        </div>
                        ';
                    }
                }
            }
            echo '</div>';

        }

        public function photo_delete($id)
        {
            $delete = DB::table('album')->where('album_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/photo')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }
        
        public function photo_delete_list(Request $req)
        {
            $id = $req->input('id');
            $image = $req->input('image');
            $list = DB::table('album')->where('album_id',$id)->first();
            $gambar = $list->album_photo;
            $photoval = str_replace($image,"",$gambar);
            $update = DB::table('album')->where('album_id',$id)->update(['album_photo'=>$photoval]);
            if ($update) {
                echo $id;
            }
        }

        // Website Video
        public function video()
        {
            return view('backend::website.video');
        }

        public function video_json()
        {
            $video = DB::table('video')->get();

            $rtn = DataTables::of($video);
            $rtn->addColumn('actions',function($video){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editvideo" 
                                                data-id="'.$video->video_id.'" 
                                                data-title="'.$video->video_title.'"
                                                data-slug="'.$video->video_slug.'"
                                                data-link="'.$video->video_link.'"
                                                data-status="'.$video->video_status.'"
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/website/video/delete/'.$video->video_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('video_thumbnail',function($video){
                if (!is_null($video->video_thumbnail)) {
                    return "<img src='".$video->video_thumbnail."' width='100' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('video_publish_date',function($video){
                return $this->tgl_indo($video->video_publish_date);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function generate_thumbnail($pageVideUrl)
        {
            $link = $pageVideUrl;
            $video_id = explode("?v=", $link);
            if (!isset($video_id[1])) {
                $video_id = explode("youtu.be/", $link);
            }
            $youtubeID = $video_id[1];
            if (empty($video_id[1])) $video_id = explode("/v/", $link);
            $video_id = explode("&", $video_id[1]);
            $youtubeVideoID = $video_id[0];
            if ($youtubeVideoID) {
                return 'https://img.youtube.com/vi/'.$youtubeVideoID.'/mqdefault.jpg';
            } else {
                return false;
            }
        }
        
        public function generate_embed($pageVideUrl)
        {
            $link = $pageVideUrl;
            $video_id = explode("?v=", $link);
            if (!isset($video_id[1])) {
                $video_id = explode("youtu.be/", $link);
            }
            $youtubeID = $video_id[1];
            if (empty($video_id[1])) $video_id = explode("/v/", $link);
            $video_id = explode("&", $video_id[1]);
            $youtubeVideoID = $video_id[0];
            if ($youtubeVideoID) {
                return 'http://www.youtube.com/embed/'.$youtubeVideoID;
            } else {
                return false;
            }
        }

        public function video_add_act(Request $req)
        {
            $video_title        = $req->input('video_title');
            $video_slug         = $req->input('video_slug');
            $video_link         = $req->input('video_link');
            $video_publish_date = $req->input('video_publish_date');
            $video_status       = $req->input('video_status');
            $video_embed        = $this->generate_embed($video_link);
            $video_thumbnail    = $this->generate_thumbnail($video_link);

            $insert = DB::table('video')
                    ->insert([
                            'video_title'=>$video_title,
                            'video_slug'=>$video_slug,
                            'video_link'=>$video_link,
                            'video_embed'=>$video_embed,
                            'video_thumbnail'=>$video_thumbnail,
                            'video_publish_date'=>$video_publish_date,
                            'video_status'=>$video_status
                            ]);
            
            if ($insert) {
                return redirect('mypanel/website/video')->with('add',$this->add_toast('Berhasil tambah data'));
            }              

        }
        
        public function video_edit_act(Request $req)
        {
            $video_id           = $req->input('video_id');
            $video_title        = $req->input('video_title');
            $video_slug         = $req->input('video_slug');
            $video_link         = $req->input('video_link');
            $video_status       = $req->input('video_status');
            $video_embed        = $this->generate_embed($video_link);
            $video_thumbnail    = $this->generate_thumbnail($video_link);


            $cek = DB::table('video')->where('video_id',$video_id)->first();
            if ($video_link == $cek->video_link) {
                $update = DB::table('video')
                        ->where('video_id',$video_id)
                        ->update([
                            'video_title'=>$video_title,
                            'video_slug'=>$video_slug,
                            'video_status'=>$video_status
                            ]);
            }else{
                $update = DB::table('video')
                        ->where('video_id',$video_id)
                        ->update([
                            'video_title'=>$video_title,
                            'video_slug'=>$video_slug,
                            'video_link'=>$video_link,
                            'video_embed'=>$video_embed,
                            'video_thumbnail'=>$video_thumbnail,
                            'video_status'=>$video_status
                            ]);
            }
            
            
            if ($update) {
                return redirect('mypanel/website/video')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }              

        }

        public function video_delete($id)
        {
            $delete = DB::table('video')->where('video_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/website/video')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Direktori Staf Tenaga Pendidik
        public function pendidik()
        {
            return view('backend::direktori.pendidik');
        }

        public function pendidik_json()
        {
            $pendidik = DB::table('pendidik')->get();

            $rtn = DataTables::of($pendidik);
            $rtn->addColumn('actions',function($pendidik){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editpendidik" 
                                                data-id="'.$pendidik->pendidik_id.'" 
                                                data-slug="'.$pendidik->pendidik_slug.'" 
                                                data-nip="'.$pendidik->pendidik_nip.'" 
                                                data-nama="'.$pendidik->pendidik_nama.'" 
                                                data-tempatlahir="'.$pendidik->pendidik_tempat_lahir.'"
                                                data-tgllahir="'.$pendidik->pendidik_tgl_lahir.'"
                                                data-alamat="'.$pendidik->pendidik_alamat.'"
                                                data-jabatan="'.$pendidik->pendidik_jabatan.'"
                                                data-keterangan="'.$pendidik->pendidik_keterangan.'"
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/direktori/staf-pendidik/delete/'.$pendidik->pendidik_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('pendidik_photo',function($pendidik){
                if (!is_null($pendidik->pendidik_photo)) {
                    return "<img src='".url('files')."/".$pendidik->pendidik_photo."' width='80' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('pendidik_nama',function($pendidik){
                return "<small><b>".$pendidik->pendidik_nip."</b></small><br />".$pendidik->pendidik_nama;
            });
            $rtn->addColumn('ttl',function($pendidik){
                return $pendidik->pendidik_tempat_lahir.", ".$this->tgl_indo($pendidik->pendidik_tgl_lahir);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function pendidik_add_act(Request $req)
        {
            $pendidik_id            = uniqid('pendidik');
            $pendidik_slug          = $req->input('pendidik_slug');
            $pendidik_nip           = $req->input('pendidik_nip');
            $pendidik_nama          = $req->input('pendidik_nama');
            $pendidik_tempat        = $req->input('pendidik_tempat_lahir');
            $pendidik_tgl           = $req->input('pendidik_tgl_lahir');
            $pendidik_alamat        = $req->input('pendidik_alamat');
            $pendidik_jabatan       = $req->input('pendidik_jabatan');
            $pendidik_keterangan    = $req->input('pendidik_keterangan');
            $pendidik_photo         = $req->file('pendidik_photo');

            if (!empty($pendidik_photo)) {
                $strname          = "pendidik-".time();
                $destinationPath  = 'files/';
                $extensions     = $pendidik_photo->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $pendidik_photo->move($destinationPath, $filename);

                $insert = DB::table('pendidik')
                        ->insert(['pendidik_id'=>$pendidik_id,
                                    'pendidik_slug'=>$pendidik_slug,
                                    'pendidik_nip'=>$pendidik_nip,
                                    'pendidik_nama'=>$pendidik_nama,
                                    'pendidik_tempat_lahir'=>$pendidik_tempat,
                                    'pendidik_tgl_lahir'=>$pendidik_tgl,
                                    'pendidik_alamat'=>$pendidik_alamat,
                                    'pendidik_jabatan'=>$pendidik_jabatan,
                                    'pendidik_keterangan'=>$pendidik_keterangan,
                                    'pendidik_photo'=>$filename
                                    ]);

            }else{
                $insert = DB::table('pendidik')
                        ->insert(['pendidik_id'=>$pendidik_id,
                                    'pendidik_slug'=>$pendidik_slug,
                                    'pendidik_nip'=>$pendidik_nip,
                                    'pendidik_nama'=>$pendidik_nama,
                                    'pendidik_tempat_lahir'=>$pendidik_tempat,
                                    'pendidik_tgl_lahir'=>$pendidik_tgl,
                                    'pendidik_alamat'=>$pendidik_alamat,
                                    'pendidik_jabatan'=>$pendidik_jabatan,
                                    'pendidik_keterangan'=>$pendidik_keterangan
                                    ]);
            }

            if ($insert) {
                return redirect('mypanel/direktori/staf-pendidik')->with('add',$this->add_toast('Berhasil tambah staf pendidik baru'));
            }
            
        }
        
        public function pendidik_edit_act(Request $req)
        {
            $pendidik_id            = $req->input('pendidik_id');
            $pendidik_slug          = $req->input('pendidik_slug');
            $pendidik_nip           = $req->input('pendidik_nip');
            $pendidik_nama          = $req->input('pendidik_nama');
            $pendidik_tempat        = $req->input('pendidik_tempat_lahir');
            $pendidik_tgl           = $req->input('pendidik_tgl_lahir');
            $pendidik_alamat        = $req->input('pendidik_alamat');
            $pendidik_jabatan       = $req->input('pendidik_jabatan');
            $pendidik_keterangan    = $req->input('pendidik_keterangan');
            $pendidik_photo         = $req->file('pendidik_photo');

            if (!empty($pendidik_photo)) {
                $strname          = "pendidik-".time();
                $destinationPath  = 'files/';
                $extensions     = $pendidik_photo->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $pendidik_photo->move($destinationPath, $filename);

                $update = DB::table('pendidik')
                        ->where('pendidik_id',$pendidik_id)
                        ->update(['pendidik_slug'=>$pendidik_slug,
                                    'pendidik_nip'=>$pendidik_nip,
                                    'pendidik_nama'=>$pendidik_nama,
                                    'pendidik_tempat_lahir'=>$pendidik_tempat,
                                    'pendidik_tgl_lahir'=>$pendidik_tgl,
                                    'pendidik_alamat'=>$pendidik_alamat,
                                    'pendidik_jabatan'=>$pendidik_jabatan,
                                    'pendidik_keterangan'=>$pendidik_keterangan,
                                    'pendidik_photo'=>$filename
                                    ]);

            }else{
                $update = DB::table('pendidik')
                        ->where('pendidik_id',$pendidik_id)
                        ->update(['pendidik_slug'=>$pendidik_slug,
                                    'pendidik_nip'=>$pendidik_nip,
                                    'pendidik_nama'=>$pendidik_nama,
                                    'pendidik_tempat_lahir'=>$pendidik_tempat,
                                    'pendidik_tgl_lahir'=>$pendidik_tgl,
                                    'pendidik_alamat'=>$pendidik_alamat,
                                    'pendidik_jabatan'=>$pendidik_jabatan,
                                    'pendidik_keterangan'=>$pendidik_keterangan
                                    ]);
            }

            if ($update) {
                return redirect('mypanel/direktori/staf-pendidik')->with('edit',$this->edit_toast('Berhasil ubah staf pendidik'));
            }
            
        }
        
        public function pendidik_delete($id)
        {
            $delete = DB::table('pendidik')->where('pendidik_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/direktori/staf-pendidik')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Direktori Kelas
        public function kelas()
        {
            return view('backend::direktori.kelas');
        }

        public function kelas_json()
        {
            $kelas = DB::table('kelas')->get();

            $rtn = DataTables::of($kelas);
            $rtn->addColumn('actions',function($kelas){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editkelas" data-id="'.$kelas->kelas_id.'" data-title="'.$kelas->kelas_nama.'" data-slug="'.$kelas->kelas_slug.'" class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/direktori/kelas/delete/'.$kelas->kelas_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function kelas_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('kelas')->insert($data);
            if ($insert) {
                return redirect('mypanel/direktori/kelas')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }

        public function kelas_edit_act(Request $req)
        {
            $data = $req->except('_token');

            $update = DB::table('kelas')->where('kelas_id',$data['kelas_id'])->update($data);
            if ($update) {
                return redirect('mypanel/direktori/kelas')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }
        
        public function kelas_delete($id)
        {
            $delete = DB::table('kelas')->where('kelas_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/direktori/kelas')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Direktori Tahun Pelajaran
        public function tahun_pelajaran()
        {
            return view('backend::direktori.tahun-pelajaran');
        }

        public function tahun_pelajaran_json()
        {
            $tahun_pelajaran = DB::table('tahun_pelajaran')->get();

            $rtn = DataTables::of($tahun_pelajaran);
            $rtn->addColumn('actions',function($tahun_pelajaran){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#edittahun_pelajaran" data-id="'.$tahun_pelajaran->tahun_pelajaran_id.'" data-title="'.$tahun_pelajaran->tahun_pelajaran_nama.'" data-slug="'.$tahun_pelajaran->tahun_pelajaran_slug.'" class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/direktori/tahun-pelajaran/delete/'.$tahun_pelajaran->tahun_pelajaran_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function tahun_pelajaran_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('tahun_pelajaran')->insert($data);
            if ($insert) {
                return redirect('mypanel/direktori/tahun-pelajaran')->with('add',$this->add_toast('Berhasil tambah data baru'));
            }
        }

        public function tahun_pelajaran_edit_act(Request $req)
        {
            $data = $req->except('_token');

            $update = DB::table('tahun_pelajaran')->where('tahun_pelajaran_id',$data['tahun_pelajaran_id'])->update($data);
            if ($update) {
                return redirect('mypanel/direktori/tahun-pelajaran')->with('edit',$this->edit_toast('Berhasil ubah data'));
            }
        }
        
        public function tahun_pelajaran_delete($id)
        {
            $delete = DB::table('tahun_pelajaran')->where('tahun_pelajaran_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/direktori/tahun-pelajaran')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Direktori Peserta Didik
        public function siswa()
        {
            $kelas = DB::table('kelas')->get();
            return view('backend::direktori.peserta-didik',['kelas'=>$kelas]);
        }

        public function siswa_json()
        {
            $siswa = DB::table('siswa AS a')
                    ->leftJoin('kelas AS b','a.siswa_kelas','=','b.kelas_id')
                    ->get();

            $rtn = DataTables::of($siswa);
            $rtn->addColumn('actions',function($siswa){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editsiswa" 
                                                data-id="'.$siswa->siswa_id.'" 
                                                data-slug="'.$siswa->siswa_slug.'" 
                                                data-nis="'.$siswa->siswa_nis.'" 
                                                data-nama="'.$siswa->siswa_nama.'" 
                                                data-tempatlahir="'.$siswa->siswa_tempat_lahir.'"
                                                data-tgllahir="'.$siswa->siswa_tgl_lahir.'"
                                                data-jk="'.$siswa->siswa_jk.'"
                                                data-alamat="'.$siswa->siswa_alamat.'"
                                                data-kelas="'.$siswa->siswa_kelas.'"
                                                data-keterangan="'.$siswa->siswa_keterangan.'"
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/direktori/peserta-didik/delete/'.$siswa->siswa_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('siswa_photo',function($siswa){
                if (!is_null($siswa->siswa_photo)) {
                    return "<img src='".url('files')."/".$siswa->siswa_photo."' width='80' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('siswa_nama',function($siswa){
                return "<small><b>".$siswa->siswa_nis."</b></small><br />".$siswa->siswa_nama;
            });
            $rtn->addColumn('ttl',function($siswa){
                return $siswa->siswa_tempat_lahir.", ".$this->tgl_indo(@$siswa->siswa_tgl_lahir);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function siswa_add_act(Request $req)
        {
            $siswa_id            = uniqid('pesertadidik');
            $siswa_slug          = $req->input('siswa_slug');
            $siswa_nis           = $req->input('siswa_nis');
            $siswa_nama          = $req->input('siswa_nama');
            $siswa_tempat        = $req->input('siswa_tempat_lahir');
            $siswa_tgl           = $req->input('siswa_tgl_lahir');
            $siswa_jk            = $req->input('siswa_jk');
            $siswa_alamat        = $req->input('siswa_alamat');
            $siswa_kelas         = $req->input('siswa_kelas');
            $siswa_keterangan    = $req->input('siswa_keterangan');
            $siswa_photo         = $req->file('siswa_photo');

            if (!empty($siswa_photo)) {
                $strname          = "pesertadidik-".time();
                $destinationPath  = 'files/';
                $extensions     = $siswa_photo->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $siswa_photo->move($destinationPath, $filename);

                $insert = DB::table('siswa')
                        ->insert(['siswa_id'=>$siswa_id,
                                    'siswa_slug'=>$siswa_slug,
                                    'siswa_nis'=>$siswa_nis,
                                    'siswa_nama'=>$siswa_nama,
                                    'siswa_tempat_lahir'=>$siswa_tempat,
                                    'siswa_tgl_lahir'=>$siswa_tgl,
                                    'siswa_jk'=>$siswa_jk,
                                    'siswa_alamat'=>$siswa_alamat,
                                    'siswa_kelas'=>$siswa_kelas,
                                    'siswa_keterangan'=>$siswa_keterangan,
                                    'siswa_photo'=>$filename
                                    ]);

            }else{
                $insert = DB::table('siswa')
                        ->insert(['siswa_id'=>$siswa_id,
                                    'siswa_slug'=>$siswa_slug,
                                    'siswa_nis'=>$siswa_nis,
                                    'siswa_nama'=>$siswa_nama,
                                    'siswa_tempat_lahir'=>$siswa_tempat,
                                    'siswa_tgl_lahir'=>$siswa_tgl,
                                    'siswa_jk'=>$siswa_jk,
                                    'siswa_alamat'=>$siswa_alamat,
                                    'siswa_kelas'=>$siswa_kelas,
                                    'siswa_keterangan'=>$siswa_keterangan
                                    ]);
            }

            if ($insert) {
                return redirect('mypanel/direktori/peserta-didik')->with('add',$this->add_toast('Berhasil tambah peserta didik baru'));
            }
            
        }
        
        public function siswa_edit_act(Request $req)
        {
            $siswa_id            = $req->input('siswa_id');
            $siswa_slug          = $req->input('siswa_slug');
            $siswa_nis           = $req->input('siswa_nis');
            $siswa_nama          = $req->input('siswa_nama');
            $siswa_tempat        = $req->input('siswa_tempat_lahir');
            $siswa_tgl           = $req->input('siswa_tgl_lahir');
            $siswa_jk            = $req->input('siswa_jk');
            $siswa_alamat        = $req->input('siswa_alamat');
            $siswa_kelas         = $req->input('siswa_kelas');
            $siswa_keterangan    = $req->input('siswa_keterangan');
            $siswa_photo         = $req->file('siswa_photo');

            if (!empty($siswa_photo)) {
                $strname          = "pesertadidik-".time();
                $destinationPath  = 'files/';
                $extensions     = $siswa_photo->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $siswa_photo->move($destinationPath, $filename);

                $update = DB::table('siswa')
                        ->where('siswa_id',$siswa_id)
                        ->update(['siswa_slug'=>$siswa_slug,
                                    'siswa_nis'=>$siswa_nis,
                                    'siswa_nama'=>$siswa_nama,
                                    'siswa_tempat_lahir'=>$siswa_tempat,
                                    'siswa_tgl_lahir'=>$siswa_tgl,
                                    'siswa_jk'=>$siswa_jk,
                                    'siswa_alamat'=>$siswa_alamat,
                                    'siswa_kelas'=>$siswa_kelas,
                                    'siswa_keterangan'=>$siswa_keterangan,
                                    'siswa_photo'=>$filename
                                    ]);

            }else{
                $update = DB::table('siswa')
                        ->where('siswa_id',$siswa_id)
                        ->update(['siswa_slug'=>$siswa_slug,
                                    'siswa_nis'=>$siswa_nis,
                                    'siswa_nama'=>$siswa_nama,
                                    'siswa_tempat_lahir'=>$siswa_tempat,
                                    'siswa_tgl_lahir'=>$siswa_tgl,
                                    'siswa_jk'=>$siswa_jk,
                                    'siswa_alamat'=>$siswa_alamat,
                                    'siswa_kelas'=>$siswa_kelas,
                                    'siswa_keterangan'=>$siswa_keterangan
                                    ]);
            }

            if ($update) {
                return redirect('mypanel/direktori/peserta-didik')->with('edit',$this->edit_toast('Berhasil ubah peserta didik'));
            }
            
        }
        
        public function siswa_delete($id)
        {
            $delete = DB::table('siswa')->where('siswa_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/direktori/peserta-didik')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }
        // Direktori Alumni
        public function alumni()
        {
            return view('backend::direktori.alumni');
        }

        public function alumni_json()
        {
            $alumni = DB::table('alumni')->get();

            $rtn = DataTables::of($alumni);
            $rtn->addColumn('actions',function($alumni){
                return '
                <div class="btn-group">
                <a href="##" data-toggle="modal" data-target="#editalumni" 
                                                data-id="'.$alumni->alumni_id.'" 
                                                data-slug="'.$alumni->alumni_slug.'" 
                                                data-nis="'.$alumni->alumni_nis.'" 
                                                data-nama="'.$alumni->alumni_nama.'" 
                                                data-tempatlahir="'.$alumni->alumni_tempat_lahir.'"
                                                data-tgllahir="'.$alumni->alumni_tgl_lahir.'"
                                                data-jk="'.$alumni->alumni_jk.'"
                                                data-alamat="'.$alumni->alumni_alamat.'"
                                                data-masuk="'.$alumni->alumni_masuk.'"
                                                data-keluar="'.$alumni->alumni_keluar.'"
                                                class="edit btn btn-xs btn-warning"> <i class="fa fa-pencil-alt"></i> Ubah</a>
                <a href="##" onclick="confirm_delete(\'Anda yakin akan menghapus data ini?\',\'mypanel/direktori/alumni/delete/'.$alumni->alumni_id.'\')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                </div>
                ';
            });
            $rtn->editColumn('alumni_photo',function($alumni){
                if (!is_null($alumni->alumni_photo)) {
                    return "<img src='".url('files')."/".$alumni->alumni_photo."' width='80' />";
                }else{
                    return '';
                }
            });
            $rtn->editColumn('alumni_nama',function($alumni){
                return "<small><b>".$alumni->alumni_nis."</b></small><br />".$alumni->alumni_nama;
            });
            $rtn->addColumn('ttl',function($alumni){
                return $alumni->alumni_tempat_lahir.", ".$this->tgl_indo(@$alumni->alumni_tgl_lahir);
            });
            $rtn->escapeColumns([]);
            return $rtn->make(true);
        }

        public function alumni_add_act(Request $req)
        {
            $alumni_id            = uniqid('alumni');
            $alumni_slug          = $req->input('alumni_slug');
            $alumni_nis           = $req->input('alumni_nis');
            $alumni_nama          = $req->input('alumni_nama');
            $alumni_tempat        = $req->input('alumni_tempat_lahir');
            $alumni_tgl           = $req->input('alumni_tgl_lahir');
            $alumni_jk            = $req->input('alumni_jk');
            $alumni_alamat        = $req->input('alumni_alamat');
            $alumni_masuk         = $req->input('alumni_masuk');
            $alumni_keluar        = $req->input('alumni_keluar');
            $alumni_photo         = $req->file('alumni_photo');

            if (!empty($alumni_photo)) {
                $strname          = "alumni-".time();
                $destinationPath  = 'files/';
                $extensions     = $alumni_photo->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $alumni_photo->move($destinationPath, $filename);

                $insert = DB::table('alumni')
                        ->insert(['alumni_id'=>$alumni_id,
                                    'alumni_slug'=>$alumni_slug,
                                    'alumni_nis'=>$alumni_nis,
                                    'alumni_nama'=>$alumni_nama,
                                    'alumni_tempat_lahir'=>$alumni_tempat,
                                    'alumni_tgl_lahir'=>$alumni_tgl,
                                    'alumni_jk'=>$alumni_jk,
                                    'alumni_alamat'=>$alumni_alamat,
                                    'alumni_masuk'=>$alumni_masuk,
                                    'alumni_keluar'=>$alumni_keluar,
                                    'alumni_photo'=>$filename
                                    ]);

            }else{
                $insert = DB::table('alumni')
                        ->insert(['alumni_id'=>$alumni_id,
                                    'alumni_slug'=>$alumni_slug,
                                    'alumni_nis'=>$alumni_nis,
                                    'alumni_nama'=>$alumni_nama,
                                    'alumni_tempat_lahir'=>$alumni_tempat,
                                    'alumni_tgl_lahir'=>$alumni_tgl,
                                    'alumni_jk'=>$alumni_jk,
                                    'alumni_alamat'=>$alumni_alamat,
                                    'alumni_masuk'=>$alumni_masuk,
                                    'alumni_keluar'=>$alumni_keluar
                                    ]);
            }

            if ($insert) {
                return redirect('mypanel/direktori/alumni')->with('add',$this->add_toast('Berhasil tambah alumni baru'));
            }
            
        }
        
        public function alumni_edit_act(Request $req)
        {
            $alumni_id            = $req->input('alumni_id');
            $alumni_slug          = $req->input('alumni_slug');
            $alumni_nis           = $req->input('alumni_nis');
            $alumni_nama          = $req->input('alumni_nama');
            $alumni_tempat        = $req->input('alumni_tempat_lahir');
            $alumni_tgl           = $req->input('alumni_tgl_lahir');
            $alumni_jk            = $req->input('alumni_jk');
            $alumni_alamat        = $req->input('alumni_alamat');
            $alumni_masuk         = $req->input('alumni_masuk');
            $alumni_keluar        = $req->input('alumni_keluar');
            $alumni_photo         = $req->file('alumni_photo');

            if (!empty($alumni_photo)) {
                $strname          = "pesertadidik-".time();
                $destinationPath  = 'files/';
                $extensions     = $alumni_photo->getClientOriginalExtension();
                $filename       = $strname.".".$extensions;
                $alumni_photo->move($destinationPath, $filename);

                $update = DB::table('alumni')
                        ->where('alumni_id',$alumni_id)
                        ->update(['alumni_slug'=>$alumni_slug,
                                    'alumni_nis'=>$alumni_nis,
                                    'alumni_nama'=>$alumni_nama,
                                    'alumni_tempat_lahir'=>$alumni_tempat,
                                    'alumni_tgl_lahir'=>$alumni_tgl,
                                    'alumni_jk'=>$alumni_jk,
                                    'alumni_alamat'=>$alumni_alamat,
                                    'alumni_masuk'=>$alumni_masuk,
                                    'alumni_keluar'=>$alumni_keluar,
                                    'alumni_photo'=>$filename
                                    ]);
            }else{
                $update = DB::table('alumni')
                        ->where('alumni_id',$alumni_id)
                        ->update(['alumni_slug'=>$alumni_slug,
                                    'alumni_nis'=>$alumni_nis,
                                    'alumni_nama'=>$siswa_nama,
                                    'alumni_tempat_lahir'=>$siswa_tempat,
                                    'alumni_tgl_lahir'=>$siswa_tgl,
                                    'alumni_jk'=>$siswa_jk,
                                    'alumni_alamat'=>$siswa_alamat,
                                    'alumni_masuk'=>$alumni_masuk,
                                    'alumni_keluar'=>$alumni_keluar
                                    ]);
            }

            if ($update) {
                return redirect('mypanel/direktori/alumni')->with('edit',$this->edit_toast('Berhasil ubah alumni'));
            }
            
        }
        
        public function alumni_delete($id)
        {
            $delete = DB::table('alumni')->where('alumni_id',$id)->delete();
            if ($delete) {
                return redirect('mypanel/direktori/alumni')->with('delete',$this->delete_toast('Berhasil hapus data'));
            }
        }

        // Konfigurasi menu editor
        public function menu_editor()
        {
            $menu = DB::table('menu')->whereNull('menu_sub')->orderBy('menu_id','ASC')->get();
            return view('backend::configuration.menu-editor',['menu'=>$menu]);
        }

        public function menu_editor_page_show()
        {
            $pages = DB::table('page')->where('page_status','Published')->get();
            echo '
            <div class="form-group row">
                <label class="col-sm-4">PAGE</label>
                <div class="col-sm-8">
                    <select name="menu_page" class="form-control select2show" required>';
                    foreach ($pages as $value) {
                        echo '<option value="'.$value->page_id.'">'.$value->page_title.'</option>';
                    }                    
            echo'   </select>
                </div>
            </div>
            ';
            echo "
            <script>
                $('.select2show').select2({
                    theme: 'bootstrap4'
                })
            </script>  
            ";
        }

        public function menu_editor_add_act(Request $req)
        {
            $data = $req->except('_token');

            $insert = DB::table('menu')->insert($data);
            if ($insert) {
                return redirect('mypanel/configuration/menu-editor')->with('add',$this->add_toast('Berhasil tambah menu baru'));
            }
        }

        public function menu_editor_delete($id)
        {
            $delete = DB::table('menu')->where('menu_id',$id)->delete();
            if ($delete) {
                DB::table('menu')->where('menu_sub',$id)->delete();
                return redirect('mypanel/configuration/menu-editor')->with('delete',$this->delete_toast('Berhasil hapus menu'));
            }
        }

        // Konfigurasi General
        public function general()
        {
            $general = DB::table('config')->first();
            $data = File::directories(base_path().'/themes/');
            return view('backend::configuration.general',['general'=>$general,'data'=>$data]);
        }

        public function general_edit_act(Request $req)
        {
            $config_id              = $req->input('config_id');
            $config_title           = $req->input('config_title_web');
            $config_telp            = $req->input('config_telp');
            $config_email           = $req->input('config_email');
            $config_themes          = $req->input('config_themes');
            $config_sambutan        = $req->input('config_sambutan');
            $config_kepala_sekolah  = $req->input('config_kepala_sekolah');
            $config_label_kepala    = $req->input('config_label_kepala');
            $config_foto_kepala     = $req->file('config_foto_kepala');
            $config_favicon         = $req->file('config_favicon');
            $config_logo            = $req->file('config_logo');
            $destinationPath        = 'files/';
            
            if (!empty($config_foto_kepala) || !empty($config_favicon) || !empty($config_logo)) {
                if (!empty($config_foto_kepala)) {
                    $strfoto    = "pimpinan-".time();
                    $extfoto    = $config_foto_kepala->getClientOriginalExtension();
                    $filefoto   = $strfoto.".".$extfoto;
                    $config_foto_kepala->move($destinationPath, $filefoto);

                    $insert = DB::table('config')
                            ->where('config_id',$config_id)
                            ->update(['config_themes'=>$config_themes,    
                                        'config_sambutan'=>$config_sambutan,    
                                        'config_kepala_sekolah'=>$config_kepala_sekolah,    
                                        'config_foto_kepala'=>$filefoto,  
                                        'config_label_kepala'=>$config_label_kepala,    
                                        'config_title_web'=>$config_title,    
                                        'config_telp'=>$config_telp,    
                                        'config_email'=>$config_email    
                                    ]);
                }elseif (!empty($config_favicon)) {                    
                    $strfavi    = "favicon-".time();
                    $extfavi    = $config_favicon->getClientOriginalExtension();
                    $filefavi   = $strfavi.".".$extfavi;
                    $config_favicon->move($destinationPath, $filefavi);

                    $insert = DB::table('config')
                            ->where('config_id',$config_id)
                            ->update(['config_themes'=>$config_themes,    
                                        'config_sambutan'=>$config_sambutan,    
                                        'config_kepala_sekolah'=>$config_kepala_sekolah,  
                                        'config_favicon'=>$filefavi,   
                                        'config_label_kepala'=>$config_label_kepala,    
                                        'config_title_web'=>$config_title,    
                                        'config_telp'=>$config_telp,    
                                        'config_email'=>$config_email        
                                    ]);
                }elseif (!empty($config_logo)) {                    
                    $strlogo    = "logo-".time();
                    $extlogo    = $config_logo->getClientOriginalExtension();
                    $filelogo   = $strlogo.".".$extlogo;
                    $config_logo->move($destinationPath, $filelogo);

                    $insert = DB::table('config')
                            ->where('config_id',$config_id)
                            ->update(['config_themes'=>$config_themes,    
                                        'config_sambutan'=>$config_sambutan,    
                                        'config_kepala_sekolah'=>$config_kepala_sekolah,  
                                        'config_logo'=>$filelogo,    
                                        'config_label_kepala'=>$config_label_kepala,    
                                        'config_title_web'=>$config_title,    
                                        'config_telp'=>$config_telp,    
                                        'config_email'=>$config_email        
                                    ]);
                }

            }
            else {
                $insert = DB::table('config')
                        ->where('config_id',$config_id)
                        ->update(['config_themes'=>$config_themes,    
                                    'config_sambutan'=>$config_sambutan,    
                                    'config_kepala_sekolah'=>$config_kepala_sekolah, 
                                    'config_label_kepala'=>$config_label_kepala,    
                                    'config_title_web'=>$config_title,    
                                    'config_telp'=>$config_telp,    
                                    'config_email'=>$config_email        
                                ]);

            }
            

            if ($insert) {
                return redirect('mypanel/configuration/general')->with('edit',$this->edit_toast('Berhasil ubah konfigurasi'));
            }
        }

    }
?>        