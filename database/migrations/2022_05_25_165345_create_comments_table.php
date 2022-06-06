<?php

use App\Models\Experience;
use App\Models\Place;
use App\Models\Plan;
use App\Models\User;
use App\Models\VisitType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('tilte');
            $table->string('description')->nullable();
            $table->date('full_date')->nullable();


            ######## Foreign keys  ########

            $table->foreignIdFor(Place::class)->constrained('places')->cascadeOnDelete();
            $table->foreignIdFor(Plan::class)->constrained('plans')->cascadeOnDelete();
            $table->foreignIdFor(VisitType::class)->constrained('visit_types')->cascadeOnDelete();
            $table->foreignIdFor(Experience::class)->constrained('experiences')->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();

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
        Schema::dropIfExists('comments');
    }
};
