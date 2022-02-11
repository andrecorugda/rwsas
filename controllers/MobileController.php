<?php

require_once __DIR__.'/Controller.php';

class MobileController extends Controller
{
    public function renderView()
    {
        $this->view('components/mobile/main-view.php');
    }
}

?>