<?php

require_once __DIR__.'/controllers/AuthController.php';

class AuthGuard extends AuthController
{
    public function __construct()
    {
        $this->renderView();
    }
}

?>