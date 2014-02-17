<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webbase extends CI_Controller {
  public $viewData=array();


  public function __construct(){
    parent::__construct();
    //$this->load->model('testModel');

    $this->setviewdata(array('css_url'=>$this->config->item('base_css'),
    'js_url'=>$this->config->item('base_js'),'img_url'=>$this->config->item('base_imgs'),'site_name'=>$this->config->item('site_name'),'site_keywords'=>$this->config->item('site_keywords'),
    'site_description'=>$this->config->item('site_description'),'base_url'=>$this->config->item('base_url')
    ,'notice'=>''
    ));
  }
  public function setviewdata($param=array()){
    foreach($param as $key=>$val){
       $this->viewData[$key]=$val;
    }
    return true;
  }
  public function view($view){
    $this->load->view('header',$this->viewData);
    $this->load->view($view);
    $this->load->view('footer');
  }
}

