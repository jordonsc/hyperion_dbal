Hyperion DBAL & API Client
==========================

Hyperion logistics and API client.

Command Line
------------
To view all command line options:
`./hyperion`

Configuration
-------------
To change the location of the API server, create a config file named `config/console-[ENV].yml` (replacing [ENV] with
'dev' or 'prod') and populate it with:

    data_manager:
        driver: Hyperion\Dbal\Driver\ApiDataDriver
        arguments: [ 'your.api-server.com' ]

    stack_manager:
        driver: Hyperion\Dbal\Driver\ApiStackDriver
        arguments: [ 'your.api-server.com' ]

