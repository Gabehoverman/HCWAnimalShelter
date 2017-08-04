<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteCascadeToFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animal_photos', function (Blueprint $table) {
            $table->dropForeign("animal_photos_animal_id_foreign");
            $table->dropForeign("animal_photos_photo_id_foreign");

            $table->foreign("animal_id")->references("id")->on("animals")->onDelete('cascade');
            $table->foreign("photo_id")->references("id")->on("photos")->onDelete('cascade');
        });

        Schema::table('project_photos', function (Blueprint $table) {
            $table->dropForeign("project_photos_project_id_foreign");
            $table->dropForeign("project_photos_photo_id_foreign");

            $table->foreign("project_id")->references("id")->on("projects")->onDelete('cascade');
            $table->foreign("photo_id")->references("id")->on("photos")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal_photos', function (Blueprint $table) {
            $table->dropForeign("animal_photos_animal_id_foreign");
            $table->dropForeign("animal_photos_photo_id_foreign");

            $table->foreign("animal_id")->references("id")->on("animals");
            $table->foreign("photo_id")->references("id")->on("photos");
        });

        Schema::table('project_photos', function (Blueprint $table) {
            $table->dropForeign("project_photos_project_id_foreign");
            $table->dropForeign("project_photos_photo_id_foreign");

            $table->foreign("project_id")->references("id")->on("projects");
            $table->foreign("photo_id")->references("id")->on("photos");
        });
    }
}
