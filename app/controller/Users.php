<?php
use App\Base;
class Users extends Base{
    public function __construct($SINGLE = false){
        if($SINGLE){
            $this->single("users");
        }else{
            $this->archive("users");
        }
    }

    public function single($dir){
        $this->view("$dir/single");
    }
    public function archive($dir){
        $this->view("$dir/archive");
    }
}