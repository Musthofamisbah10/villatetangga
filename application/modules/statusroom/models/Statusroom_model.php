<?php 
	
	class Statusroom_model extends CI_Model{

		private $_table = "status_room";

		public $status_id;
		public $kode_status;
		public $nama_status;

		public function _rules()
		{
			return [
				[
					'field' => 'kode_status',
					'label'	=> 'kode status room',
					'rules' => 'required'
				],
				[
					'field' => 'nama_status',
					'label'	=> 'status room',
					'rules' => 'required'
				]
			];
		}

		public function getAllStatusRoom()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getStatusRoom($limit, $start)
		{
			return $this->db->get($this->_table, $limit, $start)->result();
		}

		public function countAllStatusRoom()
		{
			return $this->db->get($this->_table)->num_rows();
		}

		public function getStatusRoomById($id)
		{
			return $this->db->get_where($this->_table, ['status_id' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->kode_status = $post['kode_status'];
			$this->nama_status = $post['nama_status'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->status_id = $post['status_id'];
			$this->kode_status = $post['kode_status'];
			$this->nama_status = $post['nama_status'];

			$this->db->update($this->_table, $this, array('status_id' => $this->status_id));
		}

		public function delete($id)
		{
			return $this->db->delete($this->_table, array('status_id' => $id));
		} 
	}
 ?>