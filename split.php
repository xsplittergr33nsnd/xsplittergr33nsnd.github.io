<?php

/**
 * Greensend Mail Filter
 * Greensend Version 5
 * @package Greensend
 * @link https://greensend.org
 * @author Rey Nugroho
 * @copyright 20 Maret 2018
 */

echo "[+]\e[1;92m Greensend Mail Filter\e[0m \n";
echo "[+]\e[1;92m mail_list ❯\e[0m ";
$input = trim(fgets(STDIN));

$file = file_get_contents($input);
$ext = preg_split('/\n|\r\n?/', $file);


$hit = 1;

function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function resume(){
    $retry = sleep(0);    
    return $retry;
}

$others = array('aol.com', 'yahoo.com', 'outlook.com');

foreach ($ext as $num => $x) {
    
	$user = $x;
	$exploded = multiexplode(array("@"),$user);
	$email = ''.$exploded[0].'@'.$exploded[1].'';

    $d = $exploded[1];

    if ($hit == count($ext)) {
    }

    if (strstr($d, "hotmail") || strstr($d, "live") || strstr($d, "msn") || strstr($d, "outlook")) {
        $hot = fopen("filtered/hotmail.txt","a");
        $result = "$email\n";
        fwrite($hot,$result);
    } else if (strstr($d, "yahoo") || strstr($d, "ymail") || strstr($d, "rocketmail")) {
        $yahoo = fopen("filtered/yahoo.txt","a");
        $result = "$email\n";
        fwrite($yahoo,$result);
    } else if ($d == 'aol.com'){
        $aol = fopen("filtered/aol.txt","a");
        $result = "$email\n";
        fwrite($aol,$result);
    } else if ($d != $others){
        $other = fopen("filtered/other.txt","a");
        $result = "$email\n";
        fwrite($other,$result);
    }
    
    //return $result;
    //fclose($file);

    //echo "\e[0m[\e[92m".$hit."\e[0m/".count($ext)."] $x \e[92mcompleted\e[0m\n";
    resume($x);
    $hit++;
}
echo "[+] Done\n";