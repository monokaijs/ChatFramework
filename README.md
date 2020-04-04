# ChatFramework
An easy Framework for Messenger Chatbots

## Hub Challenge
To make it easier for beginner, I've implemented a basic Hub Challenge Resolver in this Framework.

In the declaration of Framework, please set the second parameter to true while validating Webhook URL, so it should looks like this:
```php
$accessToken = '<PLACE_YOUR_PAGE_TOKEN_HERE>'; // Place your Page's Access Token here.
$bot = new \NorthStudio\ChatFramework($accessToken, true); // declaration of framework
$builder = new \NorthStudio\MessageBuilder(); // declaration of framework message builder
```
