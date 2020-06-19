<?php
use Illuminate\Database\Seeder;
use App\Articulo;
use App\Ciudad;
use App\Cliente;
use App\Direccionenvio;
use App\Locacion;
use App\Pedido;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Ciudad::truncate();
        Cliente::truncate();
        Articulo::truncate();
        Direccionenvio::truncate();
        Locacion::truncate();
        Pedido::truncate();
        factory(Ciudad::class,10)->create();//200
        factory(Cliente::class,10)->create();//200
        factory(Articulo::class,10)->create();//200
        factory(Direccionenvio::class,10)->create();
        factory(Locacion::class,100)->create();
        factory(Pedido::class,10)->create()->each(//30
            function ($pedido){
                $articulo = Articulo::all()->random(mt_rand(5,9))->pluck('id');//5,20
                $pedido->rela_Articulo()->attach($articulo);
            }
        );

    }
}