<?php

// application/controllers/cuenta.php
class Cuenta_Controller extends Base_Controller
{
	public function action_index()
	{
		echo "Esta es la página del perfil.";
	}

	public function action_login()
	{
		echo "Este es el formulario de login.";
	}

	public function action_logout()
	{
		echo "Esta es la acción de cierre de sesión.";
	}
}