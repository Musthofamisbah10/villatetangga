<?php 

	class Testimoni extends CI_Controller{

		public function index()
		{
			$data['judul'] = 'Data Testimoni';
			$data['header'] = 'Data Testimini';
			$data['guest'] = $this->guest_model->getGuest();
			// $data['guest'] = $this->guest_model->getGuestById($);
			$data['testimoni'] = $this->testimoni_model->getAllTestimoni();

			$this->load->view('admin_template/header', $data);
			$this->load->view('admin_template/sidebar');
			$this->load->view('index', $data);
			$this->load->view('admin_template/footer');
		}

		public function add()
		{
			$testimoni = $this->testimoni_model;
			$validation = $this->form_validation;
			$validation->set_rules($testimoni->_rules());

			if ($validation->run()) {
				$testimoni->save();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data Testimoni Berhasil Ditambah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('testimoni');
			}else{
				$this->index();
			}
		}

		public function update($id=null)
		{
			$testimoni = $this->testimoni_model;
			$validation = $this->form_validation;
			$validation->set_rules($testimoni->_rules());

			if ($validation->run()) {
				$testimoni->update();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data Testimoni Berhasil Diubah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('testimoni');
			}else{
				$this->index();
			}
		}

		public function delete($id=null)
		{
			if ($this->testimoni_model->delete($id)) {
				$this->session->set_flashdata('danger', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data testimoni berhasil dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('testimoni');
			}
		}
	}
 ?>