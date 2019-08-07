<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/datos';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }

    /*protected function credentials(Request $request)
	{
		$login = $request->input($this->username());
		// Comprobar si el input coincide con el formato de E-mail
		$field = filter_var($login, FILTER_VALIDATE_EMAIL)?'email':'m_canuipe';

		return [
	 		$field => $login,
	 		'password' => $request->input('password')
	 	];
	}

	public function username()
	{
		return 'login';
	}*/
}
