<?php
/**
 * @copyright F2E team@yunos.com
 */

//update zhushou
function updateGitByName($name){
  $str = "cd /home/admin/zhushou.yunos.com && git pull 2>&1";
  return shell_exec($str);
}

$callback = $_REQUEST["callback"];


//update git repo
$data = updateGitByName($name);

if($callback){
  echo $callback . "(" . json_encode(array(
    "data" => $data
  )) . ")";
}else{
  echo $data;
}
?>