<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthUserServices;

class AuthUserController extends Controller
{

    private $authUserServices;

    public function __construct(AuthUserServices $authUserServices)
    {
        $this->authUserServices = $authUserServices;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param AuthRequest $request
     * @return View
     */
    public function login(AuthRequest $request)
    {
        $input = $request->validated();

        if (!$this->authUserServices->login($input['email'], $input['password'])) {
            return view('auth.login', ['message' => 'Something went wrong !']);
        } else {
            return view('index');
        }
    }

    /**
     * @return View
     */
    public function logOut()
    {
        $this->authUserServices->logOut();
        return view('index');
    }
}
