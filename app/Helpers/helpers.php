<?php

if(!function_exists("is_admin")){
    function is_admin(){
        if(\Illuminate\support\Facades\Auth::check()){
            if(\Illuminate\support\Facades\Auth::user()->role==\App\User::ADMIN){
                return true;
            }
        }
        return false;
    }
}