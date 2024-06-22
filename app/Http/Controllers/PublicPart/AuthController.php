<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.auth.';

    public function auth(): View{
        return view($this->_path . 'auth');
    }
    public function authenticate(Request $request): bool|string {
        try{
            if(!isset($request->username)) return $this->jsonResponse('1102', __('Please, enter your username'));
            if(!isset($request->password)) return $this->jsonResponse('1103', __('Please, enter your password'));

            $user = User::where('username', $request->username)->first();
            if(!$user) return $this->jsonResponse('1104', __('Unknown username'));

            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                $user = Auth::user();

                return $this->jsonResponse('0000', __('Success'), [
                    'uri' => route('system.dashboard')
                ]);
            }else {
                return $this->jsonResponse('1105', __('You have entered wrong password'));
            }
        }catch (\Exception $e){
            return $this->jsonResponse('1101', __('Error while processing your request. Please contact an administrator'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('public-part.home');
    }
}
