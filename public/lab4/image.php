<?php

$imagePath = __DIR__ . "/assets/picture.jpg";
header("Cache-Control: public, max-age=86400");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");
header("Content-Type: image/jpeg");
readfile($imagePath);
