<?php
interface inter_user {
	public function signIn($user, $password);
	public function login($user, $password);
	public function valorateNew($user, $valoration);
}
?>