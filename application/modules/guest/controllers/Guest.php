<?php 

	class Guest extends Ci_Controller
	{

		function __construct(){
		        parent::__construct();
		        //load libary pagination
		        $this->load->library('pagination');
		    }

	
		public function index()
		{
			//konfigurasi pagination
	        $config['base_url'] = site_url('guest/index'); //site url
	        $config['total_rows'] = $this->guest_model->countAllGuest(); //total row
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
			$data['judul'] = 'Data Guest';
			$data['header'] = 'Data Guest';
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['guest'] = $this->guest_model->getAllGuest($config["per_page"], $data['page']);
			$data['pagination'] = $this->pagination->create_links();


			$this->load->view('admin_template/header', $data);
			$this->load->view('admin_template/sidebar');
			$this->load->view('index', $data);
			$this->load->view('admin_template/footer');
		}

		public function detile($id=null)
		{
			$data['judul'] = 'Detile guest';
			$data['header'] = 'Detile guest';
			$data['detile'] = $this->guest_model->detile($id);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('guest/detile', $data);
			$this->load->view('templates/footer');
		}
		
		public function add()
		{
			$guest = $this->guest_model;
			$validation = $this->form_validation;
			$validation->set_rules($guest->_rules());

			if ($validation->run()){
				$guest->save();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data guest berhasil ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('guest');
			}else{	
				$this->index();
			}
		}

		public function update($id=null)
		{
			$guest = $this->guest_model;
			$validation = $this->form_validation;
			$validation->set_rules($guest->_rules());

			if ($validation->run()) {
				$guest->update();
				$this->session->set_flashdata('success', '<div class="alert alert-success
					alert-dismissible
					fade show" role="alert">
					Data guest berhasil Diubah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('guest');
			}
		}

		public function delete($id=null)
		{
			if ($this->guest_model->delete($id)) {
				$this->session->set_flashdata('success', '<div class="alert alert-danger
					alert-dismissible
					fade show" role="alert">
					Data guest berhasil dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('guest');
			}
		}
	}
?>