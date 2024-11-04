<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/env.php';

use App\Service\SearchService;
use App\Repository\SearchRepository;

try {
    if ($argc !== 3 || $argv[1] !== 'search') {
        throw new InvalidArgumentException(
            'Uso: php main.php search <término>'
        );
    }

    $dbHost = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPass = getenv('DB_PASS');

    $searchTerm = $argv[2];
    
    $pdo = new PDO(
        "mysql:host=$dbHost;dbname=$dbName",
        $dbUser,
        $dbPass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    $repository = new SearchRepository($pdo);
    $service = new SearchService($repository);
    
    $results = $service->search($searchTerm);
    
    foreach ($results as $result) {
        echo $result . PHP_EOL;
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    exit(1);
}