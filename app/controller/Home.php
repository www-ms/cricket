<?php
use App\Base;

class Home extends Base
{
    public function __construct()
    {
        require __MODEL__ . "_login.php";
        $this->view('login');
    }
}