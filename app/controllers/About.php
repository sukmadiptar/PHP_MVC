<?php 

class About extends Controller{
	//ini metod "index" di bawah berlaku sbg url 
	//contoh mvc/public/about/index <--
	public function index($nama = 'Tuyul', $tugas = 'Nyolong', $umur = 100){
		$data['nama']  = $nama;
		$data['tugas'] = $tugas;
		$data['umur']  = $umur;

		$data['judul'] = 'About Me';
		
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}
	public function page(){
		
		$data['judul'] = 'Pages';
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	
	
	}

} 