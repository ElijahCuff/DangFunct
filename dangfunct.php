<?php
// EASY BAD FUNCTION TESTER

/**

LOAD THIS PAGE ON YOUR PHP SERVER TO LOCATE DANGEROUS FUNCTIONS THAT ARE STILL AVAILABLE TO USERS.

**/




header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$badFunctions = ['exec','system','passthru','shell_exec','escapeshellarg','escapeshellcmd','proc_close','proc_open','ini_alter','dl','popen','pcntl_exec','socket_accept','socket_bind','socket_clear_error','socket_close','socket_connect','socket_create_listen','socket_create_pair','socket_create','socket_get_option','socket_getpeername','socket_getsockname','socket_last_error','socket_listen','socket_read','socket_recv','socket_recvfrom','socket_select','socket_send','socket_sendto','socket_set_block','socket_set_nonblock','socket_set_option','socket_shutdown','socket_strerror','socket_write','stream_socket_server','pfsockopen','disk_total_space','disk_free_space','chown','diskfreespace','getrusage','get_current_user','set_time_limit','leak','listen','chgrp','link','symlink','dlopen','proc_nice','proc_get_stats','proc_terminate','sh2_exec','posix_getpwuid','posix_getgrgid','posix_kill','ini_restore','mkfifo','dbmopen','dbase_open','filepro','filepro_rowcount','posix_mkfifo','_xyec','mainwork','get_num_redirects','putenv','geoip_open','sleep','imap_open','apache_child_terminate','apache_setenv','define_syslog_variables','eval','fp','fput','ftp_connect','ftp_exec','ftp_get','ftp_login','ftp_nb_fput','ftp_put','ftp_raw','ftp_rawlist','highlight_file','ini_get_all','inject_code','mysql_pconnect','openlog','php_uname','phpAds_remoteInfo','phpAds_XmlRpc','phpAds_xmlrpcDecode','phpAds_xmlrpcEncode','posix_setpgid','posix_setsid','posix_setuid','posix_uname','proc_get_status','syslog','xmlrpc_entity_decode','xmlrpc_entity_decodeh'];

$foundBadFunction = false;

$badFunctionsAvailable = "";
foreach($badFunctions as $badFunction)
{
       if ( function_exists($badFunction) )
           {
               $badFunctionsAvailable .= $badFunction."|";
               $foundBadFunction = true;
           }
}

if ($foundBadFunction)
{
   $availableBadFunctions = explode("|", $badFunctionsAvailable);
   echo 'DANGEROUS FUNCTIONS FOUND'." \n".(count($availableBadFunctions)-1).' of '.count($badFunctions)."\n\n";
   echo json_encode($availableBadFunctions,JSON_PRETTY_PRINT);
}
else
{
  echo 'NO DANGEROUS FUNCTIONS FOUND '."\nTESTED ".count($badFunctions)."\n\n";
  
}

?>
