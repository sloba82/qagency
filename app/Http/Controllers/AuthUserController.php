<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthUserServices;
use App\Services\ClientInfo;
use Illuminate\Http\RedirectResponse;

class AuthUserController extends Controller
{

    private $authUserServices;

    public function __construct(AuthUserServices $authUserServices)
    {
        $this->authUserServices = $authUserServices;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $input = $request->all();
        $input['email'] = 'ahsoka.tano@q.agency';
        $input['password'] = 'Kryze4President';

        if(!$this->authUserServices->login($input['email'], $input['password'])){
            return view('auth.login',['message' => 'Something went wrong !']);
        }
        else{
            return view('index');
        }
        
    }

    public function logOut()
    {
        $this->authUserServices->logOut();
        return view('index');
    }


}
