<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description');?>">

    <?php wp_head(); ?>
</head>
<body>

    <!-- Header Section -->
    <header class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <img 
                src="<?php echo get_template_directory_uri() . '/assets/images/Logo.png';?>" 
                alt="<?php bloginfo('name')?>"
            >
        </div>

        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'main-menu'
                )
                );
        ?>

        <ul class="d-flex justify-content-center align-items-center right-menu">
            <li><i class="fas fa-search"></i></li>
            <li><i class="fas fa-gift"></i></li>
            <li><i class="fas fa-bell"></i></li>
            <li><i class="fas fa-user"></i><i class="fas fa-caret-down"></i></li>
        </ul>
    </header>
    