<?php 

	class Rooms_model extends CI_Model{
		
		private $_table = 'room';
		public $id_room;
		public $status_id;
		public $nama_room;
		public $photo_room;
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
			$this->photo_room = $this->_uploadImage();
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

				if (!empty($_FILES['photo_room']['name'])) {
					$this->photo_room = $this->_uploadImage();
				}else{
					$this->photo_room = $post['old_image'];
				}

			$this->diskrip_room = $post['diskrip_room'];
			$this->harga = $post['harga'];

			$this->db->update($this->_table, $this, array('id_room' => $post['id_room']));
		}

		public function delete($id)
		{	
			$this->_deleteImage($id);
			return $this->db->delete('room', ['id_room' => $id]);
		}

		private function _uploadImage()
		{
			$config['upload_path']		= './uploads/rooms/';
			$config['allowed_types']	= 'jpg|png|gif';
			$config['file_name']		= "room_".$this->id_room;
			$config['overwrite']		= true;
			$config['max_size']			= 1024;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('photo_room')){
				return $this->upload->data('file_name');
			}

			print_r($this->upload->display_errors());
		}

		private function _deleteImage($id)
		{
			$rooms = $this->getRoomById($id);
			if ($rooms->photo_room != "default.jpg") {
				$filename = explode(".", $rooms->photo_room)[0];
				return array_map('unlink', glob(FCPATH."uploads/rooms/$filename.*"));
			}
		}
	}
 ?>