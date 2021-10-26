<?php
$last=shell_exec('grep -Ril "find /home/iyaxx1w19rfm/public_html/ -type f -mtime -2"');
echo "<pre>$last</pre>";
?>