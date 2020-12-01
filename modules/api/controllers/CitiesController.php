<?php

declare(strict_types=1);

namespace rfq\modules\api\controllers;

use common\models\db\rfq\OltaRfqCities;
use common\yii\web\RestController;

use rfq\modules\api\models\cities\search\CityResult;
use rfq\modules\api\models\cities\search\CitySearch;
use rfq\modules\api\models\cities\form\CityForm;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * Контроллер городов
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class CitiesController extends RestController
{
    const ACTION_SEARCH = 'search';
    const ACTION_CREATE = 'create';
    const ACTION_UPDATE = 'update';

    const PARAM_ID = 'id';

    /**
     * {@inheritdoc}
     *
     * @author Lev Stepanets <lev.stepanets@gmail.com>
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors[] = [
            'class'   => VerbFilter::class,
            'actions' => [
                static::ACTION_CREATE => ['POST'],
                static::ACTION_UPDATE => ['POST']
            ]
        ];

        return $behaviors;
    }

    /**
     * Поиск городов
     *
     * @return CityResult
     *
     * @throws
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function actionSearch(): CityResult
    {
        return (new CitySearch())->search(Yii::$app->getRequest()->get());
    }

    /**
     * Создание города
     *
     * @return CityForm
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function actionCreate(): CityForm
    {
        $form = new CityForm();

        if (true === ($form->load(Yii::$app->request->post()) && $form->validate())) {
            $form->create();
        }

        return $form;
    }

    /**
     * Обновление города
     *
     * @param int $id
     *
     * @return CityForm
     *
     * @throws
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function actionUpdate(int $id): CityForm
    {
        $form = new CityForm();

        if (true === ($form->load(Yii::$app->request->post()) && $form->validate())) {
            $form->update($this->findModel($id));
        }

        return $form;
    }

    /**
     * @param int $id
     *
     * @return OltaRfqCities
     *
     * @throws  NotFoundHttpException
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     *
     */
    public function findModel(int $id): OltaRfqCities
    {
        $model = OltaRfqCities::findOne($id);

        if (null === $model) {
            throw new NotFoundHttpException;
        }

        return $model;
    }
}