<?php


namespace NorthStudio;


class MessageBuilder {
    const version = "1.0.0";
    public function __construct() {

    }

    public function createGenericTemplate($elements) {
        if (!is_array($elements)) $elements = [$elements];
        return (object) array(
            "attachment" => array(
                "type" => "template",
                "payload" => array(
                    "template_type" => "generic",
                    "elements" => $elements
                )
            )
        );
    }

    public function createButtonTemplate($text, $buttons) {
        if (!is_array($buttons)) $buttons = [$buttons];
        return (object) array(
            "attachment" => array(
                "type" => "template",
                "payload" => array(
                    "template_type" => "button",
                    "text" => $text,
                    "buttons" => $buttons
                )
            )
        );
    }

    public function createMediaTemplate($attachments) {
        return (object) array(
            "attachment" => array(
                "type" => "template",
                "payload" => array(
                    "template_type" => "media",
                    "elements" => $attachments
                )
            )
        );
    }

    public function createListTemplate($elements, $topElementStyle, $buttons = []) {
        if (!is_array($buttons)) $buttons = [$buttons];
        if (!is_array($elements)) $elements = [$elements];
        return (object) array(
            "attachment" => array(
                "type" => "template",
                "payload" => array(
                    "template_type" => "list",
                    "top_element_style" => "$topElementStyle", // LARGE | COMPACT
                    "elements" => $elements,
                    "buttons" => $buttons
                )
            )
        );
    }

    public function createAttachmentElement($attachmentType, $attachmentId, $buttons = []) {
        if (!is_array($buttons)) $buttons = [$buttons];
        return (object) array(
            "media_type" => $attachmentType,
            "attachment_id" => $attachmentId,
            "buttons" => $buttons
        );
    }

    public function createTemplateElement($title, $subtitle, $defaultAction = '', $buttons = [], $imageUrl = '') {
        if (!is_array($buttons)) $buttons = [$buttons];
        return (object) array(
            "title" => $title,
            "subtitle" => $subtitle,
            "image_url" => $imageUrl,
            "default_action" => $defaultAction,
            "buttons" => $buttons
        );
    }

    public function createButton($type, $title, $payload = "", $url = "") {
        return (object) array_filter(array(
            "type" => $type,
            "title" => $title,
            "payload" => $payload,
            "url" => $url
        ));
    }

    public function createTemplateDefaultAction($url, $isMessengerExtension = false, $webviewHeight = "TALL") {
        return (object) array(
            "type" => "web_url",
            "url" => $url,
            "messenger_extensions" => $isMessengerExtension,
            "webview_height_ratio" => $webviewHeight
        );
    }

    public function createTextMessage($text) {
        return array(
            "text" => $text
        );
    }
}