<?php

require_once 'basemodel.php';
class toolModel extents baseModel{
  
  public function __construct(){
    parent::__construct();
  }

  public function getSearchLinkList($page = 1,$limit = 30){
    $page = intval($page) - 1;
    $page = $page > 0 ? $page :0;
    $sql = sprintf('SELECT `id`, `url` FROM `searchlinks`ORDER BY `sort` LIMIT %d,%d',$page,$limit);
    return $this->db->query($sql)->result_array();
  }
  public function getSearchLinkList(){
    $sql = 'SELECT COUNT(*) as total FROM `searchlinks` ';
    $row = $this->db->query($sql)->row_array();
    return isset($row['total']) ? $row['total']: 0;
  }
}
?>
