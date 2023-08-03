<?php declare(strict_types=1);
include_once __DIR__ . '/../system/functions.php';

// check langue & chargé langue
$lang = check_langage();
load_text_according_to_langage($lang);
$trad_page = set_trad_page();

$code_html_temp = '';
$code_html_temp .= '<h1>Accueil</h1>';
$code_html_temp .= '<h2>Qui suis-je ?</h2>';
$code_html_temp .= '<p>Je m\'appelle Yannoël MARTIN, et je ce que je souhaite particulièrement est de participer au développement de logiciel, site web, jeu video et autre programme informatique.<br>Pour cela j\'ai réalisé ce site web avec pour but de présenter certains des projets personnels que j\'ai eu l\'occasion de réaliser à la suite de formation ou quand l\'envie me prenait.</p>';
$code_html_temp .= '<hr>';

echo get_gabarit('main/page.html', [
    "{{TITRE_PAGE}}" => $trad_page["title_page"],
    "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/accueil.html', [
        "{{NAVIGATION}}" => generate_navigation($lang),
        "{{SECTION}}" => get_gabarit('main/encart_large.html', [
            "{{CONTENT_ENCART}}" => $code_html_temp
        ]),
        "{{SECTION_VIOLET_S__JOURNEY}}" => get_gabarit('main/encart_large.html', [
            "{{CONTENT_ENCART}}" => get_gabarit('main/encart_text_right.html', [
                "{{TEXT_CONTENT}}" => get_gabarit('components/violet_journey.html', [
                    "{{TEXT_CONTENT}}" => "0 idée de quoi mettre xD",
                    "{{PICTURE_SIDE}}" => ""
                ]),
                "{{PICTURE_SIDE}}" => "<image src=\"\" alt=\"\" title\"\">"
            ])
        ]),
        "{{SECTION_BIS}}" => get_gabarit('main/encart_large.html', [
            "{{CONTENT_ENCART}}" => get_gabarit('main/encart_text_left.html', [
                "{{TEXT_CONTENT}}" => "0 idée de quoi mettre xD",
                "{{PICTURE_SIDE}}" => ""
            ])
        ]),
        "{{SECTION_TRIS}}" => get_gabarit('main/encart_large.html', [
            "{{CONTENT_ENCART}}" => get_gabarit('main/encart_text_right.html', [
                "{{TEXT_CONTENT}}" => "0 idée de quoi mettre xD",
                "{{PICTURE_SIDE}}" => ""
            ])
        ])
    ])
]);
