<?php

/*
 * This file is part of the dalencar/yii2-slate.
 *
 * Davidson Alencar <davidson.t.i@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace light\swagger;

use yii\base\Action;

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

    public function run() {
        $this->controller->layout = false;

        $view = $this->controller->getView();

        return $view->renderFile(__DIR__ . '/source/index.php', [
            'rest_url' => $this->restUrl,
        ], $this->controller);
    }

}
