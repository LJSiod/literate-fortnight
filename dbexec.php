<?php
date_default_timezone_set('Asia/Manila');
$database = 'bansalan';
$user = 'root';
$pass = 'admin1234';
$host = '192.168.0.73'; 
$current_date = date('Ymd_His');
$backupDir = 'D:\Restore\Restore Point'; 

if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

$backupFile = $backupDir . '/' . 'BANSALAN' . ' ' . $current_date . '.sql';

$mysqldumpPath = '"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysqldump.exe"'; 

echo "Backup Ongoing, PLEASE DO NOT CLOSE!\n"; 

$command = "$mysqldumpPath --user=$user --password=$pass --host=$host --single-transaction --quick --lock-tables=false $database > \"$backupFile\"";

exec($command, $output, $return_var);

if ($return_var === 0) {
    echo "Backup Saved in: $backupFile";
} else {
    echo "Error creating backup file";
}
?>
