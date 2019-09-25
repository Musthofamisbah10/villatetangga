<?php 

	class testimoni_model extends CI_Model{

		private $_table = "testimoni";

		public $id_testi;
		public $id_guest;
		public $testi;

		public function _rules()
		{
			return[
				[
					'field'	=> 'id_guest',
					'label'	=> 'nama guest',
					'rules'	=> 'required'
				],
				[
					'field' => 'testi',
					'label' => 'testimoni',
					'rules' => 'required'
				]
			];
		}


		public function getAllTestimoni()
		{
			$this->db->select('
				testimoni.id_testi, 
				testimoni.id_guest,
				testimoni.testi,

				guest.nama_guest');
			$this->db->from('testimoni');
			$this->db->join('guest', 'testimoni.id_guest = guest.id_guest');
			return $this->db->get()->result();
		}

		public function getTestimoniById($id)
		{
			$this->db->get_where($this->_table, ['id_testi' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->id_guest = $post['id_guest'];
			$this->testi = $post['testi'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_testi = $post['id_testi'];
			$this->id_guest = $post['id_guest'];
			$this->testi = $post['testi'];

			$this->db->update($this->_table, $this, ['id_testi' => $this->id_testi]);
		}

		public function delete($id)
		{
			return $this->db->delete($this->_table, ['id_testi' => $id]);
		}

	}
 ?>