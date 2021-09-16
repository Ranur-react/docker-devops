<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;






$route['tiket'] = 'gate/Tiket';
$route['parkir'] = 'gate/Parkir';
$route['MobilStreming'] = 'gate/Parkir/MobilStreming';
$route['cekkarcis'] = 'gate/Parkir/cekkarcis';
$route['EntryMobil'] = 'socket/entry';
$route['EntryMotor'] = 'socket/EntryMotor';
$route['Exit'] = 'socket/Exitexec';
$route['ExitMotor'] = 'socket/ExitMotor';


$route['kasir'] = 'gate/Parkir';
$route['qrisloading'] = 'gate/Parkir/qrisApi_waiting';
$route['qrisapi'] = 'gate/Parkir/POST_QRIS';
$route['qrisapiGetstatus'] = 'gate/Parkir/GET_QRIS';
$route['bayar'] = 'gate/Parkir/bayar';
$route['Laporan'] = 'gate/Parkir';

$route['Print'] = 'gate/PrintESC';

$route['logout'] = 'auth/logout';
$route['login'] = 'auth/validate';
$route['Usernamecek'] = 'auth/Usernamecek';
$route['Passwordcek'] = 'auth/Passwordcek';
