<?php

$xml = simplexml_load_file('filmovi.xml');


$naslov = isset($_GET['naslov']) ? $_GET['naslov'] : '';


$film = null;
foreach ($xml->film as $item) {
    if ((string)$item->naslov == $naslov) {
        $film = $item;
        break;
    }
}

if ($film) {

    echo '<html>';
    echo '<head>';
    echo '<link rel="stylesheet" href="style.css">';
    echo '<title>' . $film->naslov . '</title>';
    echo '<style>';
    echo '.container {width: 50%; margin: auto;}';
    echo '.poster img {width: 300px; height: 450px;}';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<div class="container">';
    echo '<h1>' . $film->naslov . '</h1>';
    echo '<div class="poster">';
    $poster = strtolower(str_replace(' ', '_', $film->naslov)) . '.jpg'; 
    echo '<img src="posters/' . $poster . '" alt="' . $film->naslov . '">';
    echo '</div>';
    echo '<p><strong>Godina izlaska:</strong> ' . $film->datumIzlaska . '</p>';
    echo '<p><strong>Žanr:</strong> ' . $film->zanr . '</p>';
    echo '<p><strong>Redatelj:</strong> ' . $film->redatelj . '</p>';
    echo '<p><strong>IMDB ocjena:</strong> ' . $film->imdbOcjena . '</p>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
} else {
    echo '<p>Film nije pronađen.</p>';
}
?>
