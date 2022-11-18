<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class ClientInfo {


    public function __construct()
    {
        if(Session::has('user')){
            $this->auth = true;
            foreach(Session::get('user') as $key => $value){
                $this->$key = $value;
            }
        }
        else{
            $this->auth = false; 
        }
    }

    public function auth()
    {
        return $this->auth;
    }

}