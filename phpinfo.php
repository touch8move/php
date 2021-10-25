<?php 
    
// SSH Host
$ssh_host = 'demo.wftpserver.com';
// SSH Port
    $ssh_port = '2222';
// SSH User
    $ssh_auth_user = 'demo';
// SSH Password
    $ssh_auth_pass = 'demo';
// SSH Connect 체크
    If (!function_exists("ssh2_connect")) die('Function ssh2_connect does not exist.');
// SSH Connect
    If (!$conn_id = ssh2_connect($ssh_host, $ssh_port)) die('Failed to connect.');
// SSH Auth
    If (!ssh2_auth_password($conn_id, $ssh_auth_user, $ssh_auth_pass)) die('Failed to authenticate.');
// SSH SFTP 접속
    If (!$sftp_conn = ssh2_sftp($conn_id)) die('Failed to create a sftp connection.');
// // 폴더 생성
//     ssh2_sftp_mkdir($sftp_conn, '생성할 폴더 전체경로');
// // 이름 바꾸기
//     ssh2_sftp_rename($sftp_conn, '기존 파일 경로', '바꿀 파일 경로');
// // SSH 서버 명령어 실행
//     // 삭제
//     ssh2_exec($conn_id, 'rm -rf 삭제(파일)경로');
//     // 복사
//     ssh2_exec($conn_id, 'cp  원본(파일)경로 복사(파일)경로');
//     // 이동
//     ssh2_exec($conn_id, 'mv 원본(파일)경로 이동(파일)경로');
// SSH 업로드
    $remote_file = "/upload/sample.txt";
    $download_file = "/download/version.txt";

    // $localFile =  file_get_contents("/var/www/html/sample.txt");
    // echo $localFile;
    // $url = "ssh2.sftp://".intval($sftp).$remote_file;
    // echo $url;
    // $stream = fopen($url, 'w');
    // @fwrite($stream, $localFile);
    // @fclose($stream);

    $stream = @fopen("ssh2.sftp://$sftp_conn$download_file", 'r');
    if (! $stream)
        throw new Exception("Could not open file: $download_file");
    $contents = fread($stream, filesize("ssh2.sftp://$sftp_conn$remote_file")); 
    file_put_contents ($download_file, $contents);
    @fclose($stream);
?>