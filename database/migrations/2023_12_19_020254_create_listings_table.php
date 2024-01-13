<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->integer('ptype_id');
            $table->string('amenities_id');
            $table->string('property_name');
            $table->string('property_slug');
            $table->string('property_status');
            $table->string('lowest_price')->nullable();
            $table->string('max_price')->nullable();
            $table->string('property_thumbnail');
            $table->string('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('garage')->nullable();
            $table->string('garage_size')->nullable();
            $table->string('property_size')->nullable();
            $table->string('property_video')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('is_featured')->nullable();
            $table->string('is_hot')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('status')->default(0);
            $table->string('property_code');
            $table->timestamps();



//            $table->foreignId('property_status')->nullable()->constrained('statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
