<?php declare(strict_types=1);
include_once __DIR__ . '/../system/functions.php';

// check langue & chargé langue
$lang = check_langage();
load_text_according_to_langage($lang);
$trad_page = set_trad_page();
$liste_sections = $trad_page["page_sections"];

echo get_gabarit('main/page.html', [
    "{{TITRE_PAGE}}" => $trad_page["title_page"],
    "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/projet.html', [
        "{{NAVIGATION}}" => generate_navigation($lang),
        "{{SECTION_INTRODUCTION}}" => get_gabarit('main/encart_text_left.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#6969ff", "#654f9d"),
            "{{IMG_CONTENT}}" => generate_image_side_content("nom_image.png"),
            "{{TEXT_CONTENT}}" => get_gabarit('main/section_intro.html', [
                "{{TITLE_PAGE}}" => $trad_page["title_page"],
                "{{TITLE_SECTION}}" => $liste_sections["section_intro"]["title_section"]
            ])
        ]),
        "{{SECTION_JeuVideo_VioletsJourney}}" => get_gabarit('main/encart_text_right.html', [
            "{{MIDDLE_SEPARATOR}}" => generate_middle_separator("#654f9d", "#5000d1"),
            "{{IMG_CONTENT}}" => generate_image_side_content("background_violet_journey.png"),
            "{{TEXT_CONTENT}}" => get_gabarit('components/projet/violet_journey.html', [
                "{{TITLE_SECTION}}" => $liste_sections["violet_journey"]["title_section"],
                "{{PARAGRAPH_1}}" => $liste_sections["violet_journey"]["paragraph_1"],
                "{{PARAGRAPH_2}}" => $liste_sections["violet_journey"]["paragraph_2"],
                "{{PARAGRAPH_3}}" => $liste_sections["violet_journey"]["paragraph_3"],
                "{{PARAGRAPH_4}}" => $liste_sections["violet_journey"]["paragraph_4"],
                "{{PARAGRAPH_5}}" => $liste_sections["violet_journey"]["paragraph_5"],
                "{{TXT_BTN_DL}}" => $liste_sections["violet_journey"]["txt-btn-dl"]
            ])
        ]),
        "{{SECTION_SiteWeb_ProjetPortfolio}}" => '',
        "{{SECTION_BotDiscord_JeuDeRole}}" => ''
    ])
]);
