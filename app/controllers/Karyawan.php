<?php 

class Karyawan extends Controller {
	public function index(){
		$data['judul'] = 'Daftar Karyawan';
		$data['kar'] = $this->model('Karyawan_model')->getAllKaryawan();
		$this->view('templates/header', $data);
		$this->view('karyawan/index', $data);
		$this->view('templates/footer');
	}
	public function detail($id){
		$data['judul'] = 'Detail Karyawan';
		$data['kar'] = $this->model('Karyawan_model')->getKaryawanById($id);
		$this->view('templates/header', $data);
		$this->view('karyawan/detail', $data);
		$this->view('templates/footer');
	}

	public function add(){
		if ( $this->model('Karyawan_model')->addDataKaryawan($_POST) > 0) {
			# code...
			
			Flasher::setFlash('Successfully', 'added', 'success');
			
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		} else {
			Flasher::setFlash('Failed', 'to added', 'danger');
			
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		}
	}

	public function delete($id){
		if ( $this->model('Karyawan_model')->delDataKaryawan($id) > 0) {
			# code...
			Flasher::setFlash('Failed', 'to deleted', 'danger');
			
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		} else {
			
			Flasher::setFlash('Successfully', 'deleted', 'success');
			
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		}
	}

	public function getedit(){
		echo json_encode($this->model('Karyawan_model')->getKaryawanById($_POST['id']));
	}

	public function edit(){
		if ( $this->model('Karyawan_model')->editDataKaryawan($_POST) > 0) {
			# code...
			
			Flasher::setFlash('Successfully', 'to edited', 'success');
			
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		} else {
			Flasher::setFlash('Failed', 'to edited', 'danger');
			
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		}
	}

	public function search(){
		$data['judul'] = 'Daftar Karyawan';
		$data['kar'] = $this->model('Karyawan_model')->searchKaryawan();
		$this->view('templates/header', $data);
		$this->view('karyawan/index', $data);
		$this->view('templates/footer');
	}
}   