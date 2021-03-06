<?php

# Redirect packages
$distributions = array(
	'cms62' => 'cms62.demo.typo3.org',
	'cms70' => 'cms70.demo.typo3.org',
	'cms-next' => 'cms-next.demo.typo3.org',
	'cms-master' => 'cms-master.demo.typo3.org',
);

foreach ($distributions as $distribution => $domain) {
	if (strpos($_SERVER['REQUEST_URI'], '/' . $distribution) === 0) {
		$segment = ltrim($_SERVER['REQUEST_URI'], '/');
		$parts = explode('/', $segment);
		$host = array_shift($parts);
		$path = implode('/', $parts);
		$path = ltrim($path, '/');

		$location = sprintf('http://%s/%s', $domain, $path);
		header('Location: ' . $location);
		die();
	}
}

// If no redirection is required, then display the landinag page.
require 'Packages/Libraries/autoload.php';

$template = 'Resources/template.html';
$output = file_get_contents($template);

if (strpos($_SERVER['REQUEST_URI'], '/neos') === 0) {
	$contentFile = 'neos.md';
} elseif (strpos($_SERVER['REQUEST_URI'], '/cms') === 0) {
	$contentFile = 'cms.md';
} else {
	$contentFile = 'index.md';
}

$contentRaw = file_get_contents('content/' . $contentFile);

$parser = new Parsedown();
$content = $parser->text($contentRaw);

$output = str_replace('###CONTENT###', $content, $output);
$output = str_replace('../', '/Resources/', $output);

print $output;
