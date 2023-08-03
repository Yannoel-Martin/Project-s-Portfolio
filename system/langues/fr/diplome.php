<?php declare(strict_types=1);

function set_trad_page(): array {
    $trad_page = [
        'title_page' => "Diplôme",
        'page_sections' => [
            'section_intro' => [
                'title_section' => "TITRE PAGE / SECTION INTRODUCTION"
            ],
            'titre_eii' => [
                'title_section' => "Certification - Expert en Ingénerie Informatique"
            ],
            'titre_cda' => [
                'title_section' => "Certification - Concepteur Développeur d'Application"
            ],
            'titre_bac' => [
                'title_section' => "Diplôme - Baccalauréat"
            ]
        ]
    ];
    return $trad_page;
}
