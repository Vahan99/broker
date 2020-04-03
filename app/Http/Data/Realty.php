<?php

namespace App\Http\Data;

class Realty extends Data
{
    public function handle()
    {
        return [
            'types' => [
                ['name' => 'apartment', 'value' => '0', 'label' => 'Բնակարան'],
                ['name' => 'house', 'value' => '1', 'label' => 'Տուն'],
                ['name' => 'mansion', 'value' => '2', 'label' => 'Առանձնատուն'],
                ['name' => 'bungalow', 'value' => '3', 'label' => 'Ամառանոց'],
                ['name' => 'office', 'value' => '4', 'label' => 'Գրասենյակ'],
                ['name' => 'restaurant', 'value' => '5', 'label' => 'Ռեստորան'],
                ['name' => 'shop', 'value' => '6', 'label' => 'Խանութ'],
                ['name' => 'land', 'value' => '7', 'label' => 'Հողատարածք'],
                ['name' => 'hairdresser', 'value' => '8', 'label' => 'Վարսավիրանոց'],
                ['name' => 'carmaintenance', 'value' => '9', 'label' => 'Ավտոտեխսպասարկում'],
                ['name' => 'garage', 'value' => '11', 'label' => 'Ավտոտնակ'],
                ['name' => 'other', 'value' => '10', 'label' => 'Այլ'],
            ],
            'realtyType' => [
                ['label' => 'Վարձակալություն', 'value' => '0'],
                ['label' => 'Վաճառք', 'value' => '1'],
            ],
            'projects' => [
                ['label' => 'Ստալին փ/ծ', 'value' => '0'],
                ['label' => 'Ստալին բ/ծ', 'value' => '1'],
                ['label' => 'Խռուշյչովյան', 'value' => '2'],
                ['label' => 'հետ Խռուշչովյան', 'value' => '3'],
                ['label' => 'Երևանյան', 'value' => '4'],
                ['label' => 'Չեխական', 'value' => '5'],
                ['label' => 'Բադալյան', 'value' => '6'],
                ['label' => 'Մոսկովյան', 'value' => '7'],
                ['label' => 'Վրացական', 'value' => '8'],
                ['label' => 'Հատուկ', 'value' => '9'],
                ['label' => 'Նորակառույց', 'value' => '10'],
                ['label' => 'Հանրակացարան', 'value' => '11'],
                ['label' => 'Այլ', 'value' => '12'],
            ],
            'buildingType' => [
                ['label' => 'Պանելային', 'value' => '0'],
                ['label' => 'Քարե', 'value' => '1'],
                ['label' => 'Մոնոլիտ', 'value' => '2'],
                ['label' => 'Աղյուսե', 'value' => '3'],
                ['label' => 'Փայտե', 'value' => '4'],
                ['label' => 'Կասետային', 'value' => '5'],
                ['label' => 'Այլ', 'value' => '6'],
            ],
            'decorations' => [
                ['label' => 'Պետական', 'value' => '0'],
                ['label' => 'Զրոյական', 'value' => '1'],
                ['label' => 'Վերանորոգած', 'value' => '2'],
                ['label' => 'Կապ․ վեր․', 'value' => '3'],
                ['label' => 'Մասամբ վեր․', 'value' => '4'],
                ['label' => 'Չբնակեցված վեր․', 'value' => '5'],
                ['label' => 'Հին կապիտալ', 'value' => '6'],
            ],
            'balconies' => [
                ['label' => 'Բաց', 'value' => '0'],
                ['label' => 'Փակ', 'value' => '1'],
                ['label' => 'Բաց և փակ', 'value' => '2'],
                ['label' => 'Շքապատշգամբ', 'value' => '3'],
                ['label' => 'Չունի', 'value' => '4'],
            ]
        ];
    }
}