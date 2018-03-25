<?php
/**
 Template Name: Главная страница
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="path/to/image.jpg">
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<?php send_mail(); ?>

<?php wp_footer(); ?>
</body>
</html>
