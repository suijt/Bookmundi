<?php
//Convert XML data from URL to JSON
function convertXMLtoJSON($url) {
    $xmlString = file_get_contents($url);

    if ($xmlString !== false) {
        $xml = simplexml_load_string($xmlString);
        if ($xml !== false) {
            return $xml;
        } else {
            return "Error converting XML to JSON.";
        }
    } else {
        return "Error fetching XML data from the URL.";
    }
}

//Filter through array and return only value greater than threshold
function filterItemsByThreshold($items, $threshold):array {
    $filteredItems = array_filter($items, function ($item) use ($threshold) {
        return isset($item['price']) && $item['price'] > $threshold;
    });

    return $filteredItems;
}

//Calculate the sum of value from provided array
function calculateTotalSum($items): int {
    $totalSum = 0;
    foreach ($items as $item) {
        if (isset($item['price'])) {
            $totalSum += floatval($item['price']);
        }
    }
    return $totalSum;
}


$xmlUrl = 'http://ftp.geoinfo.msl.mt.gov/Documents/Metadata/GIS_Inventory/35524afc-669b-4614-9f44-43506ae21a1d.xml';

$jsonData = convertXMLtoJSON($xmlUrl);

$dataSet = [
    ['id' => 1, 'price' => 5],
    ['id' => 2, 'price' => 10],
    ['id' => 3, 'price' => 15],
    ['id' => 4, 'price' => 20],
    ['id' => 5, 'price' => 25],
    ['id' => 6, 'price' => 30],
    ['id' => 7, 'price' => 35],
    ['id' => 8, 'price' => 40],
];

$threshold = 20;
$filteredItems = filterItemsByThreshold($dataSet, $threshold);
$totalSum = calculateTotalSum($filteredItems);

$response = [
    'threshold'=> $threshold,
    'list' => $filteredItems,
    'totalSum' => $totalSum,
    'xmlToJson' => $jsonData,    
];

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
