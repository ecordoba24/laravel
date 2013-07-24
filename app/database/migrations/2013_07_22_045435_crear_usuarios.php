<?php

use Illuminate\Database\Migrations\Migration;

class CrearUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		/*
		Schema::create('usuarios', function($tabla) 
		{
			// id auto incremental (Clave Primaria)
			$tabla->increments('id');
			
			// varchar 32
			$tabla->string('usuario', 32);
			$tabla->string('correo', 320);
			$tabla->string('password', 64);
			
			// int
			$tabla->integer('rol');
			
			// boolean
			$tabla->boolean('activo');
			
			// created_at | updated_at DATETIME
			$tabla->timestamps();
		});
		*/

		Schema::create('users', function($table) {
		$table->increments('id');
		$table->string('username', 128);
		$table->string('password', 64);
		$table->timestamps();
		});

		DB::table('users')->insert(
            array(
                'username' => 'administrador',
                'password' => md5('1234'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            )
        );

        //'password' => Hash::make('1234')
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		//Schema::drop('usuarios');
		Schema::drop('users');
	}

}