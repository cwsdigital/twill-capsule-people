<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTables extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->integer('position')->unsigned()->nullable();
            $table->text('contact_methods')->nullable();
        });

        Schema::create('person_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'person');

            $table->string('name', 200)->nullable();
            $table->string('role')->nullable();
            $table->longText('bio')->nullable();
        });

        Schema::create('person_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'person');
        });

        Schema::create('person_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'person');
        });
    }

    public function down()
    {
        Schema::dropIfExists('person_revisions');
        Schema::dropIfExists('person_translations');
        Schema::dropIfExists('person_slugs');
        Schema::dropIfExists('people');
    }
}
