<?php
require __DIR__.'/vendor/autoload.php';

use App\Kernel;
use App\Message\TestMessageOne;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv())->bootEnv(__DIR__.'/.env');

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$kernel->boot();

$bus = $kernel->getContainer()->get('messenger.default_bus');
$bus->dispatch(new TestMessageOne('Simulated message'));
echo "Dispatched!\n";
