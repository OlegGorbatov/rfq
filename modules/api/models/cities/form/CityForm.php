<?php

declare(strict_types=1);

namespace rfq\modules\api\models\cities\form;

use common\models\db\rfq\OltaRfqCities;
use common\yii\base\Model;
use common\yii\validators\StringValidator;
use common\yii\validators\TrimValidator;
use common\yii\validators\BoolValValidator;

use Yii;
use yii\validators\RequiredValidator;

/**
 * Class CityForm
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class CityForm extends Model
{
    /** @var string code */
    public $code;
    const ATTR_CODE = 'code';

    /** @var string name */
    public $name;
    const ATTR_NAME = 'name';

    /** @var string Group */
    public $group;
    const ATTR_GROUP = 'group';

    /** @var int rzdCode */
    public $rzdCode;
    const ATTR_RZD_CODE = 'rzdCode';

    /** @var int Accessible in Quotation*/
    public $quotationAccessible;
    const ATTR_QUOTATION_ACCESSIBLE = 'quotationAccessible';

    /** @var int Accessible in Quotation for Clients */
    public $quotationAccessibleForClients;
    const ATTR_QUOTATION_ACCESSIBLE_FOR_CLIENT = 'quotationAccessibleForClients';

    /** @var int Available for MICE */
    public $mice;
    const ATTR_MICE = 'mice';

    /** @var array Доступные значения для поля group */
    const GROUP_ITEMS = [
        'Default',
        'Golden Ring',
        'Transsib',
        'Technical',
        'Two Capitals',
        'Baltic States',
        'Baikal',
        'Others',
    ];

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
     * {@inheritdoc}
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function rules(): array
    {
        return [
            /** Правила валидации что-бы получить все корректные поля модели через метод load */

            [static::ATTR_CODE, RequiredValidator  ::class],
            [static::ATTR_CODE, StringValidator    ::class],
            [static::ATTR_CODE, TrimValidator      ::class],

            [static::ATTR_NAME, RequiredValidator  ::class],
            [static::ATTR_NAME, StringValidator    ::class],
            [static::ATTR_NAME, TrimValidator      ::class],

            [static::ATTR_RZD_CODE, StringValidator::class],

            [static::ATTR_GROUP, 'in', 'range' => static::GROUP_ITEMS],

            [static::ATTR_QUOTATION_ACCESSIBLE,  BoolValValidator::class],

            [static::ATTR_QUOTATION_ACCESSIBLE_FOR_CLIENT,  BoolValValidator::class],

            [static::ATTR_MICE,  BoolValValidator::class],
        ];
    }

    /**
     * Добавление города
     *
     * @return bool
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function create(): bool
    {
        $model = new OltaRfqCities;

        $model->code                             = $this->code;
        $model->name                             = $this->name;
        $model->group                            = $this->group;
        $model->rzdCode                          = $this->rzdCode;
        $model->quotationAccessible              = $this->quotationAccessible;
        $model->quotationAccessibleForClients    = $this->quotationAccessibleForClients;
        $model->mice                             = $this->mice;

        return $model->save();
    }

    /**
     * Обновление города
     *
     * @param OltaRfqCities $city
     *
     * @return bool
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function update(OltaRfqCities $city): bool
    {
        $city->code                             = $this->code;
        $city->name                             = $this->name;
        $city->group                            = $this->group;
        $city->rzdCode                          = $this->rzdCode;
        $city->quotationAccessible              = $this->quotationAccessible;
        $city->quotationAccessibleForClients    = $this->quotationAccessibleForClients;
        $city->mice                             = $this->mice;

        return $city->save();
    }
}