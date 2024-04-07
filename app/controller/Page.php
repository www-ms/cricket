<?php
use App\Base;

class Page extends Base
{
    public function __construct($page)
    {
        if ($page == 'adduser') {
            $this->adduser();
        }elseif ($page == 'fields-users') {
            $this->fields_users();
        }
        else {
            $this->view($page);
        }
    }

    public function adduser()
    {
        $this->view('adduser');
    }

    public function fields_users(){
        $this->view('fields-users');
    }
}