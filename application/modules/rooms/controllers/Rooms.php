<?php 

	class Rooms extends CI_Controller{

		public function index()
		{
			$data['judul'] = 'Data Rooms';
			$data['header'] = 'Data Rooms';
			$data['room'] = $this->rooms_model->getAllRoom();
			$data['status'] = $this->statusroom_model->getAllStatusRoom();

			$this->load->view('admin_template/header', $data);
			$this->load->view('admin_template/sidebar');
			$this->load->view('index', $data);
			$this->load->view('admin_template/footer');
		}

		public function add()
		{
			$rooms = $this->rooms_model;
			$validation = $this->form_validation;
			$validation->set_rules($rooms->_rules());

			if ($validation->run()) {
				$rooms->save();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data Rooms Berhasil Dtambah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('rooms');
			}else{
				$this->index();
			}
		}

		public function update($id=null)
		{
			$rooms = $this->rooms_model;
			$validation = $this->form_validation;
			$validation->set_rules($rooms->_rules());

			if ($validation->run()) {
				$rooms->update();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data Rooms Berhasil Dtubah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('rooms');
			}else{
				$this->index();
			}
		}

		public function delete($id=null)
		{
			if ($this->rooms_model->delete($id)) {
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data Rooms Berhasil Dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('rooms');
			}
		}
	}
 ?>