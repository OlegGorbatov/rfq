<?php

declare(strict_types=1);

namespace rfq\modules\api\models\cities\search;

use common\yii\dataProviders\ApiResult;
use common\models\db\rfq\OltaRfqCities;

use rfq\modules\api\models\cities\search\models\CityItem;

/**
 * Результат поиска городов
 *
 * @property CityItem[] $items Список городов
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class CityResult extends ApiResult
{
    /**
     * Создать объект города
     *
     * @param OltaRfqCities $city Модель города
     *
     * @return CityItem
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public static function makeApiItem($city): CityItem
    {
        $cityItem = new CityItem;

        $cityItem->code         = $city->code;
        $cityItem->name         = $city->name;
        $cityItem->nameByLang   = $city->nameByLang;
        $cityItem->nameByLang2  = $city->nameByLang2;
        $cityItem->group        = $city->group;
        $cityItem->rzdCode      = $city->rzdCode;
        $cityItem->quotationAccessible    = $city->quotationAccessible;
        $cityItem->quotationAccessibleForClients    = $city->quotationAccessibleForClients;
        $cityItem->mice         = $city->mice;

        return $cityItem;
    }
}