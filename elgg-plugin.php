<?php

//require_once(__DIR__ . '/lib/functions.php');

//use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(__DIR__);
//$dotenv->safeLoad();


return [

    'entities' =>[
        
                    //Declare Legislations Entity
                    [
                        'type' => 'object',
                        'subtype' => 'jobs',
                        'class' => 'ElggJobs',
                        'capabilities' => [
                            'commentable' => true,
                            'searchable' => true,
                            'likable' => true,
                        ],
                        'searchable' => true,
                        
                    ],

                ],
                
    //Acciones (Guardar la propuesta, marcar designada, etc)
    'actions' => [
        'jobs/save' => [],
    ],

    //Rutas del plugin (Todos, Ver, Editar)
    'routes' => [
        
        //Ruta necesaria para el link del menu principal
        'default:object:jobs' => [
			'path' => '/jobs',
			'resource' => 'jobs/all',
		],

        //Ruta para todas las propuestas
        'collection:object:jobs:all' =>[
            'path' => '/jobs/all',
            'resource' => 'jobs/all'
        ],
        'collection:object:jobs:owner' => [
			'path' => '/jobs/owner/{username?}/{lower?}/{upper?}',
			'resource' => 'jobs/owner',
			'requirements' => [
				'lower' => '\d+',
				'upper' => '\d+',
			],
		],

        //Add new job route
        'add:object:jobs' => [
			'path' => '/jobs/add/{guid}',
			'resource' => 'jobs/add',
			'middleware' => [
				\Elgg\Router\Middleware\Gatekeeper::class,
               // \Elgg\Router\Middleware\AdminGatekeeper::class,
			],
		],
/*
        

        //Ver la propuesta que se ha publicado
        'view:object:legislations' => [
			'path' => '/legislations/view/{guid}/{title?}',
			'resource' => 'legislations/view',
		],

        //Editar la propuesta
        'edit:object:legislations' => [
			'path' => '/legislations/edit/{guid}',
			'resource' => 'legislations/edit',
			'middleware' => [
				\Elgg\Router\Middleware\Gatekeeper::class,
			],
		],

        //Ver propuestas seleccionadas
        'selected:object:legislations' => [
			'path' => '/legislations/selected',
			'resource' => 'legislations/selected',
			
		],*/

    ],




    
    'view_extensions' => [
        'elgg.css' => [
			'custom/jobs/sidebar.css' => [],
		],
    ],

    'hooks' =>[
        'likes:is_likable' => [
			'object:jobs' => [
				'Elgg\Values::getTrue' => [],
			],
		],
         //Add plugin menu
         'register' =>[
            
            //Register the site menu. It is located in the folder /Elgg/Jobs/Menus/Site.php
            'menu:site' => [
                'Elgg\Jobs\Menus\Site::register' => [],
            ],
            'menu:title:object:jobs' => [
                \Elgg\Notifications\RegisterSubscriptionMenuItemsHandler::class => [],
            ],
        ],
    ],

];