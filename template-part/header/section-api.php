<?php

    // Get Playing Movies
    $url = 'https://api.themoviedb.org/3';
    $nowPlayingUrl = $url . '/movie/now_playing?api_key=' . API_KEY . '&language=en_US&page=1';
    $posterUrl = 'https://image.tmdb.org/t/p/original/';

    // Create cURL Resource
    $curl = curl_init();

    // Set cURL Options For Now Playing
    curl_setopt($curl, CURLOPT_URL, $nowPlayingUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Run cURL
    $response = curl_exec($curl);

    // Check IF Any Error
    if ($error = curl_error($curl)) {
        $response_error_msg = $error;
    } else {
        
        // Check IF Success
        $decoded = json_decode($response);
        if (isset($decoded->success)) {
            $response_error_msg = $decoded->status_message;
        } else {
            $decoded = json_decode($response, true);
            $movies = array_slice($decoded['results'], 0, 5);
        }
    }

    // Close cURL Connections
    curl_close($curl);

?>

