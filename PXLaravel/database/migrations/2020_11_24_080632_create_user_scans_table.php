<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_scans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('prisoner_id')->constrained('prisoners');
            $table->foreignId('cell_id')->constrained('cells');
            $table->text('reason')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('is_active');
            $table->boolean("is_scan");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('user_scans', 'cell_id'))
        {
            Schema::table('user_scans', function (Blueprint $table) {
                $table->dropForeign(['cell_id']);
            });
        }
        if (Schema::hasColumn('user_scans', 'prisoner_id'))
        {
            Schema::table('user_scans', function (Blueprint $table) {
                $table->dropForeign(['prisoner_id']);
            });
        }
        if (Schema::hasColumn('user_scans', 'user_id'))
        {
            Schema::table('user_scans', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }
        Schema::dropIfExists('user_scans');
    }
}
