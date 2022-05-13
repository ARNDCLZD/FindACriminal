<?php

class ContHomepage {

  public function __construct(){
    $this->showHomepage();
  }
  public function showHomepage(){
    include_once "vue_homepage.html";
  }
}
?>