<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Front End
Route::get('/','Themes@index');
Route::get('post/{slug}','Themes@detail_post');
Route::get('postingan','Themes@post');
Route::get('page/{slug}','Themes@page');
Route::get('category/{slug}','Themes@category');
Route::get('tag/{slug}','Themes@tag');
Route::get('sambutan','Themes@sambutan');
Route::get('photo-gallery','Themes@photo_gallery');
Route::get('photo/{slug}','Themes@detail_photo_gallery');
Route::get('video-gallery','Themes@video_gallery');
Route::get('video/{slug}','Themes@detail_video_gallery');
Route::get('peserta-didik','Themes@peserta_didik');
Route::get('peserta-didik/{slug}','Themes@detail_peserta_didik');
Route::get('staf-pendidik','Themes@staf_pendidik');
Route::get('staf-pendidik/{slug}','Themes@detail_staf_pendidik');
Route::get('alumni','Themes@alumni');
Route::get('alumni/{slug}','Themes@detail_alumni');
Route::match(array('GET','POST'),'search','Themes@search');

// Back End
Route::post('mypanel/auth/act','coPengguna@cekLogin');

Route::get('mypanel/auth/login', function () {
    return view('backend::login');
});

Route::group(['middleware' => 'checklogin'], function () {
    Route::get('mypanel', function () {
        return view('backend::index');
    });
    Route::get('mypanel/auth/logout','coPengguna@logout');
    // slug
    // Route::get('mypanel/website/slug/{id}/{db}/{param}','Backend@check_slug');
    Route::get('mypanel/website/slug/create','Backend@check_slug');
    // website
    Route::get('mypanel/website/categories','Backend@categories');
    Route::get('mypanel/website/categories/json','Backend@categories_json');
    Route::get('mypanel/website/categories/delete/{id}','Backend@categories_delete');
    Route::post('mypanel/website/categories/add/act','Backend@categories_add_act');
    Route::post('mypanel/website/categories/edit/act','Backend@categories_edit_act');
    
    Route::get('mypanel/website/tag','Backend@tag');
    Route::get('mypanel/website/tag/json','Backend@tag_json');
    Route::get('mypanel/website/tag/delete/{id}','Backend@tag_delete');
    Route::post('mypanel/website/tag/add/act','Backend@tag_add_act');
    Route::post('mypanel/website/tag/edit/act','Backend@tag_edit_act');

    Route::get('mypanel/website/post','Backend@post');
    Route::get('mypanel/website/post/json','Backend@post_json');
    Route::get('mypanel/website/post/value/click','Backend@post_value_click');
    Route::get('mypanel/website/post/delete/{id}','Backend@post_delete');
    Route::post('mypanel/website/post/add/act','Backend@post_add_act');
    Route::post('mypanel/website/post/edit/act','Backend@post_edit_act');
    
    Route::get('mypanel/website/page','Backend@page');
    Route::get('mypanel/website/page/json','Backend@page_json');
    Route::get('mypanel/website/page/value/click','Backend@page_value_click');
    Route::get('mypanel/website/page/delete/{id}','Backend@page_delete');
    Route::post('mypanel/website/page/add/act','Backend@page_add_act');
    Route::post('mypanel/website/page/edit/act','Backend@page_edit_act');
    
    Route::get('mypanel/website/slider','Backend@slider');
    Route::get('mypanel/website/slider/json','Backend@slider_json');
    Route::get('mypanel/website/slider/delete/{id}','Backend@slider_delete');
    Route::post('mypanel/website/slider/add/act','Backend@slider_add_act');
    Route::post('mypanel/website/slider/edit/act','Backend@slider_edit_act');
    
    Route::get('mypanel/website/link','Backend@link');
    Route::get('mypanel/website/link/json','Backend@link_json');
    Route::get('mypanel/website/link/delete/{id}','Backend@link_delete');
    Route::post('mypanel/website/link/add/act','Backend@link_add_act');
    Route::post('mypanel/website/link/edit/act','Backend@link_edit_act');
    
    Route::get('mypanel/website/sosmed','Backend@sosmed');
    Route::get('mypanel/website/sosmed/json','Backend@sosmed_json');
    Route::get('mypanel/website/sosmed/delete/{id}','Backend@sosmed_delete');
    Route::post('mypanel/website/sosmed/add/act','Backend@sosmed_add_act');
    Route::post('mypanel/website/sosmed/edit/act','Backend@sosmed_edit_act');

    Route::get('mypanel/website/photo','Backend@photo');
    Route::get('mypanel/website/photo/json','Backend@photo_json');
    Route::get('mypanel/website/photo/list/{id}','Backend@photo_list');
    Route::get('mypanel/website/photo/list/delete/act','Backend@photo_delete_list');
    Route::get('mypanel/website/photo/delete/{id}','Backend@photo_delete');
    Route::post('mypanel/website/photo/add/act','Backend@photo_add_act');
    Route::post('mypanel/website/photo/edit/act','Backend@photo_edit_act');

    Route::get('mypanel/website/video','Backend@video');
    Route::get('mypanel/website/video/json','Backend@video_json');
    Route::post('mypanel/website/video/add/act','Backend@video_add_act');
    Route::post('mypanel/website/video/edit/act','Backend@video_edit_act');
    Route::get('mypanel/website/video/delete/{id}','Backend@video_delete');

    // Direktori
    Route::get('mypanel/direktori/staf-pendidik','Backend@pendidik');
    Route::get('mypanel/direktori/staf-pendidik/json','Backend@pendidik_json');
    Route::post('mypanel/direktori/staf-pendidik/add/act','Backend@pendidik_add_act');
    Route::post('mypanel/direktori/staf-pendidik/edit/act','Backend@pendidik_edit_act');
    Route::get('mypanel/direktori/staf-pendidik/delete/{id}','Backend@pendidik_delete');
    
    Route::get('mypanel/direktori/kelas','Backend@kelas');
    Route::get('mypanel/direktori/kelas/json','Backend@kelas_json');
    Route::post('mypanel/direktori/kelas/add/act','Backend@kelas_add_act');
    Route::post('mypanel/direktori/kelas/edit/act','Backend@kelas_edit_act');
    Route::get('mypanel/direktori/kelas/delete/{id}','Backend@kelas_delete');
    
    Route::get('mypanel/direktori/tahun-pelajaran','Backend@tahun_pelajaran');
    Route::get('mypanel/direktori/tahun-pelajaran/json','Backend@tahun_pelajaran_json');
    Route::post('mypanel/direktori/tahun-pelajaran/add/act','Backend@tahun_pelajaran_add_act');
    Route::post('mypanel/direktori/tahun-pelajaran/edit/act','Backend@tahun_pelajaran_edit_act');
    Route::get('mypanel/direktori/tahun-pelajaran/delete/{id}','Backend@tahun_pelajaran_delete');
    
    Route::get('mypanel/direktori/peserta-didik','Backend@siswa');
    Route::get('mypanel/direktori/peserta-didik/json','Backend@siswa_json');
    Route::post('mypanel/direktori/peserta-didik/add/act','Backend@siswa_add_act');
    Route::post('mypanel/direktori/peserta-didik/edit/act','Backend@siswa_edit_act');
    Route::get('mypanel/direktori/peserta-didik/delete/{id}','Backend@siswa_delete');
    
    Route::get('mypanel/direktori/alumni','Backend@alumni');
    Route::get('mypanel/direktori/alumni/json','Backend@alumni_json');
    Route::post('mypanel/direktori/alumni/add/act','Backend@alumni_add_act');
    Route::post('mypanel/direktori/alumni/edit/act','Backend@alumni_edit_act');
    Route::get('mypanel/direktori/alumni/delete/{id}','Backend@alumni_delete');

    // Konfigurasi
    Route::get('mypanel/configuration/menu-editor','Backend@menu_editor');
    Route::get('mypanel/configuration/menu-editor/page/show','Backend@menu_editor_page_show');
    Route::post('mypanel/configuration/menu-editor/add/act','Backend@menu_editor_add_act');
    Route::get('mypanel/configuration/menu-editor/delete/{id}','Backend@menu_editor_delete');
    
    Route::get('mypanel/configuration/general','Backend@general');
    Route::post('mypanel/configuration/general/edit/act','Backend@general_edit_act');

});    