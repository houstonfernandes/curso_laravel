<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        factory('CodeCommerce\User')->create([
                'name' => "Houston",
                'email' => 'houstonfernandes@gmail.com',
                'password' => Hash::make('123456'),
                'is_admin'=> true,
                'endereco' =>'R. Canadá',
                'numero' => 73,
                'bairro' => 'Jardim Naltilus',
                'cidade' => 'Cabo Frio',
                'uf' => 'RJ',
                'cep'=>'28909-170',
            ]
        );//usuario  padrao

        factory('CodeCommerce\User', 9)->create();
    }
}