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

use yii\base\Action;
use dalencar\slate\SlatePHP;

/**
 * The document display action.
 *
 * ~~~
 * public function actions()
 * {
 *     return [
 *         'api' => [
 *             'class' => 'dalencar\slate\SlateAction',
 *             'restUrl' => Url::to(['site/api'], true)
 *         ]
 *     ];
 * }
 * ~~~
 */
class SlateAction extends Action {

    /**
     * @var string The rest url configuration.
     */
    public $restUrl;
    
    /**
     * @var string The source base configuration.
     */
    public $sourceBase;
    
    /**
     * @var string The configuration file.
     */
    public $configFile;

    public function run() {
        
        // Hide debug
        $debug = \Yii::$app->getModule('debug');
        if ($debug) {
            $debug->instance->allowedIPs = [];
        }
        
        // Hide yii layout
        $this->controller->layout = false;

        // Get view
        $view = $this->controller->getView();
       
        $sourceBase = \Yii::getAlias($this->sourceBase);
        
        // Build the docs in the order specified by the menu items in the config
        // Individual pages will include sub-pages as needed
        $pages = [];
        $slatePHP = new SlatePHP();
        $slatePHP->setSourceDirectory($sourceBase);
        
        if (isset($this->configFile)) {
            $configFile = \Yii::getAlias($this->configFile);
            $slatePHP->setConfigByFile($configFile);
        }
        
        $config = $slatePHP->getConfig();
        
        foreach($config->menu as $page) {
            $pages[$page] = $slatePHP->setFile($page)->parse();
        }

        if ($config->menu_includes) {
            $slatePHP->setSourceDirectory($sourceBase . "/includes");
            foreach($config->menu_includes as $page) {
                $pages[$page] = $slatePHP->setFile($page)->parse();
            }
        }
        
        return $view->renderFile(__DIR__ . '/index.php', [
            'rest_url' => $this->restUrl,
            'pages' => $pages,
            'config' => $config
        ], $this->controller);
    }

}
