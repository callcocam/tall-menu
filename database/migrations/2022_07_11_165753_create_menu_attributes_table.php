<?php

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
        Schema::create('menu_attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();   
            $table->string('route',255)->nullable();       
            $table->string('path',255)->nullable();       
            $table->string('icon',255)->nullable();       
            $table->integer('views')->nullable();
            $table->integer('order')->nullable();
            $table->string('template',255)->default('sidebar-items')->nullable();       
            $table->text('content')->nullable();       
            $table->uuidMorphs('menu_attributeable','menu_attrs_menu_attributeable_type_menu_attributeable_id_index');
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
        Schema::dropIfExists('menu_attributes');
    }
};
