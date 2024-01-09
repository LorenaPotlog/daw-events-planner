<?php
$page = file_get_contents('https://blog.eventador.ro/de-ce-e-important-sa-participi-la-targurile-de-nunti/');

$doc = new DOMDocument;
libxml_use_internal_errors(true);
$doc->loadHTML($page);

$finder = new DomXPath($doc);

// Find the main content area (specific to the blog post)
$nodes = $finder->query("//div[contains(@class, 'entry-content')]");

// Initialize an empty string to store the extracted content
$content = '';

if ($nodes->length > 0) {
    // Loop through paragraphs within the content area
    foreach ($nodes->item(0)->getElementsByTagName('p') as $paragraph) {
        // Append paragraph content to the final extracted content
        $content .= $doc->saveHTML($paragraph);
    }
}

echo $content; // Output the extracted content
?>