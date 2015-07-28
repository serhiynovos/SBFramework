<?php
return
    [
        '^/docs/(?P<page>.*)' => [
            'assets' => [
                'js' => [
                    '/assets/syntaxhighlighter/scripts/shCore.js',
                    '/assets/assets/syntaxhighlighter/scripts/shBrushPhp.js'
                ],
                'css' => [
                    '/assets/assets/syntaxhighlighter/styles/shThemeRDark.css'
                ]
            ],
            'callback' => function ($page) {
                return new \app\sitebuilder\LayoutRender('docs/' . \app\sitebuilder\Application::$app->language . '/' . $page, [], 'doc');
            },
        ],
        '^/new$' => [
            'controller' => 'app\controllers\RubricController',
            'action' => 'new'
        ],

        '^/$' => [
            'callback' => function () {
                return new \app\sitebuilder\LayoutRender(
                    'index', [
                        'rubrics' => \app\sitebuilder\Application::$app->db->getAll('SELECT * FROM rubricks')
                    ]
                );
            }
        ],

        '^/rubric/(?P<id>.*)/(?P<action>.*)$' => [
            'controller' => 'app\controllers\RubricController',
        ],

        '^/rubric/(?P<action>.*)' => [
            'controller' => 'app\controllers\RubricController',
        ]
    ];