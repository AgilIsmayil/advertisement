<?php

namespace App\SelectData;

class AdvertisementStatus
{
    public static function getStatus($status = null, $selectColumn = 'name')
    {
        $data = [
            [
                'id' => 0,
                'name' => 'Qebul edilmedi',
                'color' => 'danger'
            ],
            [
                'id' => 1,
                'name' => 'Gozlemede',
                'color' => 'info'
            ],
            [
                'id' => 2,
                'name' => 'Tesdiq',
                'color' => 'success'
            ]
        ];

        if ((int)$status !== null) {
            foreach ($data as $datum) {
                if ((int)$datum['id'] == (int)$status)
                    return $datum[$selectColumn];
            }
        }

        return $data;
    }
}
