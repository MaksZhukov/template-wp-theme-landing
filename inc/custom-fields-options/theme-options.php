<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options','options', 'Настройки темы' )
    ->add_tab( __('Шапка'), array(
        Field::make( 'image', 'crb_header_logo', 'Логотип' )
            ->set_width(33),
        Field::make( 'text', 'crb_header_phone', 'Телефон' )
            ->set_width(33),
        Field::make( 'textarea', 'crb_header_timework', 'Время работы' )
            ->set_width(33),
        Field::make( 'textarea', 'crb_header_mail', 'Почта' )
            ->set_width(33),
        Field::make( 'textarea', 'crb_header_skype', 'Скайп' )
            ->set_width(33),
        Field::make( 'textarea', 'crb_header_viber', 'Вайбер' )
            ->set_width(33),
        Field::make( 'textarea', 'crb_header_telegram', 'Телеграм' )
    ) )
    ->add_tab( __('1 баннер'), array(
        Field::make( 'rich_text', 'crb_banner_1_title_and_subtitle', 'Заголовок и подзаголовок' )
            ->set_width(50),
        Field::make( 'image', 'crb_banner_1_bg', 'фон' )
            ->set_width(50),
    ))
    ->add_tab( __('О Нас'), array(
        Field::make( 'text', 'crb_about_us_title', 'Заголовок' ),
        Field::make( 'text', 'crb_about_us_desc', 'Описание' ),
    ))
    ->add_tab( __('Ожидания от работы с нами'), array(
        Field::make('text','crb_expect_from_us_title','Заголовок'),
        Field::make( 'complex', 'crb_expect_from_us_list', 'Ожидания')
            ->setup_labels( array(
                'plural_name' => 'Ожиданий',
                'singular_name' => 'Ожидания'
            ))
            ->add_fields( array(
                Field::make( 'image', 'img', 'Картинка' )
                    ->set_width(33),
                Field::make( 'text', 'name', 'Название' )
                    ->set_width(33),
                Field::make( 'textarea', 'desc', 'Описание' )
                    ->set_width(33)
            ) ),
    ));