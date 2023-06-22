<?php

use TelegramGithubNotify\App\Http\Actions\SetWebhookAction;
use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$setWebhookAction = new SetWebhookAction();
echo $setWebhookAction();
