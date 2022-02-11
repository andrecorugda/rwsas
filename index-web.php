<?php
session_start();
require_once __DIR__.'/controllers/WebController.php';

class IndexWeb extends WebController
{
    public function __construct()
    {
        if(isset($_SESSION["verified"])){
            if($_SESSION["verified"] == "admin"){
                $this->renderView();
            }
        }
    }
}

if(isset($_SESSION["verified"])){
    if($_SESSION["verified"] == "admin"){
        return new IndexWeb;
    }
}else{
    require_once __DIR__.'/auth-guard.php';
    return new AuthGuard;
}

?>