<?php declare(strict_types=1);

function set_trad_page(): array {
    $trad_page = [
        'title_page' => "Diploma",
        'date_obtention' => "Date obtained : ",
        'lieu_obtention' => "In the building : ",
        'spec_obtention' => "In the sector : ",
        'page_sections' => [
            'section_intro' => [
                'title_section' => "TITRE PAGE / SECTION INTRODUCTION"
            ],
            'titre_eii' => [
                'title_section' => "Expert in Computer Engineering",
                'date' => "During the year 2022",
                'lieu' => "Campus Academy Rennes, 35170 Bruz",
                'spec' => "Development"
            ],
            'titre_cda' => [
                'title_section' => "Application Designer Developer",
                'date' => "During the year 2020",
                'lieu' => "Campus Academy Rennes, 35170 Bruz",
                'spec' => "Development"
            ],
            'titre_bac' => [
                'title_section' => "Baccalaureate",
                'date' => "During the year 2017",
                'lieu' => "High School Saint-Vincent La Providence, 35000 Rennes",
                'spec' => "Computer Science and Digital Science"
            ]
        ]
    ];
    return $trad_page;
}
