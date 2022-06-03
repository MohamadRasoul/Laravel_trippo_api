<?php

use App\Models\City;
use App\Models\Type;
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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('about')->nullable();
            $table->string('ratting')->nullable();
            $table->string('views')->default(0)->nullable();
            $table->string('images')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longtude')->nullable();
 



           
            ######## Foreign keys  ########

            $table->foreignIdFor(City::class)->constrained('cities')->cascadeOnDelete();
            $table->foreignIdFor(Type::class)->constrained('types')->cascadeOnDelete();
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
        Schema::dropIfExists('experiences');
    }
};
