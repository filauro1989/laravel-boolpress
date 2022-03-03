<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            Schema::table('posts', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->after('id')->nullable();
                    // CHIAVE ESTERNA
                $table->foreign('category_id')
                    // DELLA COLONNA ID
                    ->references('id')
                    // DELLA TABELLA CATEGORIES
                    ->on('categories')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
