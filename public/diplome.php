<?php declare(strict_types=1);
include_once __DIR__ . '/../system/functions.php';

// check langue & chargé langue
$lang = check_langage();
load_text_according_to_langage($lang);
$trad_page = set_trad_page();
$liste_sections = $trad_page["page_sections"];

echo get_gabarit('main/page.html', [
    "{{TITRE_PAGE}}" => $trad_page["title_page"],
    "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/diplome.html', [
        "{{NAVIGATION}}" => generate_navigation($lang),
        "{{SECTION_INTRODUCTION}}" => get_gabarit('main/encart_text_left.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#6969ff", "#654f9d"),
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => get_gabarit('main/section_intro.html', [
                "{{TITLE_PAGE}}" => $trad_page["title_page"],
                "{{TITLE_SECTION}}" => $liste_sections["section_intro"]["title_section"]
            ])
        ]),
        "{{SECTION_TITRE_EII}}" => get_gabarit('main/encart_text_right.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#654f9d", "#5000d1"),
            "{{IMG_CONTENT}}" => generate_image_side_content("campus_academy.jpg"),
            "{{TEXT_CONTENT}}" => get_gabarit('components/title_all.html', [
                "{{TITLE_SECTION}}" => $liste_sections["titre_eii"]["title_section"],
                "{{DATE_INFO}}" => $trad_page["date_obtention"],
                "{{DATE}}" => $liste_sections["titre_eii"]["date"],
                "{{LIEU_INFO}}" => $trad_page["lieu_obtention"],
                "{{LIEU}}" => $liste_sections["titre_eii"]["lieu"],
                "{{SPEC_INFO}}" => $trad_page["spec_obtention"],
                "{{SPEC}}" => $liste_sections["titre_eii"]["spec"],
            ])
        ]),
        "{{SECTION_TITRE_CDA}}" => get_gabarit('main/encart_text_left.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#5000d1", "#dd7a7a"),
            "{{IMG_CONTENT}}" => generate_image_side_content("campus_academy.jpg"),
            "{{TEXT_CONTENT}}" => get_gabarit('components/title_all.html', [
                "{{TITLE_SECTION}}" => $liste_sections["titre_cda"]["title_section"],
                "{{DATE_INFO}}" => $trad_page["date_obtention"],
                "{{DATE}}" => $liste_sections["titre_cda"]["date"],
                "{{LIEU_INFO}}" => $trad_page["lieu_obtention"],
                "{{LIEU}}" => $liste_sections["titre_cda"]["lieu"],
                "{{SPEC_INFO}}" => $trad_page["spec_obtention"],
                "{{SPEC}}" => $liste_sections["titre_cda"]["spec"],
            ])
        ]),
        "{{SECTION_TITRE_BAC}}" => get_gabarit('main/encart_text_right.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#dd7a7a", "#e96b00"),
            "{{IMG_CONTENT}}" => generate_image_side_content("st_vincent_la_providence.jpg"),
            "{{TEXT_CONTENT}}" => get_gabarit('components/title_all.html', [
                "{{TITLE_SECTION}}" => $liste_sections["titre_bac"]["title_section"],
                "{{DATE_INFO}}" => $trad_page["date_obtention"],
                "{{DATE}}" => $liste_sections["titre_bac"]["date"],
                "{{LIEU_INFO}}" => $trad_page["lieu_obtention"],
                "{{LIEU}}" => $liste_sections["titre_bac"]["lieu"],
                "{{SPEC_INFO}}" => $trad_page["spec_obtention"],
                "{{SPEC}}" => $liste_sections["titre_bac"]["spec"],
            ])
        ])
    ])
]);
