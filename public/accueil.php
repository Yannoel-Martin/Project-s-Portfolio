<?php declare(strict_types=1);
include_once __DIR__ . '/../system/functions.php';

// check langue & chargé langue
$lang = check_langage();
load_text_according_to_langage($lang);
$trad_page = set_trad_page();

echo get_gabarit('main/page.html', [
    "{{TITRE_PAGE}}" => $trad_page["title_page"],
    "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/accueil.html', [
        "{{NAVIGATION}}" => generate_navigation($lang),
        "{{SECTION_INTRO}}" => get_gabarit('main/encart_text_left.html', [
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => get_gabarit('components/section_intro.html', [
                "{{TEXT_CONTENT}}" => "0 idée de quoi mettre xD",
                "{{PICTURE_SIDE}}" => ""
            ])
        ]),
        "{{SECTION_VIOLET_S__JOURNEY}}" => get_gabarit('main/encart_text_right.html', [
            "{{IMG_CONTENT}}" => generate_image_side_content("background_violet_journey.png"),
            "{{TEXT_CONTENT}}" => get_gabarit('components/violet_journey.html', [
                "{{TEXT_CONTENT}}" => "0 idée de quoi mettre xD",
                "{{PICTURE_SIDE}}" => ""
            ])
        ]),
    ])
]);
