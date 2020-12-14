<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonerCellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoner_cells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prisoner_id')->constrained('prisoners');
            $table->foreignId('cell_id')->constrained('cells');
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
        if (Schema::hasColumn('prisoner_cells', 'prisoner_id'))
        {
            Schema::table('prisoner_cells', function (Blueprint $table) {
                $table->dropForeign(['prisoner_id']);
            });
        }
        if (Schema::hasColumn('prisoner_cells', 'cell_id'))
        {
            Schema::table('prisoner_cells', function (Blueprint $table) {
                $table->dropForeign(['cell_id']);
            });
        }
        Schema::dropIfExists('prisoner_cells');
    }
}
