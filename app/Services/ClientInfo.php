<?php
namespace App\Services;

use Illuminate\Support\Facades\Session;

class ClientInfo {


    public function __construct()
    {
        if(Session::has('user')){
            foreach(Session::get('user') as $key => $value){
                $this->$key = $value;
            }
        }
    }

}