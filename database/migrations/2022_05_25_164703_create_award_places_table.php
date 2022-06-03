<?php

use App\Models\Option;
use App\Models\Place;
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
        Schema::create('award_places', function (Blueprint $table) {
            $table->id();

            // $table->string('text');




           
            ######## Foreign keys  ########

            $table->foreignIdFor(Place::class)->constrained('places')->cascadeOnDelete();
            $table->foreignIdFor(Option::class)->constrained('options')->cascadeOnDelete();

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
        Schema::dropIfExists('award_places');
    }
};
