<?php
require_once __DIR__.'/libraries/Mobile-Detect-2.8.37/Mobile_Detect.php';

class Index
{
    private $detect;

    public function __construct()
    {
        $this->detect = new Mobile_Detect();
        $this->index();
    }

    public function index(){
        if( $this->detect->isMobile() || $this->detect->isTablet() ){
            require_once __DIR__.'/index-mobile.php';
            return new IndexMobile;
        }else{
            require_once __DIR__.'/index-web.php';
            return new IndexWeb;
        }
    }
}

new Index;

?>