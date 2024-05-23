<?php

'https://pdfcrowd.com/preview/html-to-pdf/?gid=a0326a981ec34b78bab1036a381b346b&url=https%3A%2F%2Fclinic.test-yeremyan.site%2Fpdf.html';

'wkhtmltopdf';


// (A) CHANGE TO YOUR OWN!
$chrome = "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe";
$output = "D:\\demo.pdf";
$cmd = <<<EOF
"$chrome" --headless --disable-gpu --print-to-pdf="$output" $url
EOF;

// (B) RUN COMMAND
$result = shell_exec($cmd);
echo $result;
