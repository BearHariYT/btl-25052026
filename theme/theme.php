<?php

return [
    'name'   => 'byteland',
    'author' => 'byteland.ru',
    'url'    => 'https://byteland.ru',

    'settings' => [
        [
            'name'    => 'dark-background',
            'label'   => 'Background',
            'type'    => 'color',
            'default' => 'hsl(237, 33%, 12%)',
        ],
        [
            'name'    => 'dark-background-secondary',
            'label'   => 'Surface',
            'type'    => 'color',
            'default' => 'hsl(231, 32%, 16%)',
        ],
        [
            'name'    => 'dark-primary',
            'label'   => 'Primary (Brand Blue)',
            'type'    => 'color',
            'default' => 'hsl(210, 100%, 48%)',
        ],
        [
            'name'    => 'dark-secondary',
            'label'   => 'Secondary',
            'type'    => 'color',
            'default' => 'hsl(210, 80%, 55%)',
        ],
        [
            'name'    => 'dark-neutral',
            'label'   => 'Border',
            'type'    => 'color',
            'default' => 'hsl(228, 26%, 18%)',
        ],
        [
            'name'    => 'dark-base',
            'label'   => 'Text Primary',
            'type'    => 'color',
            'default' => 'hsl(230, 50%, 95%)',
        ],
        [
            'name'    => 'dark-muted',
            'label'   => 'Text Muted',
            'type'    => 'color',
            'default' => 'hsl(230, 12%, 55%)',
        ],
        [
            'name'    => 'logo_display',
            'label'   => 'Logo Display',
            'type'    => 'select',
            'options' => [
                'logo-and-name' => 'Logo and Name',
                'logo-only'     => 'Logo Only',
                'name-only'     => 'Name Only',
            ],
            'default' => 'logo-and-name',
        ],
        [
            'name'    => 'show_category_description',
            'label'   => 'Show Category Description',
            'type'    => 'checkbox',
            'default' => true,
        ],
    ],
];
