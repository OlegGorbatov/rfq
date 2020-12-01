<?php

declare(strict_types=1);

namespace rfq\config;

use rfq\controllers\AuthController;
use rfq\controllers\QuotationController;
use rfq\controllers\CountriesController;
use rfq\controllers\CitiesController;

$uuidRegex = '[({]?(0x)?[0-9a-fA-F]{8}([-,]?(0x)?[0-9a-fA-F]{4}){2}((-?[0-9a-fA-F]{4}-?[0-9a-fA-F]{12})|(,\{0x[0-9a-fA-F]{2}(,0x[0-9a-fA-F]{2}){7}\}))[)}]?';

return [
    ''               => QuotationController::routeId(QuotationController::ACTION_INDEX),
    'quotation/view' => QuotationController::routeId(QuotationController::ACTION_VIEW),

    // Страны
    'countries'      => CountriesController::routeId(CountriesController::ACTION_INDEX),

    // Auth
    'login'          => AuthController::routeId(AuthController::ACTION_LOGIN),

    //Cities
    'cities'               => CitiesController::routeId(CitiesController::ACTION_INDEX),
];