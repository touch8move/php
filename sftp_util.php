<?php
    function upload_sftp($id, $pass, $host, $port, $localfile, $remotefile){
        If (!function_exists("ssh2_connect")) die('Function ssh2_connect does not exist.');
        If (!$conn = ssh2_connect($host, $port)) die('Failed to connect.');
        If (!ssh2_auth_password($conn, $id, $pass)) die('Failed to authenticate.');
        If (!$sftp = ssh2_sftp($conn)) die('Failed to create a sftp connection.');

        $contents=file_get_contents($localfile);
        
        $stream = @fopen("ssh2.sftp://$sftp".$remotefile, 'w');
        $size = strlen($contents);
        
        stream_set_chunk_size($stream, $size);
        @fwrite($stream, $contents);
        @fclose($stream);
    }

    function download_sftp($id, $pass, $host, $port, $localfile, $remotefile){
        If (!function_exists("ssh2_connect")) die('Function ssh2_connect does not exist.');
        If (!$conn = ssh2_connect($host, $port)) die('Failed to connect.');
        If (!ssh2_auth_password($conn, $id, $pass)) die('Failed to authenticate.');
        If (!$sftp = ssh2_sftp($conn)) die('Failed to create a sftp connection.');

            // file download
        $stream = @fopen("ssh2.sftp://$sftp".$remotefile, 'r');
        if (! $stream)
            throw new Exception("Could not open file: $remotefile");
        $contents = @fread($stream, filesize("ssh2.sftp://$sftp$remotefile")); 
        file_put_contents ($localfile, $contents);
        @fclose($stream);
    }
?>