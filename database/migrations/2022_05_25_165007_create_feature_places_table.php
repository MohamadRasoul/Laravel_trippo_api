<?php

use App\Models\Feature;
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
        Schema::create('feature_places', function (Blueprint $table) {
            $table->id();

            $table->string('description')->nullable();




           
            ######## Foreign keys  ########

            $table->foreignIdFor(Place::class)->constrained('places')->cascadeOnDelete();
            $table->foreignIdFor(Feature::class)->constrained('features')->cascadeOnDelete();

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
        Schema::dropIfExists('feature_places');
    }
};
