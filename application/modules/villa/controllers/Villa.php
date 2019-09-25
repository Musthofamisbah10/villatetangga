<?php 
	
	class Villa extends CI_Controller{

		public function index()
		{
			$data['judul'] = 'Data Villa';
			$data['header'] = 'Data Villa';
			$data['villa'] = $this->villa_model->getAllVilla();

			$this->load->view('admin_template/header', $data);
			$this->load->view('admin_template/sidebar');
			$this->load->view('index', $data);
			$this->load->view('admin_template/footer');
		}

		public function add()
		{
			$villa = $this->villa_model;
			$validation = $this->form_validation;
			$validation->set_rules($villa->_rules());

			if ($validation->run()) {
				$villa->save();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data Villa Berhasil Ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('villa');
			}else{
				$this->index();
			}
		}

		public function update($id=null)
		{
			$villa = $this->villa_model;
			$validation = $this->form_validation;
			$validation->set_rules($villa->_rules());

			if ($validation->run()) {
				$villa->update();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data villa berhasil diubah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('villa');
			}else{
				$this->index();
			}
		}

		public function delete($id=null)
		{
			if ($this->villa_model->delete($id)) {
				$this->session->set_flashdata('success', '<div class="alert alert-danger
					alert-dismissible
					fade show" role="alert">
					Data Villa Berhasil Dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('villa');
			}
		}

	}
 ?>