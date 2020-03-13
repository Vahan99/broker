<?php

use Illuminate\Database\Seeder;

class DataTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'regions' => [
                ['id' => '1', 'name' => 'Երևան'],
                ['id' => '2', 'name' => 'Արագածոտն'],
                ['id' => '3', 'name' => 'Արարատ'],
                ['id' => '4', 'name' => 'Արմավիր'],
                ['id' => '5', 'name' => 'Արցախ'],
                ['id' => '6', 'name' => 'Գեղարքունիք'],
                ['id' => '7', 'name' => 'Կոտայք'],
                ['id' => '8', 'name' => 'Լոռի'],
                ['id' => '9', 'name' => 'Շիրակ'],
                ['id' => '10', 'name' => 'Սյունիք'],
                ['id' => '11', 'name' => 'Տավուշ'],
                ['id' => '12', 'name' => 'Վայոց Ձոր'],
            ],
            'sub_regions' => [
                ['name' => 'Դավթաշեն', 'region_id' => '1'],
                ['name' => 'Էրեբունի', 'region_id' => '1'],
                ['name' => 'Զեյթուն', 'region_id' => '1'],
                ['name' => 'Կենտրոն Մեծ', 'region_id' => '1'],
                ['name' => 'Կենտրոն Փոքր', 'region_id' => '1'],
                ['name' => 'Մալաթիա', 'region_id' => '1'],
                ['name' => 'Նոր-Նորք', 'region_id' => '1'],
                ['name' => 'Նորք Մարաշ', 'region_id' => '1'],
                ['name' => 'Նուբարաշեն', 'region_id' => '1'],
                ['name' => 'Շենգավիթ', 'region_id' => '1'],
                ['name' => 'Քանաքեռ', 'region_id' => '1'],
                ['name' => 'Բանգլադեշ', 'region_id' => '1'],
                ['name' => 'Արաբկիր', 'region_id' => '1'],
                ['name' => 'Աջափնյակ', 'region_id' => '1'],
                ['name' => 'Պտղնի', 'region_id' => '7'],
                ['name' => 'Արգել', 'region_id' => '7'],
                ['name' => 'Ապարան', 'region_id' => '2'],
                ['name' => 'Արագած', 'region_id' => '2'],
                ['name' => 'Աշտարակ', 'region_id' => '2'],
                ['name' => 'Կոշ', 'region_id' => '2'],
                ['name' => 'Թալին', 'region_id' => '2'],
                ['name' => 'ՈՒջան', 'region_id' => '2'],
                ['name' => 'Արարատ', 'region_id' => '3'],
                ['name' => 'Արտաշատ', 'region_id' => '3'],
                ['name' => 'Գեղանիստ', 'region_id' => '3'],
                ['name' => 'Մասիս', 'region_id' => '3'],
                ['name' => 'Վեդի', 'region_id' => '3'],
                ['name' => 'Ավան', 'region_id' => '1'],
                ['name' => 'Ջրվեժ', 'region_id' => '7'],
                ['name' => 'Նոր Հաճըն', 'region_id' => '7'],
                ['name' => 'Քասախ', 'region_id' => '7'],
                ['name' => 'Քանաքեռավան', 'region_id' => '7'],
                ['name' => 'Աբովյան', 'region_id' => '7'],
                ['name' => 'Զովունի', 'region_id' => '7'],
                ['name' => 'Ձորաղբյուր', 'region_id' => '7'],
                ['name' => 'Օշական', 'region_id' => '2'],
                ['name' => '․Բոլորը', 'region_id' => '1'],
            ],
            'users' => ['name' => 'Superadmin','email' => 'superadmin@gmail.com', 'admin' => '4', 'password' => '$2y$10$k6V8ZV/BKgjsuSkeSkwB3.o7N4rrGuRBHftAgXzGFedSbOG01PYs.', 'phone' => '00-00-00', 'address' => 'Superadmin Address', 'status' => 1]
        ];

        App\User::insert($data['users']);
        App\Region::insert($data['regions']);
        App\SubRegion::insert($data['sub_regions']);

    }
}















































