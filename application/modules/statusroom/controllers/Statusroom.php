<?php 

	class Statusroom extends CI_Controller{

		function __construct(){
		        parent::__construct();
		        //load libary pagination
		        $this->load->library('pagination');
		    }

		public function index()
		{
			//konfigurasi pagination
	        $config['base_url'] = site_url('statusroom/index'); //site url
	        $config['total_rows'] = $this->statusroom_model->countAllStatusRoom(); //total row
	        $config['per_page'] = 6;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);

	        // Membuat Style pagination untuk BootStrap v4
	      	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination float-right">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';

        	$this->pagination->initialize($config);
			$data['judul'] = 'Status Room';
			$data['header'] = 'Status Room';
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['status'] = $this->statusroom_model->getStatusRoom($config["per_page"], $data['page']);
			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('admin_template/header', $data);
			$this->load->view('admin_template/sidebar');
			$this->load->view('index', $data);
			$this->load->view('admin_template/footer');
		}

		public function add()
		{
			$statusRoom = $this->statusroom_model;
			$validation = $this->form_validation;
			$validation->set_rules($statusRoom->_rules());

			if ($validation->run()) {
				$statusRoom->save();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Satus Room Berhasil Ditambah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('statusRoom');
			}else{
				$this->index();
			}
		}

		public function update($id=null)
		{
			$statusRoom = $this->statusroom_model;
			$validation = $this->form_validation;
			$statusRoom->set_rules($statusRoom->_rules());

			if ($validation->run()) {
				$statusRoom->update();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Satus Room Berhasil Diubah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('statusRoom');
			}else{
				$this->index();
			}
		}

		public function delete($id=null)
		{
			if ($this->staturoom_model->delete($id)) {
				$this->session->set_flashdata('success', '<div class="alert alert-danger
					alert-dismissible
					fade show" role="alert">
					Status Room Berhasil Dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('statusRoom');
			}
		}
	}
 ?>