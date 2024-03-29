<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Area;
use App\Models\Franchise;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Area::class)->index();
            $table->foreignIdFor(Franchise::class)->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('hours');
            $table->string('time_of_day');
            $table->string('location');
            $table->string('wage');
            $table->string('contact_number');
            $table->string('contact_email');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
