<?php


namespace App\Http\Data;


class Customer extends Data
{
    public function handle()
    {
        return [
            'types' => [
                ['name' => 'buyer', 'label' => 'Գնորդ', 'value' => '0'],
                ['name' => 'renter', 'label' => 'Վարձակալ', 'value' => '1'],
            ]
        ];
    }
}