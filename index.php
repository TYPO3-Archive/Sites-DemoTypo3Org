<?php

$template = 'LandingPage/template.html';
$output = file_get_contents($template);

$contentTemplate = 'content.html';
$content = file_get_contents($contentTemplate);

$output = str_replace('###CONTENT###', $content, $output);
$output = str_replace('../', '/LandingPage/', $output);

echo $output;

?>
