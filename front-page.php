<?php 
    get_header(); 

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

     <!-- Slider main container -->
     <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php if(!empty($movies)):
                foreach ($movies as $movie) :
            ?>
                
                <div class="swiper-slide" style='background: url(<?php echo $posterUrl . $movie['backdrop_path']?>) no-repeat center center/cover'>
                    <h3><?php echo $movie['title']?></h3>
                </div>

            <?php endforeach; else: ?>
                <div class="swiper-slide"><?php echo $response_error_msg?></div>
            <?php endif;?>
        </div>
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>


    <!-- Tabs Section -->
    <section class="tabs">
        <div class="container">
            <div id="tab-1" class="tab-item tab-border">
                <i class="fas fa-door-open fa-3x"></i>
                <p class="hide-sm">Cancel anytime</p>
            </div>
            <div id="tab-2" class="tab-item">
                <i class="fas fa-tablet-alt fa-3x"></i>
                <p class="hide-sm">Watch anywhere</p>
            </div>
            <div id="tab-3" class="tab-item ">
                <i class="fas fa-tags fa-3x"></i>
                <p class="hide-sm">Pick your price</p>
            </div>
        </div>
    </section>
<?php 

    get_footer(); 

    get_template_part('template-part/footer/front', 'slider') ;
?>