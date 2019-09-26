<?php 

	class Galery_model extends CI_Model{
		
		private $_table = 'galery';

		public $id_photo;
		public $nama_photo;
		public $diskripsi;
		public $photo;

		public function _rules()
		{
			return [
				[
					'field'	=> 'diskripsi',
					'label'	=> 'diskripsi',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'nama_photo',
					'label'	=> 'nama photo',
					'rules'	=> 'required'
				],
			];
		}

		public function getGalery()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getAllGalery($limit, $start)
		{
			return $this->db->get($this->_table, $limit, $start)->result();
		}

		public function countAllGalery()
		{
			return $this->db->get($this->_table)->num_rows();
		}

		public function getGaleryById($id)
		{
			$this->db->get_where($this->_table, ['id_photo' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->nama_photo = $post['nama_photo'];
			$this->photo = $this->_uploadImage();
			$this->diskripsi = $post['diskripsi'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_photo = $post['id_photo'];
			$this->nama_photo = $post['nama_photo'];

				if (!empty($_FILES['photo']['name'])) {
					$this->photo = $this->_uploadImage();
				}else{
					$this->photo = $post['old_image'];
				}

			$this->diskripsi = $post['diskripsi'];
			$this->db->update($this->_table, $this, array('id_photo' => $this->id_photo));
		}

		public function delete($id)
		{	
			$this->_deleteImage($id);
			return $this->db->delete($this->_table, ['id_photo' => $id]);
		}

		private function _uploadImage()
		{
			$config['upload_path']		= './uploads/galery/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "room_".time();
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('photo')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		private function _deleteImage($id)
		{
			$galery = $this->getGaleryById($id);
			if ($galery->photo != "default.jpg") {
				$filename = explode(".", $galery->photo)[0];
				return array_map('unlink', glob(FCPATH."uploads/galery/$filename.*"));
			}
		}
	}
 ?>