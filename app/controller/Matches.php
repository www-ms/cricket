<?php
use App\Base;
class Matches extends Base{
    public function __construct($SINGLE = false){
        if($SINGLE){
            $this->single("matches");
        }else{
            $this->archive("matches");
        }
    }

    public function single($dir){
        $this->view("$dir/single");
    }
    public function archive($dir){
        $this->view("$dir/archive");
    }
}