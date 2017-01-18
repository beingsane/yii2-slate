<?php

/*
 * This file is part of the dalencar/yii2-slate.
 *
 * Davidson Alencar <davidson.t.i@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace dalencar\slate;

use yii\web\AssetBundle;
//use yii\web\View;

class SlateAsset extends AssetBundle {

    public $sourcePath = '@vendor/dalencar/yii2-slate/source';
    
    public $js = [
        'javascripts/lib/_jquery.js',
        'javascripts/lib/_jquery_ui.js',
        'javascripts/lib/_jquery.highlight.js',
        'javascripts/lib/_lunr.js',
        'javascripts/app/_search.js',
        'javascripts/lib/_jquery.tocify.js',
        'javascripts/lib/_imagesloaded.min.js',
        'javascripts/app/_lang.js',
        'javascripts/lib/prism.js',
        'javascripts/app/_toc.js',
    ];
    
//    public $jsOptions = [
//        'position' => View::POS_HEAD,
//    ];

    public $css = [
        'stylesheets/screen.css',
        'stylesheets/print.css',
        'stylesheets/prism.css',
        'stylesheets/prism_overrides.css',
    ];

}
