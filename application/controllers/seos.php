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
    $url = $this->input->get_post('url');
    $st = $st < 15 ? 15 :$st;
    $limit = 30;
    $searchUrlTotal = $this->toolmodel->getSearchLinkTotal();
    if( !$page){
      $page = ceil($searchUrlTotal / $limit);
    }
    $searchUrlList = $this->toolmodel->getSearchLinkList($page, $limit);
    $n_p = $page - 1;
    $next_page = $n_p > 0 ?'':'';
    $page_string = '';
    $this->assign(array('page'=>$page,'searchUrlTotal'=>$searchUrlTotal,'kw'=>$url,'next_page'=>$next_page,'auto'=>$auto,'st'=>$st,'page_string'=>$page_string,'searchUrlList'=>$searchUrlList));
    $this->view('seos_seo'); 
  }
}
