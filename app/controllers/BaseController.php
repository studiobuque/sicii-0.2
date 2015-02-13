<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function newprofile()
	{
		$profiles = Profile::all();
		
		/*
		$delete_profiles = Profile::where('address', '=', '')->get();
		if ($delete_profiles->first()) {
			echo "<h2>Borrar </h2>";
			foreach ($delete_profiles as $delete_profile) {
				$del_prf_id = $delete_profile->id;
				echo "<li>$delete_profile->id</li>";
				if ($delete_profile->delete()) {
					echo "eliminado $del_prf_id";
				}
			}
		}
		*/
		foreach ($profiles as $profile_delete) {
			
			$profile_array = $profile_delete->toArray();
			echo "<h2> $profile_delete->id $profile_delete->first_name </h2>";
			
			foreach ($profile_array as $key => $value) {
				$nombre = $profile_delete->first_name == $value;
				$valor = $profile_delete->first_name != $key;
				$nombre = (string)$nombre;
				echo "nombre $nombre";
				if ($profile_delete->first_name == $value || $profile_delete->first_name != $key) {
					echo "<li>$profile_delete->first_name : $value</li>";
				}
			}
			
			
		/*
			
			echo "<li> ";
			echo ($profile_delete);
			echo "</li>";
				$del_prf_id = $profile_delete->id;
				echo "<li>Vacio</li>";
				if ($profile_delete->delete()) {
					echo "eliminado $del_prf_id";
				}
		*/
		}
		/*
		foreach ($profiles as $profile) {
			$profile_array = $profile->toArray();
			$pfl_name = $profile_array['first_name'];
			$pfl_user_id = $profile_array['user_id'];
			echo "<h2>$pfl_name  <small>$pfl_user_id</small></h2>";
			
			foreach ($profile_array as $key => $value) {
				
				if ( $key != 'id' && $key != 'created_at' && $key != 'updated_at' ) {
					
					echo "<li>buscar user_id:$pfl_user_id y first_name:$key <ul>";
					
					$saveprofile = Profile::where('user_id', '=', $pfl_user_id)->where('first_name', '=', $key); // ->firstOrFail()
					if ($saveprofile->first()) {
						echo "<li>Listo " . $saveprofile->first()->user_id . " [" . $saveprofile->first()->first_name . ", "  . $saveprofile->first()->description . "]</li>";
					} else {
						echo "<li>Crear [user_id:$pfl_user_id, name:$key , description:$value] </li>";
						// Guardamos los datos del perfil
						$newprofile = Profile::create([
							'user_id' 	=> $pfl_user_id,
							'first_name' 	=> $key,
							'address' 	=> $value,
						]);
						if ($newprofile) {
							echo "Guadado: $newprofile->id";
						}
					}
					// sleep(0.5);
					echo "</ul></li>";
				}
			}
				
			
			
		}
		*/
		// dd($profile->first());
	}

}
