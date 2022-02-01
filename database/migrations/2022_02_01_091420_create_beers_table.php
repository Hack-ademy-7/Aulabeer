<?php

use App\Models\Beer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("type");
            $table->float("price",5,2);
            $table->timestamps();
        });

        $beers = [
            [
                'name'=>'Peroni', 'type'=>'blonde', 'price'=>1.5
            ],
            [
                'name'=>'Guiness', 'type'=>'blonde', 'price'=>5.0
            ],
            [
                'name'=>'Estrella Galicia', 'type'=>'blonde', 'price'=>2.5
            ],
            [
                'name'=>'Leffe', 'type'=>'red', 'price'=>3.5
            ],
            [
                'name'=>'Alhambra', 'type'=>'red', 'price'=>4.5
            ]
            ];

            foreach($beers as $beer){
                Beer::create($beer);
            }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
