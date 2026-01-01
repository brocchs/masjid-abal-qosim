<?php
// Simple FTP deployment script
$ftp_server = "your-ftp-server.com";
$ftp_user = "your-username";
$ftp_pass = "your-password";

$connection = ftp_connect($ftp_server);
$login = ftp_login($connection, $ftp_user, $ftp_pass);

if ($connection && $login) {
    echo "FTP connection successful\n";
    
    // Upload files
    $local_files = [
        'public/index.php' => '/public_html/index.php',
        'public/css' => '/public_html/css',
        'public/js' => '/public_html/js',
        // Add more files as needed
    ];
    
    foreach ($local_files as $local => $remote) {
        if (ftp_put($connection, $remote, $local, FTP_BINARY)) {
            echo "Uploaded: $local -> $remote\n";
        }
    }
    
    ftp_close($connection);
} else {
    echo "FTP connection failed\n";
}
?>