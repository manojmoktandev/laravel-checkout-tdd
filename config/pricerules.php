<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product price rules vary on product quantites
    |--------------------------------------------------------------------------
    |

    */

    'price_rules' => [
        'FR1' => ['buy_one_get_free',null,null],
        'SR1' =>['bulk_discount',3,2]
    ]


];
