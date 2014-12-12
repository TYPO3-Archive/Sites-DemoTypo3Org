<?php

# Redirect packages
$distributions = array(
	'cms62' => 'cms62',
	'cms70' => 'cms70',
	'introduction' => 'cms62',
	'neos' => 'neos',
);

foreach ($distributions as $domainPart => $distribution) {
	if (strpos($_SERVER['REQUEST_URI'], '/' . $distribution) === 0) {
		$segment = ltrim($_SERVER['REQUEST_URI'], '/');
		$parts = explode('/', $segment);
		$host = array_shift($parts);
		$path = implode('/', $parts);
		$path = ltrim($path, '/');

		$location = sprintf('http://%s.demo.typo3.org/%s', $domainPart, $path);
		header('Location: ' . $location);
		die();
	}
}

// If no redirection is required, then display the landinag page.
require 'Packages/Libraries/autoload.php';

$template = 'Resources/template.html';
$output = file_get_contents($template);

$contentFile = 'index.md';
$contentRaw = file_get_contents($contentFile);

$parser = new Parsedown();
$content = $parser->text($contentRaw);

$output = str_replace('###CONTENT###', $content, $output);
$output = str_replace('../', '/Resources/', $output);

print $output;
