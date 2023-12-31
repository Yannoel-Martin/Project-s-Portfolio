<?php declare(strict_types=1);
include_once __DIR__ . '/constants.php';

function load_text_according_to_langage(string $lang) {
    $nom_page = get_name_current_page();
    include_once __DIR__ . '/langues/' . $lang . '/all.php';
    if (file_exists($nom_page)) {
        include_once __DIR__ . '/langues/' . $lang . '/' . $nom_page;
    }
}

/***********************/
/* component functions */
/***********************/

function generate_image_side_content(string $nom_image): string {
    return "<div class=\"image-side\" style=\"background-image: url(assets/images/" . $nom_image . ");\"></div>";
}

function generate_navigation(string $lang) {
    $nom_page = get_name_current_page();
    $trad_all = set_trad_all();
    
    $code_html = "";
    $code_html .= "<div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">";
    $code_html .= "<ul class=\"navbar-nav\">";
    foreach ($trad_all["pages-navbar"] as $key => $value) {
        $code_html .= "<li class=\"nav-item\">";
        $code_html .= "<a class=\"nav-link" . ($nom_page == $key ? " active" : "") . "\" aria-current=\"page\" href=\"" . $key . "?lang=" . $lang . "\">" . $value . "</a>";
        $code_html .= "</li>";
    }
    $code_html .= "</ul>";
    $code_html .= "</div>";
    
    $btn_html = "";
    $btn_html .= "<div class=\"navbar-brand\">";
    $btn_html .= "<a ". ($lang == "en" ? "style=\"opacity: 0.5;\"" : "onclick=\"change_langage('en');\"") . "><image width=\"35\" src=\"assets/images/icons8-en-96.png\" alt=\"" . $trad_all['btn-langue-en'] . "\" title=\"upd-lang-to-en\"></a>";
    $btn_html .= "<a ". ($lang == "fr" ? "style=\"opacity: 0.5;\"" : "onclick=\"change_langage('fr');\"") . "><image width=\"35\" src=\"assets/images/icons8-fr-96.png\" alt=\"" . $trad_all['btn-langue-fr'] . "\" title=\"upd-lang-to-fr\"></a>";
    $btn_html .= "</div>";

    return get_gabarit("main/navigation.html", [
        "{{NAV-LIST-ITEM}}" => $code_html,
        "{{NAV-LANG}}" => $btn_html,
        "{{ADRESSE_PAGE}}" => explode('?', $_SERVER['PHP_SELF'])[0]
    ]);
}

function create_content_redirection_page() {
    echo get_gabarit('main/page.html', [
        "{{TITRE_PAGE}}" => "Redirection page",
        "{{CONTENU_PAGE}}" => get_gabarit('pages-structure/redirection.html', [
            '{{ADRESSE_SITE}}' => (DEV_MODE_ACTIVE ? ADRESSE_SITE_DEV : ADRESSE_SITE_PROD) . 'accueil.php'
        ])
    ]);
}

function generate_middle_separator(string $color_initial, string $color_final): string {
    $code_html = "";
    $code_html .= "<div class=\"d-inline-block middle-screen text-center\">";
    $code_html .= "<div class=\"d-flex justify-content-center\">";
    $code_html .= "<div class=\"d-flex flex-column\">";
    $code_html .= "<div class=\"separateur-circle\" style=\"border: 1px solid " . $color_initial . ";\"></div>";
    $code_html .= "<div class=\"d-flex justify-content-center\">";
    $code_html .= "<div class=\"separateur\" style=\"background: linear-gradient(" . $color_initial . ", " . $color_final . ");\"></div>";
    $code_html .= "</div>";
    $code_html .= "<div class=\"separateur-circle\" style=\"border: 1px solid " . $color_final . ";\"></div>";
    $code_html .= "</div>";
    $code_html .= "</div>";
    $code_html .= "</div>";
    return $code_html;
}

/*********************/
/* general functions */
/*********************/

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
