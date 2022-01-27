<?php
$responseJSON =array();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(404);
    exit();
}
if (!isset($_POST["usrCode"]) || !isset($_POST["slctYear"])){
    http_response_code(400);
    exit();
}
$uid = $_POST["usrCode"];
$year = $_POST["slctYear"];
$files = scandir(".\\assets\\referti\\");
unset($files[0]);
unset($files[1]);
sort($files);
$return = array();
$i = 0;
$files = preg_grep(("/" . $year . "-[0-9][0-9]-" . $uid . ".txt/"), $files);
if(empty($files)){
    http_response_code(400);
    exit();
}
foreach ($files as $file){
    $return[$i]["date"] = explode("-",$file)[1] . "/" . $year;
    $contents = file_get_contents(".\\assets\\referti\\" . $file);
    $return[$i]["Titolo"] = explode("\n", $contents)[0];
    $return[$i]["testo"] = str_replace(explode("\n", $contents)[0] . "\n", "", $contents);
    $return[$i]["filename"] = $file;
    $i++;
}
echo json_encode($return);
