<?php

class Admin_Model extends CI_Model {

	private $_table = 'admin';
	public $id_admin;
	public $username;
	public $password;
	public $nama_admin;

	public function _rules()
	{
		return [
			[
				'field' => 'username',
				'label'	=> 'Username',
				'rules'	=> 'required'
			],
			[
				'field' => 'password',
				'label'	=> 'Password',
				'rules'	=> 'required'
			],
			[
				'field' => 'nama_admin',
				'label'	=> 'Nama Admin',
				'rules'	=> 'required'
			]
		];	
	}
	
	public function getAllAdmin($limit, $start)
	{
		return $this->db->get($this->_table, $limit, $start)->result();
		// SELECT * FORM admin
		// akan mengembalikan array yang berisi objek dari row
	}

	public function countAllAdmin()
	{
		return $this->db->get($this->_table)->num_rows();
	}

	public function getAdminById($id)
	{
		return $this->db->get_where($this->_table, ['id_admin' => $id])->row();
		// SELECT FORM admin WHERE id_admin = $id
		// method ini akan mengembalikan objek
	}

	public function save()
	{
		$post = $this->input->post(); //ambil data dari form
		$this->username = $post['username']; //isi field username
		$this->password = sha1($post['password']); //isi field password dengan sha1
		$this->nama_admin = $post['nama_admin'];

		// var_dump($post);
		// masukan ke table admin
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post(); //ambil data dari form
		$this->id_admin = $post['id_admin']; //membuat id Uniq
		$this->username = $post['username']; //isi field username
		$this->password = sha1($post['password']); //isi field password dengan sha1
		$this->nama_admin = $post['nama_admin'];

		// masukan ke table admin
		$this->db->update($this->_table, $this, array('id_admin' => $post['id_admin']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('id_admin' => $id));
	}
}
