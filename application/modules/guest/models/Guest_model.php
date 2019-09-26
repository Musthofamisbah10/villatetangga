<?php 
	class Guest_model extends CI_Model{

		private $_table = 'guest';

		public $id_guest;
		public $nama_guest;
		public $tlp_guest;
		public $kota;
		public $negara;

		public function _rules()
		{
			return [
				[
					'field' => 'nama_guest',
					'label'	=> 'Nama guest',
					'rules'	=> 'required' 
				],
				[
					'field' => 'tlp_guest',
					'label'	=> 'phone number',
					'rules'	=> 'required'
				],
				[
					'field' => 'kota',
					'label'	=> 'kota',
					'rules'	=> 'required'
				],
				[
					'field' => 'negara',
					'label'	=> 'negara',
					'rules'	=> 'required'
				],
			];
		}

		public function getGuest()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getAllGuest($limit, $start)
		{
			return $this->db->get($this->_table, $limit, $start)->result();
		}

		public function countAllGuest()
		{
			return $this->db->get($this->_table)->num_rows();
		}

		public function getGuestById($id)
		{
			$this->db->get_where($this->_table, ['id_guest' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->nama_guest = $post['nama_guest'];
			$this->tlp_guest = $post['tlp_guest'];
			$this->kota = $post['kota'];
			$this->negara = $post['negara'];
			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_guest = $post['id_guest'];
			$this->nama_guest = $post['nama_guest'];
			$this->tlp_guest = $post['tlp_guest'];
			$this->kota = $post['kota'];
			$this->negara = $post['negara'];

			$this->db->update($this->_table, $this, array('id_guest' => $post['id_guest']));
		}

		public function delete($id)
		{
			return $this->db->delete($this->_table, ['id_guest' => $id]);
		}
	}
 ?>