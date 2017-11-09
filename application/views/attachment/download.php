<?php
header("Content-Disposition: attachment; filename=\"" . $attachment->nome_arquivo . "\"");
header("Content-Type: application/force-download");
header("Content-Length: " . filesize($path));
header("Connection: close");
readfile($path);