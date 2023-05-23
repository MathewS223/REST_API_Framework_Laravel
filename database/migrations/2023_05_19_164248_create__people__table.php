<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class CreatePeopleTable extends Migration
{

    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('street');
            $table->string('city');
            $table->string('country');
            $table->timestamps();
        });

        $faker = Faker::create();
        $people = [];

        for ($i = 0; $i < 200; $i++) {
            $people[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('people')->insert($people);
    }
}