<?php declare(strict_types=1);
include_once __DIR__ . '/../system/functions.php';

// check langue & chargé langue
$lang = check_langage();
load_text_according_to_langage($lang);
$trad_page = set_trad_page();
$liste_sections = $trad_page["page_sections"];

echo get_gabarit('main/page.html', [
    "{{TITRE_PAGE}}" => $trad_page["title_page"],
    "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/accueil.html', [
        "{{NAVIGATION}}" => generate_navigation($lang),
        "{{SECTION_INTRODUCTION}}" => get_gabarit('main/encart_text_left.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#6969ff", "#654f9d"),
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => get_gabarit('main/section_intro.html', [
                "{{TITLE_PAGE}}" => $trad_page["title_page"],
                "{{TITLE_SECTION}}" => $liste_sections["section_intro"]["title_section"]
            ])
        ]),
        "{{SECTION_PROJETS}}" => get_gabarit('main/encart_text_right.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#654f9d", "#5000d1"),
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => "Décrire les projets et renvoyer sur la page dédiée ?"
        ]),
        "{{SECTION_DIPLOME}}" => get_gabarit('main/encart_text_left.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#5000d1", "#dd7a7a"),
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => "Décrire les diplomes et renvoyer sur la page dédiée ?"
        ]),
        "{{SECTION_EXPERIENCE}}" => get_gabarit('main/encart_text_right.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#dd7a7a", "#e96b00"),
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => "Décrire les expériences et renvoyer sur la page dédiée ?"
        ])
    ])
]);
