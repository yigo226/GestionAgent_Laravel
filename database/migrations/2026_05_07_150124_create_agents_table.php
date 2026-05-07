
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
        Schema::create('agents', function (Blueprint $table) {

            $table->id();

            $table->string('matricule')->unique();

            $table->string('nom');
            $table->string('prenom');

            $table->string('photo')->nullable();

            $table->string('telephone', 20);

            $table->string('email')->unique();

            $table->date('date_naissance')->nullable();

            $table->enum('sexe', ['M', 'F'])->nullable();

            $table->date('date_recrutement')->nullable();

            $table->enum('statut', ['actif', 'inactif'])
                ->default('actif');

            $table->text('adresse')->nullable();

            /* Relations */

            $table->foreignId('service_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('poste_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
