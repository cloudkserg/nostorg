<?php
/**
 * Created by PhpStorm.
 * User: kirya
 * Date: 22.10.16
 * Time: 16:31
 */

namespace App\Type;


class OrderStatus extends ConstType
{

    const ACTIVE = 'active';
    const ARCHIVE = 'archive';
    const CANCELED = 'canceled';

    /**
     * @return array
     */
    public function getTitles()
    {
        return [
            self::ACTIVE => 'Активный',
            self::ARCHIVE => 'В архиве',
            self::CANCELED => 'Отменен'
        ];
    }


}