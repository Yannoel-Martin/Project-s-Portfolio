<?php declare(strict_types=1);
include_once __DIR__ . '/constants.php';

function load_text_according_to_langage(string $lang) {
    $nom_page = get_name_current_page();
    include_once __DIR__ . '/langues/' . $lang . '/all.php';
    if (file_exists($nom_page)) {
        include_once __DIR__ . '/langues/' . $lang . '/' . $nom_page;
    }
}

// component functions

function create_content_redirection_page() {
    echo get_gabarit('main/page.html', [
        "{{TITRE_PAGE}}" => "Redirection page",
        "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/redirection.html', [
            '{{ADRESSE_SITE}}' => (DEV_MODE_ACTIVE ? ADRESSE_SITE_DEV : ADRESSE_SITE_PROD) . 'accueil.php'
        ])
    ]);
}

// general functions

function check_langage(): string {
    if (isset($_GET['lang'])){
        $lang = $_GET['lang'];
    } else {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // On detecte la langue du navigateur
        if ($lang != "fr") {
            $lang = "en"; // gestion des langues autre que FR / EN
        }
    }
    return $lang;
}

function get_name_current_page(): string {
    $url_parts = explode('/', $_SERVER['PHP_SELF']);
    $nom_page = '';
    foreach ($url_parts as $url_part) {
        $nom_page = $url_part;
    }
    return $nom_page;
}

function get_gabarit(string $filename, array $trans = []): string {
    $code_html = file_get_contents(ADRESSE_GABARIT . $filename);
    if (count($trans)) {
        foreach ($trans as $key_balise => $content_html) {
            if (is_string($content_html)) {
                $code_html = str_replace($key_balise, $content_html, $code_html);
            }
        }
    }
    return $code_html;
}
