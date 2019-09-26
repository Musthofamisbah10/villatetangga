<?php 

	class Food_model extends CI_Model{
		
		private $_table = 'food';

		public $id_food;
		public $name_food;
		public $diskripsi;
		public $food;

		public function _rules()
		{
			return [
				[
					'field'	=> 'diskripsi',
					'label'	=> 'diskripsi',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'name_food',
					'label'	=> 'name food',
					'rules'	=> 'required'
				],
			];
		}

		public function getFood()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getAllFood($limit, $start)
		{
			return $this->db->get($this->_table, $limit, $start)->result();
		}

		public function countAllFood()
		{
			return $this->db->get($this->_table)->num_rows();
		}

		public function getFoodById($id)
		{
			$this->db->get_where($this->_table, ['id_food' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->name_food = $post['name_food'];
			$this->food = $this->_uploadImage();
			$this->diskripsi = $post['diskripsi'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_food = $post['id_food'];
			$this->name_food = $post['name_food'];

				if (!empty($_FILES['food']['name'])) {
					$this->food = $this->_uploadImage();
				}else{
					$this->food = $post['old_image'];
				}

			$this->diskripsi = $post['diskripsi'];
			$this->db->update($this->_table, $this, array('id_food' => $this->id_food));
		}

		public function delete($id)
		{	
			$this->_deleteImage($id);
			return $this->db->delete($this->_table, ['id_food' => $id]);
		}

		private function _uploadImage()
		{
			$config['upload_path']		= './uploads/food/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "food_".time();
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('food')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		private function _deleteImage($id)
		{
			$food = $this->getfoodById($id);
			if ($food->food != "default.jpg") {
				$filename = explode(".", $food->food)[0];
				return array_map('unlink', glob(FCPATH."uploads/food/$filename.*"));
			}
		}
	}
 ?>