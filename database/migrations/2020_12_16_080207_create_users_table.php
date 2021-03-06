<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("users", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->string('email',128);
						$table->string('password',128);
						$table->string('user_name',128)->nullable();
						$table->string('nickname',128)->nullable();
						$table->string('school_category',50)->nullable();
						$table->integer('gender')->nullable();
						$table->string('subject',50)->nullable();
						$table->integer('age')->nullable();
						$table->string('introduce',255)->nullable();
                        $table->string('image_name',128)->nullable();
                        $table->string('grade',128)->nullable();
                        $table->timestamps();;

                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("users");
            }
        }
