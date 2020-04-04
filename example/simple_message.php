<?php
include "../autoload.php";
include "config.php";

// We turn on Hub Challenge Mode so the script will automatically pass the challenge.
$isHubChallenge = false;

// initialization of libraries
$bot = new \NorthStudio\ChatFramework($accessToken, $isHubChallenge);
$builder = new \NorthStudio\MessageBuilder();

// now we will get the sender's id
$userId = $bot->getSenderId();
// ... and get some basic information (don't forget to edit the scopes to get more information in dist/ChatFramework)
$userInfo = $bot->getUserData($userId);

// reply a simple text message to our user!
$bot->sendMessage(
    $userId, // First parameter is the recipient ID
    $builder->createTextMessage("Hello, " . $userInfo['name']) // Build a message structure!
);

// or an alternative solution for testing
$bot->sendTextMessage(
    $userId,
    "Hi " . $userInfo['name'] . ", have a nice day!"
);
