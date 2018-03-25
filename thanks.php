<?php
/**
 Template Name: Страница спасибо
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta property="og:image" content="path/to/image.jpg">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon/favicon.ico" type="image/x-icon">
    <meta name="theme-color" content="#000">
    <style>
    body {
        margin: 0;
        opacity: 1;
    }

    .thanks {
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .thanks .content {
        padding: 20px;
        max-width: 400px;
        max-height: 400px;
        margin: 40px 20px;
        width: 100%;
        height: 100%;
        text-align: center;
        border: 2px solid #16d3dc;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .thanks .content .title {
        font-size: 30px;
        margin-bottom: 30px;
        color: #16d3dc;
    }

    .thanks .content .subtitle {
        font-size: 24px;
        color: #16d3dc;
    }
    </style>
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<div class="thanks">
    <div class="content">
        <div class="title">Спасибо за заявку</div>
        <div class="subtitle">Наш менеджер свяжется с вами</div>
    </div>
</div>

<?php wp_footer(); ?>
<script type="text/javascript">
    setTimeout(function () {
        window.location.href = "/";
    }, 3000);
</script>
</body>
</html>
