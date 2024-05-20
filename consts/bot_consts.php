<?php

use App\Utils\DotEnvUtil;

DotEnvUtil::loadEnv('../.env');

define('BOT_TOKEN', $_ENV['API_KEY']);
define('BOT_URL', "https://api.telegram.org/bot".BOT_TOKEN."/");