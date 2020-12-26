<?php

add_action( 'init', 'register_post_types' );

function register_post_types() {
    
    register_post_type('personal', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Персонал',
            'singular_name'      => 'Персонал', 
            'add_new'            => 'Додати персонал',
            'add_new_item'       => 'Добавление персонала', 
            'edit_item'          => 'Редагування персоналу',
            'new_item'           => 'Новий персонал', 
            'view_item'          => 'Переглянути', 
            'search_items'       => 'Шукати персонал', 
            'not_found'          => 'Не знайдено', 
            'not_found_in_trash' => 'Не знайдено в кошику',
            'parent_item_colon'  => '', 
            'menu_name'          => 'Персонал', 
        ),
        'description'         => 'Адміністрація, лікарі, фельдшери, медсестри',
        'public'              => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => null, 
        'show_ui'             => null, 
        'show_in_menu'        => null, 
        'show_in_admin_bar'   => null, 
        'show_in_nav_menus'   => null, 
        'show_in_rest'        => null, 
        'rest_base'           => null, 
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-admin-users',
        'hierarchical'        => false,
        'supports'            => array('title','editor', 'thumbnail'),
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );

    register_post_type('zaklad', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Підрозділи',
            'singular_name'      => 'Підрозділ', 
            'add_new'            => 'Додати підрозділ',
            'add_new_item'       => 'Додавання підрозділу',
            'edit_item'          => 'Редагування підрозділу',
            'new_item'           => 'Новий підрозділ',
            'view_item'          => 'Переглянути',
            'search_items'       => 'Шукати підрозділ',
            'not_found'          => 'Не знайдено', 
            'not_found_in_trash' => 'Не знайдено в кошику', 
            'parent_item_colon'  => '', 
            'menu_name'          => 'Підрозділ', 
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null, 
        'exclude_from_search' => null, 
        'show_ui'             => null, 
        'show_in_menu'        => null, 
        'show_in_admin_bar'   => null, 
        'show_in_nav_menus'   => null, 
        'show_in_rest'        => null, 
        'rest_base'           => null, 
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-admin-home',
        'hierarchical'        => false,
        'supports'            => array('title','editor', 'thumbnail', 'thumbnail','excerpt'), 
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => ['slug' => 'zaklad'],
        'query_var'           => true,
    ) );
}


add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

    register_taxonomy('zaklad-type', array('zaklad'), array(
        'label'                 => '', 
        'labels'                => array(
            'name'              => 'Тип закладу',
            'singular_name'     => 'Тип закладу',
            'search_items'      => 'Шукати',
            'all_items'         => 'Всі типи закладу',
            'view_item '        => 'Дивитись',
            'parent_item'       => 'Батьківський тип',
            'parent_item_colon' => 'Батьківський тип:',
            'edit_item'         => 'Редагувати тип закладу',
            'update_item'       => 'Оновити тип закладу',
            'add_new_item'      => 'Додати новий тип закладу',
            'new_item_name'     => 'Нова назва типу',
            'menu_name'         => 'Тип закладу',
        ),
        'description'           => '', 
        'public'                => true,
        'show_in_rest'          => null, 
        'rest_base'             => null, 
        'hierarchical'          => true,
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null, 
        'show_admin_column'     => false, 
        '_builtin'              => false,
    ) );

    register_taxonomy('viddil', array('personal'), array(
        'label'                 => '',
        'labels'                => array(
            'name'              => 'Відділ',
            'singular_name'     => 'Відділ',
            'search_items'      => 'Пошук відділу',
            'all_items'         => 'Всі відділи',
            'view_item '        => 'Дивитись',
            'parent_item'       => 'Батьківський тип',
            'parent_item_colon' => 'Батьківський тип:',
            'edit_item'         => 'Редагувати відділ',
            'update_item'       => 'Оновити відділ',
            'add_new_item'      => 'Додати новий відділ',
            'new_item_name'     => 'Нова назва відділу',
            'menu_name'         => 'Відділ',
        ),
        'description'           => '', 
        'public'                => true,
        'show_in_rest'          => null, 
        'rest_base'             => null, 
        'hierarchical'          => true,
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null, 
        'show_admin_column'     => false,
        '_builtin'              => false,
    ) );
}