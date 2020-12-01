<?php

use rfq\modules\api\controllers\AuthController;
use rfq\modules\api\controllers\AutocompleteController;
use rfq\modules\api\controllers\QuotationAccommodationsController;
use rfq\modules\api\controllers\QuotationCommentController;
use rfq\modules\api\controllers\QuotationController;
use rfq\modules\api\controllers\QuotationDatesController;
use rfq\modules\api\controllers\QuotationGeneralGroupController;
use rfq\modules\api\controllers\QuotationGroupOptionsController;
use rfq\modules\api\controllers\QuotationOptionsController;
use rfq\modules\api\controllers\QuotationPeriodsController;
use rfq\modules\api\controllers\QuotationProgramController;
use rfq\modules\api\controllers\TourOperatorCompanyController;
use rfq\modules\api\controllers\CountriesController;
use rfq\modules\api\controllers\CitiesController;

return [
    'api/login'  => AuthController::routeId(AuthController::ACTION_LOGIN),
    'api/logout' => AuthController::routeId(AuthController::ACTION_LOGOUT),

    'api/quotation/search'                                 => QuotationController::routeId(QuotationController::ACTION_SEARCH),
    'api/quotation/create'                                 => QuotationController::routeId(QuotationController::ACTION_CREATE),
    'api/quotation/view'                                   => QuotationController::routeId(QuotationController::ACTION_VIEW),
    'api/quotation/update-date-range'                      => QuotationController::routeId(QuotationController::ACTION_UPDATE_DATE_RANGE),

    // ==== Quitation Options
    'api/quotation-options/view'                           => QuotationOptionsController::routeId(QuotationOptionsController::ACTION_VIEW),
    'api/quotation-options/update'                         => QuotationOptionsController::routeId(QuotationOptionsController::ACTION_UPDATE),
    'api/quotation-options/update-additional'              => QuotationOptionsController::routeId(QuotationOptionsController::ACTION_UPDATE_ADDITIONAL),

    // ==== Quitation General Groups
    'api/quotation-groups/view'                            => QuotationGeneralGroupController::routeId(QuotationGeneralGroupController::ACTION_VIEW),
    'api/quotation-groups/create'                          => QuotationGeneralGroupController::routeId(QuotationGeneralGroupController::ACTION_CREATE),
    'api/quotation-groups/update'                          => QuotationGeneralGroupController::routeId(QuotationGeneralGroupController::ACTION_UPDATE),
    'api/quotation-groups/delete'                          => QuotationGeneralGroupController::routeId(QuotationGeneralGroupController::ACTION_DELETE),

    // ==== Quitation Groups
    'api/quotation-groups-options/view'                    => QuotationGroupOptionsController::routeId(QuotationGroupOptionsController::ACTION_VIEW),
    'api/quotation-groups-options/create'                  => QuotationGroupOptionsController::routeId(QuotationGroupOptionsController::ACTION_CREATE),
    'api/quotation-groups-options/update'                  => QuotationGroupOptionsController::routeId(QuotationGroupOptionsController::ACTION_UPDATE),
    'api/quotation-groups-options/delete'                  => QuotationGroupOptionsController::routeId(QuotationGroupOptionsController::ACTION_DELETE),

    // ==== Quitation Dates
    'api/quotation-dates/view'                             => QuotationDatesController::routeId(QuotationDatesController::ACTION_VIEW),
    'api/quotation-dates/create'                           => QuotationDatesController::routeId(QuotationDatesController::ACTION_CREATE),
    'api/quotation-dates/delete'                           => QuotationDatesController::routeId(QuotationDatesController::ACTION_DELETE),

    // ==== Quitation Periods
    'api/quotation-periods/view'                           => QuotationPeriodsController::routeId(QuotationPeriodsController::ACTION_VIEW),
    'api/quotation-periods/create'                         => QuotationPeriodsController::routeId(QuotationPeriodsController::ACTION_CREATE),
    'api/quotation-periods/delete'                         => QuotationPeriodsController::routeId(QuotationPeriodsController::ACTION_DELETE),

    // ==== Quitation Comments
    'api/quotation-comments/view'                          => QuotationCommentController::routeId(QuotationCommentController::ACTION_VIEW),
    'api/quotation-comments/create'                        => QuotationCommentController::routeId(QuotationCommentController::ACTION_CREATE),
    'api/quotation-comments/update'                        => QuotationCommentController::routeId(QuotationCommentController::ACTION_UPDATE),
    'api/quotation-comments/delete'                        => QuotationCommentController::routeId(QuotationCommentController::ACTION_DELETE),

    // ==== Quitation Accommodations
    'api/quotation-accommodations/view'                    => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_VIEW),
    'api/quotation-accommodations/create'                  => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_CREATE),
    'api/quotation-accommodations/update'                  => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_UPDATE),
    'api/quotation-accommodations/delete'                  => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_DELETE),
    'api/quotation-accommodations/period-prices-update'    => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_PERIOD_PRICES_UPDATE),
    'api/quotation-accommodations/date-prices-update'      => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_DATE_PRICES_UPDATE),
    'api/quotation-accommodations/update-hotel-price-type' => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_UPDATE_HOTEL_PRICE_TYPE),
    'api/quotation-accommodations/actions'                 => QuotationAccommodationsController::routeId(QuotationAccommodationsController::ACTION_ACTIONS),

    // Services

    'api/quotation-services/program'            => QuotationProgramController::routeId(QuotationProgramController::ACTION_PROGRAM),
    'api/quotation-program/before'              => QuotationProgramController::routeId(QuotationProgramController::ACTION_PROGRAM_DROP_BEFORE),
    'api/quotation-program/after'               => QuotationProgramController::routeId(QuotationProgramController::ACTION_PROGRAM_DROP_AFTER),

    // Autocomplete
    'api/autocomplete/sales-managers'           => AutocompleteController::routeId(AutocompleteController::ACTION_SALES_MANAGERS),
    'api/autocomplete/clients'                  => AutocompleteController::routeId(AutocompleteController::ACTION_CLIENTS),
    'api/autocomplete/services'                 => AutocompleteController::routeId(AutocompleteController::ACTION_SERVICES),


    // Tour Operator Companies
    'api/tour-operator-companies/autocomplete'  => TourOperatorCompanyController::routeId(TourOperatorCompanyController::ACTION_AUTOCOMPLETE),
    'api/tour-operator-companies/users'         => TourOperatorCompanyController::routeId(TourOperatorCompanyController::ACTION_USERS),
    'api/tour-operator-companies/create-client' => TourOperatorCompanyController::routeId(TourOperatorCompanyController::ACTION_CREATE_CLIENT),

    //Города
    'api/cities/search'                         => CitiesController::routeId(CitiesController::ACTION_SEARCH),
    'api/cities/create'                         => CitiesController::routeId(CitiesController::ACTION_CREATE),
    'api/cities/update/<id:\d+>'                => CitiesController::routeId(CitiesController::ACTION_UPDATE),

    // Страны
    'api/countries/search'                      => CountriesController::routeId(CountriesController::ACTION_SEARCH),
    'api/countries/create'                      => CountriesController::routeId(CountriesController::ACTION_CREATE),
    'api/countries/update/<id:\d+>'             => CountriesController::routeId(CountriesController::ACTION_UPDATE)
];