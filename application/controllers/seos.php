<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('webbase.php');
class Seos extends Webbase {

  public function __construct(){
    parent::__construct();
    $this->load->model('toolmodel');
  }
  public function index(){
    $this->view('seos_index');
  }
  public function seo($page = '',$auto = 1, $st = 30){
    $page = intval($page);
    $auto = intval($auto);
    $st = intval($st);
    $url = $this->input->get('url');
    $st = $st < 15 ? 15 :$st;
    if( !$page){
      $page = $this->toolmodel->getSearchLinkList();
    }
    $searchUrlList = $this->toolmodel->getSearchLinkList($page);
    $n_p = $page - 1;
    $next_page = $n_p > 0 ?'':'';
    $page_string = '';
    $this->assign(array('url'=>$url,'next_page'=>$next_page,'autostart'=>$auto,'st'=>$st,'page_string'=>$page_string,'searchUrlList'=>$searchUrlList));
    $this->view('seos_seo'); 
  }
}
