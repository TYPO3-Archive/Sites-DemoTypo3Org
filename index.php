<?php

# Redirect packages
foreach (array('introduction', 'neos') as $distribution) {
    if (strpos($_SERVER['REQUEST_URI'], '/' . $distribution) === 0) {
        $segment = ltrim($_SERVER['REQUEST_URI'], '/');
        $parts = explode('/', $segment);
        $host = array_shift($parts);
        $path = implode('/', $parts);
        $path = ltrim($path, '/');

        $location = sprintf('http://%s.cms.demo.typo3.org/%s', $host, $path);
        if ($distribution == 'neos') {
            $location = sprintf('http://%s.demo.typo3.org/%s', $host, $path);
        }
        header('Location: ' . $location);
        die();
    }
}


$template = 'LandingPage/template.html';
$output = file_get_contents($template);

$contentTemplate = 'content.html';
$content = file_get_contents($contentTemplate);

$output = str_replace('###CONTENT###', $content, $output);
$output = str_replace('../', '/LandingPage/', $output);

print $output;
