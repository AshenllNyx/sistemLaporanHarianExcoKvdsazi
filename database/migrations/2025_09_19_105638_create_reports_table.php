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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->foreignId('user_id')->constrained('users', 'no_ic')->onDelete('cascade');
            $table->date('date_submitted');
            $tanle->date('date_reported');
            $table->date('date_approved')->nullable();
            $tabel->String('status')->default('pending');
            $table->text('resubmission_reason')->nullable();
            $table->timestamps();
        });

        Schema::create('sickness_report', function (Blueprint $table) {
            $table->id('id_sickness');
            $tabele->String('student_name');
            $table->String('class');
            $table->foreignId('report_id')->constrained('reports', 'id_laporan')->onDelete('cascade');
            $table->string('type_of_sickness');
            $table->text('action_taken');
            $table->string('medical_certificate')->nullable();
            $table->timestamps();
        });

        Schema::create('diciplane_reorts', function (Blueprint $table) {
            $table->id('id_diciplane');
            $table->string('student_name');
            $table->string('class');
            $table->foreignId('report_id')->constrained('reports', 'id_laporan')->onDelete('cascade');
            $table->string('type_of_discipline_issue');
            $table->text('action_taken');   
            $table->timestamps();
        });

        Schema::create('dorm_report', function (Blueprint $table) {
            $table->id('id_dorm');
            $table->string('dormitory_name');
            $table->string('student_name_absent');
            $table->string('class');
            $table->string('cleanliness_category');
            $table->foreignId('report_id')->constrained('reports', 'id_laporan')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('dorm_list', function (Blueprint $table) {
            $table->id('no_ic');
            $table->string('student_name');
            $table->string('class');
            $table->string('dormitory_name');
            $tabel->integer('telephone_number');
            $table->timestamps();
        });

        Schema::create('mass_hall_report', function (Blueprint $table) {
            $table->id('id_mass_hall');
            $tabel->String('menu_by_weeks');
            $table->String('quality_of_food');
            $table->String('student_discipline');
            $table->foreignId('report_id')->constrained('reports', 'id_laporan')->onDelete('cascade');  
            $table->timestamps();
        });

        Schema::create('damage_report', function (Blueprint $table) {
            $table->id('id_damage');
            $table->string('location_of_damage');
            $table->string('type_of_damage');
            $table->text('action_taken');
            $table->foreignId('report_id')->constrained('reports', 'id_laporan')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('sickness_report');
    }
};
