<?php

namespace dkhlystov\web;

use yii\web\AssetBundle;

class TranslitAsset extends AssetBundle
{
    public $js = [
        'translit.js',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/translit';
    }
}
