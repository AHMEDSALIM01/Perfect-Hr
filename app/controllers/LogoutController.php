<?php
class LogoutController extends Controller
{
    public function __construct()
    {
        session_start();
        
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        header('Location:'.URLROOT.'/');
    }
}