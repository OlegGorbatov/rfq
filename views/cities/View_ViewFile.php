<?php

declare(strict_types=1);

namespace rfq\views\quotations;

use common\models\db\rfq\OltaRfqQuotation;
use yii\helpers\Html;
use zalatov\yii2\viewfile\ViewFile;

/**
 * Class View_ViewFile
 *
 * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
 */
class View_ViewFile extends ViewFile
{
    /**
     * @param OltaRfqQuotation $quotation
     *
     * @author Oleg Gorbatov <o.i.gorbatov@yandex.ru>
     */
    public function __construct(OltaRfqQuotation $quotation)
    {
        $this->renderer = function () use ($quotation) {
?>

<h1><?= Html::decode($quotation->id) ?></h1>

<?php };}}