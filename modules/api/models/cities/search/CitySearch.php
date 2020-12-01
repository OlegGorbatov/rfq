<?php

declare(strict_types=1);

namespace rfq\modules\api\models\cities\search;

use common\models\db\rfq\OltaRfqCities;
use common\yii\base\Model;
use common\yii\validators\StringValidator;

/**
 * Поиск городов
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class CitySearch extends Model
{
    /** @var string Код города */
    public $name;
    const ATTR_NAME = 'name';

    /**
     * {@inheritdoc}
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function formName(): string
    {
        return '';
    }

    /**
     * {@inheritDoc}
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function rules(): array
    {
        return [
            [static::ATTR_NAME, StringValidator ::class],
        ];
    }

    /**
     * Поиск городов
     *
     * @param array $params
     *
     * @return CityResult
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function search(array $params) : CityResult
    {
        $this->load($params);

        $query = OltaRfqCities::find()
            ->orderBy([OltaRfqCities::ATTR_CODE => SORT_ASC])
        ;

        if (true === $this->validate()) {
            $query->andFilterWhere(['like', OltaRfqCities::ATTR_NAME, $this->name]);
        }

        return new CityResult($query);
    }
}