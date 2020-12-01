<?php

declare(strict_types=1);

namespace rfq\modules\api\models\cities\search\models;

/**
 * Модель городов для поиска
 *
 * @author @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class CityItem
{
    /** @var string code */
    public $code;

    /** @var string name */
    public $name;

    /** @var string|null nameByLang*/
    public $nameByLang;

    /** @var string|null nameByLang2 */
    public $nameByLang2;

    /** @var string Group */
    public $group;

    /** @var int rzdCode */
    public $rzdCode;

    /** @var int Accessible in Quotation*/
    public $quotationAccessible;

    /** @var int Accessible in Quotation for Clients */
    public $quotationAccessibleForClients;

    /** @var int Available for MICE */
    public $mice;
}