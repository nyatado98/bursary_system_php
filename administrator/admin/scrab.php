<?php

// Initialize a CURL handle.
$ch = curl_init();

// Set the URL of the webpage that you want to scrape.
curl_setopt($ch, CURLOPT_URL, 'https://example.com/table.html');

// Execute the CURL request and get the response.
$response = curl_exec($ch);

// Close the CURL handle.
curl_close($ch);

// Parse the HTML response.
require_once 'simple_html_dom.php';
$html = str_get_html($response);

// Find the table that you want to scrape.
$table = $html->find('table')[0];

// Extract the text from the table.
$tableData = [];
foreach ($table->find('tr') as $row) {
  foreach ($row->find('td') as $cell) {
    $tableData[] = $cell->text();
  }
}

// Print the table data.
foreach ($tableData as $cell) {
  echo $cell . PHP_EOL;
}

// Free the memory used by the simple_html_dom object.
$html->clear();
unset($html);

?>
some changes"
