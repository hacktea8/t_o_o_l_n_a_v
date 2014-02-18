<?php

define('ROOTPATH', dirname(__FILE__).'/');
require_once ROOTPATH.'model.php';

$model = new Model();

$options = array( 
    'http'=>array( 
        'method'  => 'GET',
        'header'  => 
        "User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36\r\n"
    ) 
); 
$context = stream_context_create($options); 

$q = 'emu.hacktea8.com';
for($page = 55;$page>0;$page--){
  $url = sprintf('http://tool.lusongsong.com/seo/seo.asp?url=%s&page=%d&auto=yes&ttime=15',$q,$page);
  $html = file_get_contents($url,false,$context);
  preg_match_all('#<iframe src=\'seo1.html\?([^\']+)\' height=#Uis',$html,$match);
//var_dump($match[1]);exit;  
  foreach($match[1] as $url){
    $url = str_replace(array('http://',$q),array('','qs_kw'),$url);
    $id = $model->addRow($data = array('url'=>trim($url)));
    echo "\n++++ Sid:$id ++++\n";
//    exit;
  }
sleep(5);
}


?>
