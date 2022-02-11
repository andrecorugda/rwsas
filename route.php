<?php
session_start();
require_once __DIR__.'/controllers/WebController.php';
require_once __DIR__.'/controllers/AuthController.php';

class route
{
    public function __construct()
    {
        if(isset($_POST['action'])){
            $this->{$_POST['action']}();
        }
    }

    //auth
    public function login()
    {
        $auth = new AuthController();
        $auth->login();
        header("Location: dashboard");
    }

    public function logout()
    {
        $auth = new AuthController();
        $auth->logout();
        header("Location: dashboard");
    }

    //locations
    public function createLocation()
    {
        $web = new WebController();
        $web->createLocation();
        header("Location: dashboard?tab=1");
    }

    public function deleteLocation()
    {
        $web = new WebController();
        $web->deleteLocation();
    }

    public function editLocation()
    {
        $web = new WebController();
        $web->editLocation();
    }

    public function updateLocation()
    {
        $web = new WebController();
        $web->updateLocation();
    }

    //signages
    public function createSignage(){
        $web = new WebController();
        $web->createSignage();
        header("Location: dashboard?tab=2");
    }

    public function deleteSignage(){
        $web = new WebController();
        $web->deleteSignage();
    }

    public function editSignage(){
        $web = new WebController();
        $web->editSignage();
    }

    public function updateSignage(){
        $web = new WebController();
        $web->updateSignage();
        header("Location: dashboard?tab=2");
    }
}

new route;


?>