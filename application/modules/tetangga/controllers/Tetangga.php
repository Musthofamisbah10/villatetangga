<?php 
	
	class Tetangga extends CI_Controller{

		public function index()
		{	

			$data['villa'] = $this->villa_model->getAllVilla();
			$data['rooms'] = $this->rooms_model->getAllRoom();
			$data['facilities'] = $this->facilities_model->getFacilities();
			$data['galery'] = $this->galery_model->getGalery();
			
			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar');
			$this->load->view('index', $data);
			$this->load->view('tetangga_template/footer');
		}

		// public function rooms()
		// {	
		// 	$data['rooms'] = $this->rooms_model->getAllRoom();

		// 	$this->load->view('tetangga_template/header');
		// 	$this->load->view('tetangga_template/navbar');
		// 	$this->load->view('index', $data);
		// 	$this->load->view('tetangga_template/footer');
		// }

		// public function detileroom()
		// {	
		// 	$this->load->view('_partial/header');
		// 	$this->load->view('_partial/navbar');
		// 	$this->load->view('detileroom');
		// 	$this->load->view('_partial/under');
		// }

		public function about()
		{
			$data['villa'] = $this->villa_model->getAllVilla();
			$data['facilities'] = $this->facilities_model->getFacilities();
			$data['galery'] = $this->galery_model->getGalery();
			
			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar');
			$this->load->view('about', $data);
			$this->load->view('tetangga_template/footer');
		}

		public function contact()
		{
			$data['villa'] = $this->villa_model->getAllVilla();
			
			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar');
			$this->load->view('contact', $data);
			$this->load->view('tetangga_template/footer');

		}
	}
 ?>