<?php

namespace App\Helpers;

class PropertyAreaTypes {
    const ROOM_APARTMENT = 1;
    const STORAGE = 5;
    const PARKING = 4;


    private const STATUS_MAP = [
        self::ROOM_APARTMENT => 'Mieszkanie / Apartament',
        self::STORAGE => 'Komórka lokatorska',
        self::PARKING => 'Miejsce parkingowe',
    ];

    public static function getStatusText(int $statusValue): ?string
    {
        return self::STATUS_MAP[$statusValue] ?? null;
    }

    public static function getAll(): array
    {
        return self::STATUS_MAP;
    }

    public static function getOthers(): array
    {
        return array_intersect_key(self::STATUS_MAP, [
            self::STORAGE => true,
            self::PARKING => true,
        ]);
    }

    // 🔹 Opcjonalnie: tylko działki / grunty
//    public static function getLandTypes(): array
//    {
//        return array_intersect_key(self::STATUS_MAP, [
//            self::BUILDING_PLOT => true,
//            self::RECREATIONAL_PLOT => true,
//            self::INVESTMENT_PLOT => true,
//            self::AGRICULTURAL_LAND => true,
//            self::FOREST_LAND => true,
//            self::INDUSTRIAL_LAND => true,
//            self::SERVICE_LAND => true,
//        ]);
//    }
}
