<?php

use App\Models\Experience;
use App\Models\Place;
use App\Models\Plan;
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
        Schema::create('plan_contents', function (Blueprint $table) {
            $table->id();

            $table->date('full_date');
            $table->string('comment')->nullable();

            ######## Foreign keys  ########

            $table->foreignIdFor(Plan::class)->constrained('plans')->cascadeOnDelete();
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
        Schema::dropIfExists('plan_contents');
    }
};
