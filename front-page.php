<?php 

    get_header(); 

    // API Movie
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
                    <h1><?php echo $movie['title']?></h1>
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

    <section class="tabs">
        <div class="container">
                <div id="tabl-1" class="tab-item tab-border">
                    <i class="fas fa-door-open fa-3x"></i>
                    <p class="hide-sm">Cancel anytime</p>
                </div>
                <div id="tabl-2" class="tab-item">
                    <i class="fas fa-tablet-alt fa-3x"></i>
                    <p class="hide-sm">Watch anywhere</p>
                </div>
                <div id="tabl-3" class="tab-item ">
                    <i class="fas fa-tags fa-3x"></i>
                    <p class="hide-sm">Pick your price</p>
                </div>
        </div>
    </section>
    
    <section class="tab-content">
        <div class="container">
            <!-- Tab Content 1 -->
            <!-- <div id="tab-1-content" class="tab-content-item show">
                <div class="tab-1-content-inner">
                    <div>
                        <p class="text-lg">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt aut id magnam. Facere, quisquam!</p>
                        <div class="btn btn-lg">Watch free for 30 days</div>
                    </div>

                    <img src="<?php echo get_template_directory_uri() . '/assets/images/Box-Movie.jpg';?>"  alt="">
                </div>
            </div>
            <div id="tab-2-content" class="tab-content-item"></div>
            <div id="tab-2-content" class="tab-content-item"></div>
        </div> -->

        <!-- <div class="tab-content-item" id="tab-2-content">
            <div class="tab-2-content-top">
                <p class="text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, sed.</p>
                <a href="#" class="btn btn-lg">watch free for 30 days</a>
            </div>

            <div class="tab-2-content-bottom">
                <div>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/tab-content-2-1.png';?>" alt="">
                    <p class="text-md">watch pn your tv</p>
                    <p class="text-dark">
                        Smart TVs, PlayStation, Xbox, Chromecast, Apple TV, Blu-ray
                        players and more.
                    </p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/tab-content-2-2.png';?>" alt="">
                    <p class="text-md">Watch instantly or download for later</p>
                    <p class="text-dark">
                    Available on phone and tablet, wherever you go.
                    </p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/tab-content-2-3.png';?>" alt="">
                    <p class="text-md">watch on any computer</p>
                    <p class="text-dark">
                    Watch right on Netflix.com.
                    </p>
                </div>
            </div>
        </div> -->

        <div id="tab-3-content" class="tab-item-content">
            <div class="text-center">
                <p class="text-lg">Choose one plan and watch everything in movie24info</p>
                <a href="#" class="btn btn-lg">Watch free for 30 day</a>
            </div>

            <table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Basic</th>
								<th>Standard</th>
								<th>Premium</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Monthly price after free month ends on 6/19/19</td>
								<td>$8.99</td>
								<td>$12.99</td>
								<td>$15.99</td>
							</tr>
							<tr>
								<td>HD Available</td>
								<td><i class="fas fa-times"></i></td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td>Ultra HD Available</td>
								<td><i class="fas fa-times"></i></td>
								<td><i class="fas fa-times"></i></td>
								<td><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td>Screens you can watch on at the same time</td>
								<td>1</td>
								<td>2</td>
								<td>4</td>
							</tr>
							<tr>
								<td>Watch on your laptop, TV, phone and tablet</td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td>Unlimited movies and TV shows</td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td>Cancel anytime</td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td>First month free</td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
								<td><i class="fas fa-check"></i></td>
							</tr>
						</tbody>
					</table>
        </div>
    </section>

    <footer class="footer">
        <p>Question? Call 1-989-323-0000</p>

        <div class="footer-col">
        <ul>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Investor Relations</a></li>
					<li><a href="#">Ways To Watch</a></li>
					<li><a href="#">Corporate Information</a></li>
					<li><a href="#">Netflix Originals</a></li>
				</ul>
				<ul>
					<li><a href="#">Help Center</a></li>
					<li><a href="#">Jobs</a></li>
					<li><a href="#">Terms Of Use</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<ul>
					<li><a href="#">Account</a></li>
					<li><a href="#">Redeem Gift Cards</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Speed Test</a></li>
				</ul>
				<ul>
					<li><a href="#">Media Center</a></li>
					<li><a href="#">Buy Gift Cards</a></li>
					<li><a href="#">Cookie Preferences</a></li>
					<li><a href="#">Legal Notices</a></li>
				</ul>
        </div>
    </footer>

<script>
    const swiper = new Swiper('.swiper-container', {
        // Optional
        effect: "cube",
        grabCursor: true,
        cubeEffect: {
          shadow: true,
          slideShadows: true,
          shadowOffset: 20,
          shadowScale: 0.94,
        },
    
        // If we need pagination
        pagination: {
        el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
        el: '.swiper-scrollbar',
        },
        });
</script>

<?php get_footer(); ?>