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
<?php
if (!empty($_POST)){
    $form_type = !empty($_POST['form_type']) ? $_POST['form_type'] : '';
    $name = !empty($_POST['name']) ? $_POST['name'] : '' ;
    $phone = !empty($_POST['phone']) ? $_POST['phone'] : '' ;
    $titleh = "Сообщение с сайта " . home_url();
    $text = '';
    if ($form_type!=''){
        $text .= 'Форма: '.$form_type.'<br>';
    }
    if ($name!=''){
        $text .= 'Имя: '.$name.'<br>';
    }
    if ($phone!=''){
        $text .= 'Телефон: '.$phone.'<br>';
    }
    $to = get_option('admin_email');

    wp_mail($to,$titleh, $text);
    ?>
    <script>
        window.location.href="/thanks";
    </script>
    <?php
}
?>

<?php wp_footer(); ?>
</body>
</html>
