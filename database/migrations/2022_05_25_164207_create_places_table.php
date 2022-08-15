<?php

use App\Models\Admin;
use App\Models\City;
use App\Models\Type;
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
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('about');
            $table->string('address')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->double('ratting')->default(0);
            $table->integer('views')->default(0);
            $table->string('web_site')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->time('open_at')->nullable();
            $table->time('close_at')->nullable();

            ######## Foreign keys  ########

            $table->foreignIdFor(City::class)->constrained('cities')->cascadeOnDelete();
            $table->foreignIdFor(Type::class)->constrained('types')->cascadeOnDelete();
            $table->foreignIdFor(Admin::class)->constrained('admins')->cascadeOnDelete();

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
        Schema::dropIfExists('places');
    }
};
