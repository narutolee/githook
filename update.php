<?php
/**
 * @copyright F2E team@yunos.com
 */


//update or create a repository
function updateGitByName($name, $url){

  $exist = file_exists("../../$name");

  if(!$exist){
    $str = "cd ../.. && sudo -u root git clone $url 2>&1";
  }else{
    $str = "cd ../../$name && sudo -u root git pull 2>&1";
  }
  return shell_exec($str);
}

//从gitlab过来的数据
$content = file_get_contents('php://input');

if($content){
	$data = json_decode($content);
	$repo = $data->repository;
	echo updateGitByName($repo->name, $repo->url);
}else{
	//从URL过来的数据
	$name = $_REQUEST['name'];
	if($name){
		$url = "git@gitlab.alibaba-inc.com:yunos-f2e/$name.git";
		echo updateGitByName($name, $url);
	}else{
		echo "error: invalid parameters.";
	}
}




?>