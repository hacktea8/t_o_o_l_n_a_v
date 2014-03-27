<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagestring {
/*
$page=new Page();
$page->getPaginationString( 14, 338, 30);
*/
  var $page_query_string = '';
  var $cur_page = '';
  var $base_url = '';
  var $total_rows = '';
  var $per_page = '';
  var $seporator = '';
  var $asc = 1;

  public function initialize($params){
    if (count($params) > 0){
      foreach ($params as $key => $val){
        if (isset($this->$key)){
          $this->$key = $val;
        }
      }
    }
  }

  public function create_links(){
    //defaults
    $margin = "";
    $padding = "";

    $firstPage = 0;
    $latestPage = 0;

    //other vars
    $lastpage = ceil($this->total_rows / $this->per_page);
    //lastpage is = total items / items per page, rounded up.
    $lpm1 = $lastpage - 1;                //last page minus 1
    $pageAge = ceil($this->cur_page / 10);
    $start = $pageAge * 10;
    if($this->cur_page != 1)
      $firstPage = 1;

    if($lastpage > $this->cur_page )
      $latestPage = 1;

    if(!$start)
      $start = 1;

    $end = $start +9;
    $prevTenPage = $this->cur_page > 10 ? $start - 10 : 0;
    $nextTenPage = ($lastpage - $this->cur_page > 10 )? $start + 10 :0;
    if( !$this->asc){
      $this->swap($prevTenPage,$nextTenPage);
    }
    if($lastpage < $end)
      $end = $lastpage;

    $prev = $this->cur_page > 1 ? $this->cur_page - 1 : 0;
    //previous page is page - 1
    $next = $this->cur_page < $lastpage ? $this->cur_page +1 : 0;
    //next page is page + 1
    if( !$this->asc){
      $this->swap($prev,$next);
    }
    $from = (($this->cur_page - 5) > 2) ? $this->cur_page - 5 : 2;
    if($this->cur_page > 5)
      $eof  = (($this->cur_page + 4) < $lastpage)? $this->cur_page + 4 : $lastpage -1;
    else
      $eof = (($this->cur_page + 9) < ($lastpage-1)) ? $this->cur_page + 9 : $lastpage-1;
/*limit page >14 */
//  if($lastpage - $from > 10 && $page > 10)
//    $from = ($lastpage - 9) ;

   $pagination = "";
   if($lastpage > 1){
     $pagination .= "<div class=\"pagination\"";
     if($margin || $padding){
       $pagination .= " style=\"";
       if($margin)
         $pagination .= "margin: $margin;";
       if($padding)
         $pagination .= "padding: $padding;";
       $pagination .= "\"";
     }
     $pagination .= ">";
     //previous 10 page
     if ($prevTenPage){
       $link = str_replace('_p_',$prevTenPage,$this->base_url);
       $pagination .= "<a href=\"$link\" title='上十頁'>&#171;&#171; </a>";
     }
//    else
//      $pagination .= "<span class=\"disabled\">&#171;&#171; </span>";
    //previous button
     if ($prev){
       $link = str_replace('_p_',$prev,$this->base_url);
       $pagination .= "<a href=\"$link\" title='上一頁'>上一頁</a>";
     }else
       $pagination .= "<span class=\"disabled\">上一頁</span>";

     $pagination .= $this->seporator;
     //first button
     if($firstPage){
       $link = str_replace('_p_',$firstPage,$this->base_url);
       $pagination .= "<a href=\"$link\">1</a>";
     }else
       $pagination .= "<span class=\"disabled\">1</span>";

     $pagination .= $this->seporator;
     if($from != 2){
       $pagination .= "<span class=\"disabled\">...</span>";
       $pagination .= $this->seporator;
     }
     if( !$this->asc){
       $this->swap($from,$eof);
     }
     
     for ($counter = $from; ; ){
      if ($counter == $this->cur_page)
        $pagination .= "<span class=\"current\">$counter</span>";
      else{
        $link = str_replace('_p_',$counter,$this->base_url);
        $pagination .= "<a href=\"$link\">$counter</a>";
      }
      $pagination .= $this->seporator;
      if($counter == $eof){
        break;
      }
      if($this->asc){
        $counter++;
      }else{
        $counter--;
      }
     }
     if($eof +1 != $lastpage){
       $pagination .= "<span class=\"disabled\">...</span>";
       $pagination .= $this->seporator;
     }
     if($latestPage){
       $link = str_replace('_p_',$latestPage,$this->base_url);
       $pagination .= "<a href=\"$link\"> $lastpage</a>";
     }else
       $pagination .= "<span class=\"disabled\">$lastpage</span>";

     $pagination .= $this->seporator;
     if ($next){
       $link = str_replace('_p_',$next,$this->base_url);
       $pagination .= "<a href=\"$link\" title='下一頁'> 下一頁</a>";
     }else
       $pagination .= "<span class=\"disabled\"> 下一頁</span>";

     if ($nextTenPage){
       $link = str_replace('_p_',$nextTenPage,$this->base_url);
       $pagination .= "<a href=\"$link\" title='下十頁'> &#187;&#187;</a>";
     }
//    else
//      $pagination .= "<span class=\"disabled\"> &#187;&#187;</span>";


    $pagination .= "</div>\n";
  }

  return $pagination;
 }
 public function swap(&$a,&$b){
   $a = $a + $b;
   $b = $a - $b;
   $a = $a - $b;
   return 1;
 }
}
