<?php

use App\Models\Client;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->dateTime('rentStart');
            $table->dateTime('rentEnd');
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Room::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
