<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->call('ProductTableSeeder');
	}

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(
            array(
                array(
                    'email'=>'test@test.com',
                    'username'=>'test',
                    'password'=>Hash::make('test'),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ),
                array(
                    'email'=>'max.power@fakemail.com',
                    'username'=>'max',
                    'password'=>Hash::make('power'),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                )
            )
        );
    }
}

class ProductTableSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->insert(
            array(
                array(
                    'name'=>'Cabrinha Subwoofer 2013',
                    'brand'=>'Cabrinha',
                    'price'=>'799,00',
                    'image'=>'board_subwoofer.jpg',
                    'quantity'=>10,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ),
                array(
                    'name'=>'Cabrinha Spectrum 2013',
                    'brand'=>'Cabrinha',
                    'price'=>'599,00',
                    'image'=>'cabrinha_spectrum.jpg',
                    'quantity'=>2,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ),
                array(
                    'name'=>'Cabrinha XO Siren 2013',
                    'brand'=>'Cabrinha',
                    'price'=>'639,00',
                    'image'=>'cabrinha_xo_siren.jpg',
                    'quantity'=>0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ),
                array(
                    'name'=>'Naish Monarch 2013',
                    'brand'=>'Naish',
                    'price'=>'760,00',
                    'image'=>'Naish_Monarch_2013.jpg',
                    'quantity'=>2,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                )
            )
        );
    }
}