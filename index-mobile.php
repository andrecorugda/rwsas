<?php

require_once __DIR__.'/controllers/MobileController.php';

class IndexMobile extends MobileController
{
    public function __construct()
    {
        $this->renderView();
    }
}

new IndexMobile;

?>