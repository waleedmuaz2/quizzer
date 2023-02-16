<?php
print("\OnlineSupplies Exchanging data with Daarbak Redoffice.\n");
// Initializing username etc
$user="onlinesupplies";
$pass="Parakeet-Satisfy-Smugness0";
$conn_id = ftp_connect('roso-ftp.itfhosting.dk');
// login with username and password
$login_result = ftp_login($conn_id, $user, $pass);
// check connection
if ((!$conn_id) || (!$login_result))
{
     print("Could not connect to the FTP server!");
     sleep(20);
     die("");
}
else
{
 print("Connected to the FTP server\n");
}
// Setup of local and remote folders
$OlSuppliesFolder = "C:\\laragon\\www";
$path_get_procucts =$OlSuppliesFolder."\\";
$path_server_procucts="/products/";
// Get fioles from Daarbak Redoffice
print("Downloading product files..\n");
$list = ftp_nlist($conn_id, $path_server_procucts);
if(is_array($list))
{
 foreach($list as $file)
{

  $filename = basename($file);

  print("getting $filename\n");

  if (ftp_get($conn_id, $path_get_procucts."\\".$filename, $file, FTP_BINARY))

  {
       if (!ftp_delete($conn_id, $file))
       {
        print("Could not delete ".$file." from FTP server!\n");
        sleep(20);
        die("");
       }
      }
    }
}

ftp_close($conn_id);

print("That's it .....\n");

sleep(1);

?>