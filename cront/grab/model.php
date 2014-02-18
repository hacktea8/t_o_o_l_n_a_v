<?php

require_once ROOTPATH.'../db.class.php';

class Model{
  public $db = null;
  public function __construct(){
    $this->db = new DB_MYSQL();
  }
  public function getRowBydomain($domain = ''){
    $domain = md5(trim($domain));
    $sql = sprintf("SELECT `id` FROM `searchlinks` WHERE `domain`='%s' LIMIT 1",$domain);
    $row = $this->db->row_array($sql);
    return isset($row['id'])?$row['id']:0;
  }
  public function addRow($data = array()){
    $domain = parse_url('http://'.$data['url']);
//var_dump($domain);exit;
    $domain = $domain['host'];
    $id = $this->getRowBydomain($domain);
    if($id){
      return true;
    }
    $data['sort'] = mt_rand(0,3000);
    $data['domain'] = md5($domain);
    $sql = $this->db->insert_string('searchlinks',$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }
}
?>
