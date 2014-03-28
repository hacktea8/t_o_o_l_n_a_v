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
  public function seo($auto = 1, $st = 30,$page = ''){
    $page = intval($page);
    $pa = $this->input->get_post('auto');
    $auto = $pa ? $pa == 'yes' ?1:0 : $auto;
    $auto = intval($auto);
    $pp = $this->input->get_post('st');
    $st = $pp ? $pp : $st;
    $st = intval($st);
    $url = $this->input->get_post('url');
    $st = $st < 15 ? 15 :$st;
    $limit = 30;
    $searchUrlTotal = $this->toolmodel->getSearchLinkTotal();
    $pageTotal = ceil($searchUrlTotal / $limit);
    $page = ($page > $pageTotal || $page < 1) ? $pageTotal : $page;
    $searchUrlList = $this->toolmodel->getSearchLinkList($page, $limit);
    $n_p = $page - 1;
    $next_page = $n_p > 0 ? sprintf('/seos/seo/%d/%d/%d/?url=%s',$auto,$st,$page - 1,$url):'';
    $this->load->library('pagestring');
    $config['cur_page'] = $page;
    $config['asc'] = 0;
    $config['base_url'] = sprintf('/seos/seo/%d/%d/_p_/?url=%s',$auto,$st,$url);
    $config['total_rows'] = $searchUrlTotal;
    $config['per_page'] = $limit;
    $this->pagestring->initialize($config);
    $page_string = $this->pagestring->create_links();
    $this->assign(array('page'=>$page,'searchUrlTotal'=>$searchUrlTotal,'kw'=>$url,'next_page'=>$next_page,'auto'=>$auto,'st'=>$st,'page_string'=>$page_string,'searchUrlList'=>$searchUrlList));
    $this->view('seos_seo'); 
  }
}
