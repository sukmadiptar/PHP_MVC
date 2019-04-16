<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Karyawan_model {
	private $table = 'karyawan';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllKaryawan(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getKaryawanById($id){
		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id =:id'); 
		//untuk nyimpen id by binding
		$this->db->bind('id', $id);
		return $this->db->resultSetOne();
	}

	public function addDataKaryawan($data){
		$query = "INSERT INTO karyawan
					VALUES
				('', :nama, :nik, :email, :jobdesk)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nik', $data['nik']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jobdesk', $data['jobdesk']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function delDataKaryawan($id){
		$query = "DELETE FROM karyawan WHERE id =:id";

		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount;

	}

	public function editDataKaryawan($data){
		$query = "UPDATE karyawan SET
					nama = :nama,
					nik = :nik,
					email = :email,
					jobdesk = :jobdesk
				WHERE id = :id;
				";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nik', $data['nik']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jobdesk', $data['jobdesk']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function searchKaryawan(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM karyawan WHERE
		nama LIKE :keyword";

		$this->db->query($query);
		$this->db->bind ('keyword', "%$keyword%");
		return $this->db->resultSet();
	}
}