<?php declare(strict_types=1);
include_once __DIR__ . '/constants.php';

function create_content_redirection_page() {
    echo get_gabarit('main/page.html', [
        "{{TITRE_PAGE}}" => "Redirection page",
        "{{CONTENU_PAGE}}" => get_gabarit('components/redirection.html', [
            '{{ADRESSE_SITE}}' => (DEV_MODE_ACTIVE ? ADRESSE_SITE_DEV : ADRESSE_SITE_PROD) . 'accueil.php'
        ])
    ]);
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

function load_text_according_to_langage() {
    // 1. récupération nom de la page
    $url_parts = explode('/', $_SERVER['PHP_SELF']);
    $nom_page = '';
    foreach ($url_parts as $url_part) {
        $nom_page = $url_part;
    }
    // 2. chargement fichier selon nom
    if (true) {
        include_once __DIR__ . '/langues/fr/' . $nom_page;
    } else {
        include_once __DIR__ . '/langues/en/' . $nom_page;
    }
}
