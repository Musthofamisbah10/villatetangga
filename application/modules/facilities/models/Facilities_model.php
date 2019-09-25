<?php 

	class Facilities_model extends CI_Model{

		private $_table = 'facilities';
		public $id_facilities;
		public $name_facilities;
		public $icon_facilities;

		public function _rules()
		{
			return [
				[
					'field'	=> 'name_facilities',
					'label'	=> 'name facilities',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'icon_facilities',
					'label'	=> 'icon facilities',
					'rules'	=> 'required'
				]
			];
		}

		public function getFacilities()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getAllFacilities($limit, $start)
		{
			return $this->db->get($this->_table, $limit, $start)->result();
		}

		public function countAllFacilites()
		{
			return $this->db->get($this->_table)->num_rows();
		}

		public function getFacilitiesById($id)
		{
			return $this->db->get_where($this->_table, ['id_facilities'	=> $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->name_facilities = $post['name_facilities'];
			$this->icon_facilities = $post['icon_facilities'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_facilities = $post['id_facilities'];
			$this->name_facilities = $post['name_facilities'];
			$this->icon_facilities = $post['icon_facilities'];

			$this->db->update($this->_table, $this, array('id_facilities' => $this->id_facilities));
		}

		public function delete($id)
		{
			return $this->db->delete($this->_table, array('id_facilities' => $id));
		}
	}
 ?>