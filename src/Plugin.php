<?php

namespace therefinery\helpers;

use Craft;
use therefinery\helpers\twigextensions\UrlHelpersTwigExtension;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        Craft::$app->view->registerTwigExtension(new UrlHelpersTwigExtension());
    }
}