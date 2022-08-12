<?php

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_places', function (Blueprint $table) {
            $table->id();
            ######## Foreign keys  ########

            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();
            $table->foreignIdFor(Place::class)->constrained('places')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourite_places');
    }
};
