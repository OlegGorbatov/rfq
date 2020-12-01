<?php

declare(strict_types=1);

namespace rfq\views\cities;

use Yii;
use yii\helpers\Html;
use zalatov\yii2\viewfile\ViewFile;

/**
 * Страница со спиком городов
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class Index_ViewFile extends ViewFile
{
    public function __construct()
    {
        $this->renderer = function () {
?>

<div class="row justify-content-center">
    <div>
        <?= Yii::$app->params['olta_env'] ?>
    </div>
</div>
<h2><?= Html::encode($this->controller->view->title) ?></h2>

<cities-search></cities-search>

<?php };}}