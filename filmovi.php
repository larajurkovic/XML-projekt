<?php

$xml = simplexml_load_file('filmovi.xml');


echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" href="style.css">';
echo '<title>Filmovi</title>';
echo '<style>';
echo 'table {border-collapse: collapse; width: 100%;}';
echo 'th, td {padding: 8px; text-align: center;}';
echo 'td img {width: 200px; height: 300px;}';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<h1>Top 50 A24 filmova</h1>';


echo '<table>';


$filmCount = 0;
$totalFilms = count($xml->film);
$filmsPerRow = 5;


for ($i = 0; $i < $totalFilms; $i += $filmsPerRow) {
    echo '<tr>';
    for ($j = 0; $j < $filmsPerRow; $j++) {
        if ($i + $j < $totalFilms) {
            $film = $xml->film[$i + $j];
            $naslov = (string)$film->naslov;
            $poster = strtolower(str_replace(' ', '_', $naslov)) . '.jpg';
            echo '<td>';
            echo '<a href="film.php?naslov=' . urlencode($naslov) . '">';
            echo '<img src="posters/' . $poster . '" alt="' . $naslov . '">';
            echo '</a>';
            echo '</td>';
        } else {
        
            echo '<td></td>';
        }
    }
    echo '</tr>';
}


echo '</table>';


echo '</body>';
echo '</html>';
?>
