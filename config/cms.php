<?php

return [

    'theme' => [

        'folder' => 'themes',
        'active' => 'default'

    ],

    'templates' => [

        'home' => emutoday\Templates\HomeTemplate::class,
        'blog' => emutoday\Templates\BlogTemplate::class,
        'blog.post' => emutoday\Templates\BlogPostTemplate::class,
    ]
];
