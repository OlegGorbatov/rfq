<?php

declare(strict_types=1);

namespace rfq\controllers;

use common\yii\web\Controller;

use rfq\views\cities\Index_ViewFile;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Контроллер управления городами
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class CitiesController extends Controller
{
    const ACTION_INDEX = 'index';

    /**
     * Страница списка городов
     *
     * @return string
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function actionIndex()
    {
        $this->view->title = Yii::t('app', 'Cities manager');

        return $this->renderContent(new Index_ViewFile);
    }
}