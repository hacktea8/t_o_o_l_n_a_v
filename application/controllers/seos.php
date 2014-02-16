<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('webbase.php');
class Seos extends Webbase {

  public function __construct(){
    parent::__construct();
    //$this->load->model('testModel');
  }
  public function index(){
    $this->view('seos_index');
  }
  public function seo(){
    
  }
}
