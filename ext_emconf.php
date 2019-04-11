<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoilà! Plus for Yoast SEO',
    'description' => 'Integration of Yoast SEO into TemplaVoilà! Plus page layout module.',
    'category' => 'misc',
    'version' => '0.3.1-dev',
    'state' => 'stable',
    'uploadfolder' => 0,
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz@pluspol-interactive.de',
    'author_company' => 'PLUSPOL interactive GbR',
    'constraints' => [
        'depends' => [
            'php' => '5.5.0-7.3.99',
            'typo3' => '7.6.0-9.5.99',
            'templavoilaplus' => '7.1.3-7.99.99',
            'yoast_seo' => '1.1.0-4.99.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Ppi\\PpiTemplavoilaplusYoast\\' => 'Classes/',
        ],
    ],
];
