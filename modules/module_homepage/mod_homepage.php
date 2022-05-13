<?php
include 'cont_homepage.php';

class ModHomepage
{
  private $homepage;
  function __construct() {
    $this->homepage = new ContHomepage();
  }
}
?>