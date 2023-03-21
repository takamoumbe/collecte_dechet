<?php  

public function save_lost() {
	$data = "
		Swal.fire({
			title: 'Warning !',
			html: '`Désolé des erreurs improbalbles sont survenues durant l\'enregistrement. Veillez recommencé !',
			allowOutsideClick: false,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Je comprend.',
		})
	";
	return $data;
}

?>