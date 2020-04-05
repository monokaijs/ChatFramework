# ChatFramework

[![NorthStudio](https://i.imgur.com/62oJNEu.png)](https://nstudio.vn)

NorthStudio's ChatFramework is a PHP Framework that accelerate your Chatbot building process.

### Features
It supports:
  - Upload API
  - Send API
  - Messenger Profile (Basic)
  - Retrieve User Profile

Also contain:
  - A fast & structured Message Builder
  - Easy to modify

**Note:** You may want to have basic knowledge about Messenger Platform first. Please read Messenger APIs document before using this Framework.

### Supporting Components

Supporting almost components in Messenger Platform (exept some components soon will be deprecated):

* [Text Message] - A simple text message.
* [Generic Template] - A simple structured message that includes a title, subtitle, image, and up to three buttons.
* [List Template] - awesome web-based text editor
* [Button Template] - great UI boilerplate for modern web apps
* [Media Template] - Markdown parser done right. Fast and easy to extend.

### Installation
ChatFramework requires PHP 5+. The installation can easily be done by downloading this repository as zip then extract the folder into your project's directory.

```php
<?php
include "ChatFramework/autoload.php"; // Include the right directory of autoload.php file in Framework's directory
?>
```

### Prepare for usage
Please take the [Page Access Token](https://developers.facebook.com/docs/facebook-login/access-tokens/) of your Facebook Fanpage before continuing. If you don't know how to do it, please take it from Facebook Developer Dashboard.
Here is initialization script:
```php
<?php
$isHubChallenge = false; // set to true if you want to accept all Hub Challenge validation
$accessToken = "<PLACE_YOUR_PAGE_TOKEN_HERE>";

$bot = new \NorthStudio\ChatFramework($accessToken, $isHubChallenge);
$builder = new \NorthStudio\MessageBuilder();
?>
```

### Hub Challenge
At the first time you connect your Facebook App with Webhook, there's something called Hub Challenge. It's validation step of Facebook Platform so don't be worry. However, there're some notes for you:
- Webhook's URL must starts with **HTTPS**.
- You can use any secret key with this Framework, password of Hub Challenge makes no sense.
- Please set the second parameter of Class initialization `$isHubChallenge = true`

### Development
##### Create Generic Template
![Generic Template](https://scontent-sin6-1.xx.fbcdn.net/v/t39.2178-6/13178095_790767981060697_1148772092_n.png?_nc_cat=104&_nc_sid=5ca315&_nc_ohc=XLqBrOVLptQAX8hEknl&_nc_ht=scontent-sin6-1.xx&oh=8f33613f08b8fe925c21f20dbfb51b63&oe=5EB09C0A)
The generic template is a simple structured message that includes a title, subtitle, image, and up to three buttons. You may also specify a `default_action` object that sets a URL that will be opened in the Messenger webview when the template is tapped.

```php
// Create buttons
$firstButton = $builder->createButton("postback", "Nút 1", "button_1");
$secondButton = $builder->createButton("postback", "Nút 2", "button_2");
$thirdButton = $builder->createButton("postback", "Nút 3", "button_3");
// Default action when user click the message
$defaultAction = $builder->createTemplateDefaultAction('https://www.facebook.com');
// Create Template Element
$templateElement = $builder->createTemplateElement("Tiêu đề", "Tiêu đề con", $defaultAction, [
    $firstButton, $secondButton, $thirdButton
], "https://petersfancybrownhats.com/company_image.png");
// Create Template 
$genericTemplate = $builder->createGenericTemplate(
    $templateElement
);
// Finally, send it to user
$bot->sendMessage(
    $userId,
    $genericTemplate
);
```

##### Create List Template
##### Create Button Template
![Button Template](https://scontent-sin6-1.xx.fbcdn.net/v/t39.2365-6/23204276_131607050888932_1057585862134464512_n.png?_nc_cat=106&_nc_sid=ad8a9d&_nc_ohc=kkZf82mCIBgAX8-ewRG&_nc_ht=scontent-sin6-1.xx&oh=7622f7bd950b8227e6c71d14b91b5169&oe=5EADDC76)

##### Create Media Template
![Media Template](https://scontent-sin6-1.xx.fbcdn.net/v/t39.2178-6/13178095_790767981060697_1148772092_n.png?_nc_cat=104&_nc_sid=5ca315&_nc_ohc=XLqBrOVLptQAX8hEknl&_nc_ht=scontent-sin6-1.xx&oh=8f33613f08b8fe925c21f20dbfb51b63&oe=5EB09C0A)


   [Generic Template]: <https://developers.facebook.com/docs/messenger-platform/send-messages/template/generic>
   [List Template]: <https://developers.facebook.com/docs/messenger-platform/send-messages/template/list>
   [Button Template]: <https://developers.facebook.com/docs/messenger-platform/send-messages/template/button>
   [Media Template]: <https://developers.facebook.com/docs/messenger-platform/send-messages/template/media>
