<?php 

	class Rooms_model extends CI_Model{
		
		private $_table = 'room';
		public $id_room;
		public $status_id;
		public $nama_room;
		public $photo_room;
		public $kamar_mandi;
		public $halaman;
		public $fasilitas_room;
		public $diskrip_room;
		public $harga;

		public function _rules()
		{
			return [
				[
					'field'	=> 'nama_room',
					'label'	=> 'Nama Room',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'diskrip_room',
					'label'	=> 'Diskripsi Room',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'harga',
					'label'	=> 'harga',
					'rules'	=> 'required'
				]
			];
		}

		public function getAllRoom()
		{
			$this->db->select('
				room.id_room,
				room.status_id,
				room.nama_room,
				room.photo_room,
				room.kamar_mandi,
				room.halaman,
				room.fasilitas_room,
				room.diskrip_room,
				room.harga,	

				status_room.nama_status'); //select isi tabel
			$this->db->from('room'); //tabel 1
			$this->db->join('status_room', 'room.status_id = status_room.status_id');
			return $this->db->get()->result();
		}

		public function getRoomById($id)
		{
			return $this->db->get_where('room', ['id_room' => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->status_id = $post['status_id'];
			$this->nama_room = $post['nama_room'];
			$this->photo_room = $this->_uploadImageRoom();
			$this->kamar_mandi = $this->_uploadImageBadroom();
			$this->halaman = $this->_uploadImageFullroom();
			$this->fasilitas_room = $this->_uploadImageFacilitiesroom();
			$this->diskrip_room = $post['diskrip_room'];
			$this->harga = $post['harga'];

			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_room = $post['id_room'];
			$this->status_id = $post['status_id'];
			$this->nama_room = $post['nama_room'];

				// room
				if (!empty($_FILES['photo_room']['name'])) {
					$this->photo_room = $this->_uploadImage();
				}else{
					$this->photo_room = $post['old_image'];
				}

				// badroom
				if (!empty($_FILES['badroom']['name'])) {
					$this->kamar_mandi = $this->_uploadImage();
				}else{
					$this->kamar_mandi = $post['old_image'];
				}

				// fullroom
				if (!empty($_FILES['fullroom']['name'])) {
					$this->halaman = $this->_uploadImage();
				}else{
					$this->halaman = $post['old_image'];
				}

				// facilitiesroom
				if (!empty($_FILES['facilitiesroom']['name'])) {
					$this->fasilitas_room = $this->_uploadImage();
				}else{
					$this->fasilitas_room = $post['old_image'];
				}

			$this->diskrip_room = $post['diskrip_room'];
			$this->harga = $post['harga'];

			$this->db->update($this->_table, $this, array('id_room' => $post['id_room']));
		}

		public function delete($id)
		{	
			$this->_deleteImageRoom($id);
			$this->_deleteImageBadroom($id);
			$this->_deleteImageFullroom($id);
			$this->_deleteImageFacilitiesroom($id);
			return $this->db->delete('room', ['id_room' => $id]);
		}

		// method room
		private function _uploadImageRoom()
		{
			$config['upload_path']		= './uploads/rooms/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "room_".$this->id_room;
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('photo_room')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		// method kamar_mandi
		private function _uploadImageBadroom()
		{
			$config['upload_path']		= './uploads/badroom/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "badroom_".$this->id_room;
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('badroom')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		// method fullroom
		private function _uploadImageFullroom()
		{
			$config['upload_path']		= './uploads/fullroom/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "fullroom_".$this->id_room;
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('fullroom')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		// method facilitiesroom
		private function _uploadImageFacilitiesroom()
		{
			$config['upload_path']		= './uploads/facilitiesroom/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "facilitiesroom_".$this->id_room;
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('facilitiesroom')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		// method delete room
		private function _deleteImageRoom($id)
		{
			$rooms = $this->getRoomById($id);
			if ($rooms->photo_room != "default.jpg") {
				$filename = explode(".", $rooms->photo_room)[0];
				return array_map('unlink', glob(FCPATH."uploads/rooms/$filename.*"));
			}
		}

		// method delete badroom
		private function _deleteImageBadroom($id)
		{
			$rooms = $this->getRoomById($id);
			if ($rooms->kamar_mandi != "default.jpg") {
				$filename = explode(".", $rooms->kamar_mandi)[0];
				return array_map('unlink', glob(FCPATH."uploads/badroom/$filename.*"));
			}
		}

		// method delete fullroom
		private function _deleteImageFullroom($id)
		{
			$rooms = $this->getRoomById($id);
			if ($rooms->halaman != "default.jpg") {
				$filename = explode(".", $rooms->halaman)[0];
				return array_map('unlink', glob(FCPATH."uploads/fullroom/$filename.*"));
			}
		}

		//method delete facilitesroom
		private function _deleteImageFacilitiesroom($id)
		{
			$rooms = $this->getRoomById($id);
			if ($rooms->fasilitas_room != "default.jpg") {
				$filename = explode(".", $rooms->fasilitas_room)[0];
				return array_map('unlink', glob(FCPATH."uploads/facilitiesroom/$filename.*"));
			}
		}

	}
 ?>