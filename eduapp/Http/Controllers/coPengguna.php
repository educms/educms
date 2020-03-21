<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use DB;
use Response;
class coPengguna extends Controller {

	public function salah_toast($text)
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
          title: '".$text."'
        })
      </script>
      ";
    }

	public function cekLogin(Request $req){

        $user= $req->input('username');
        $pass = $req->input('password');


        $check = DB::table('user')->where('user_name',$user)->where('user_enabled','1')->count();

        if($check < 1)  {
            return redirect('mypanel/auth/login')->with('status', 'Maaf, username atau password yang anda inputkan salah');
        }else{
			$passwordcheck = DB::table('user')->where('user_name',$user)->where('user_enabled','1')->first();
			if(Hash::check($pass, $passwordcheck->user_password)){
				$take = DB::table('user')->where('user_name',$user)->where('user_enabled','1')->first();
				
				session(['user_displayname' => $take->user_displayname]);
				session(['user_id' => $take->user_id]);
				session(['user_role' => $take->user_role]);
				session(['user_password' => true ]);
				
				return redirect('mypanel');

			}else{
				return redirect('mypanel/auth/login')->with('status', 'Maaf, username atau password yang anda inputkan salah');
			}
		}

    }

    function logout(Request $req){
			$req->session()->regenerate();
			$req->session()->flush();
			return redirect('mypanel/auth/login');
	}
	
}
