<?php declare(strict_types=1);

function set_trad_page(): array {
    $trad_page = [
        'title_page' => "Diplôme",
        'date_obtention' => "Date d'obtention : ",
        'lieu_obtention' => "Dans l'établissement : ",
        'spec_obtention' => "Dans la filière : ",
        'page_sections' => [
            'section_intro' => [
                'title_section' => "TITRE PAGE / SECTION INTRODUCTION"
            ],
            'titre_eii' => [
                'title_section' => "Expert en Ingénerie Informatique",
                'date' => "Au cours de l'année 2022",
                'lieu' => "Campus Academy Rennes, 35170 Bruz",
                'spec' => ""
            ],
            'titre_cda' => [
                'title_section' => "Concepteur Développeur d'Application",
                'date' => "Au cours de l'année 2020",
                'lieu' => "Campus Academy Rennes, 35170 Bruz",
                'spec' => ""
            ],
            'titre_bac' => [
                'title_section' => "Baccalauréat",
                'date' => "Au cours de l'année 2017",
                'lieu' => "Lycée Saint-Vincent La Providence, 35000 Rennes",
                'spec' => ""
            ]
        ]
    ];
    return $trad_page;
}
