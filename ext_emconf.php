<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoila! Plus for Yoast SEO',
    'description' => 'Integration of Yoast SEO into TemplaVoilà! Plus.',
    'category' => 'misc',
    'version' => '0.1.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz@pluspol-interactive.de',
    'author_company' => 'PLUSPOL interactive',
    'constraints' => [
        'depends' => [
            'php' => '5.5.0-7.2.99',
            'typo3' => '7.6.0-8.7.99',
            'templavoilaplus' => '7.1.3-7.99.99',
            'yoast_seo' => '1.1.0-1.1.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Ppi\\PpiTemplavoilaplusYoast\\' => 'Classes/',
        ],
    ],
];
