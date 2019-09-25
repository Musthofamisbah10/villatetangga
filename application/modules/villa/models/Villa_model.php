<?php 

	class Villa_model extends CI_Model{

		private $_table = 'vila';

		public $id_villa;
		public $nama_villa;
		public $alamat;
		public $email;
		public $handphone;
		public $tetanga;

		public function _rules()
		{
			return [
				[
					'field'	=>	'nama_villa',
					'label'	=> 	'Nama Villa',
					'rules'	=>	'required'
				],
				[
					'field'	=>	'alamat',
					'label'	=> 	'Alamat',
					'rules'	=>	'required'
				],
				[
					'field'	=>	'email',
					'label'	=> 	'email',
					'rules'	=>	'required'
				],
				[
					'field'	=>	'handphone',
					'label'	=> 	'Hanphone',
					'rules'	=>	'required'
				],
				[
					'field'	=>	'tetanga',
					'label'	=> 	'Tetanga',
					'rules'	=>	'required'
				],
			];
		}

		public function getAllVilla()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getVilaById($id)
		{
			return $this->db->get_where($this->_table, ['id_villa' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->nama_villa = $post['nama_villa'];
			$this->alamat = $post['alamat'];
			$this->email = $post['email'];
			$this->handphone = $post['handphone'];
			$this->tetanga = $post['tetanga'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_villa = $post['id_villa'];
			$this->nama_villa = $post['nama_villa'];
			$this->alamat = $post['alamat'];
			$this->email = $post['email'];
			$this->handphone = $post['handphone'];
			$this->tetanga = $post['tetanga'];

			$this->db->update($this->_table, $this, array('id_villa' => $this->id_villa));
		}

		public function delete($id=null)
		{
			return $this->db->delete($this->_table, array('id_villa' => $id));
		}
	}
 ?>