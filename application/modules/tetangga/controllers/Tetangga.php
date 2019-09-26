<?php 
	
	class Tetangga extends CI_Controller{

		public function index()
		{	
			$data['testimoni'] = $this->testimoni_model->getAllTestimoni();
			$data['foods'] = $this->food_model->getFood();
			$data['villa'] = $this->villa_model->getAllVilla();
			$data['rooms'] = $this->rooms_model->getAllRoom();
			$data['facilities'] = $this->facilities_model->getFacilities();
			$data['galery'] = $this->galery_model->getGalery();

			
			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar', $data);
			$this->load->view('index', $data);
			$this->load->view('tetangga_template/footer', $data);
		}

		public function rooms()
		{	
			$data['facilities'] = $this->facilities_model->getFacilities();
			$data['rooms'] = $this->rooms_model->getAllRoom();
			$data['galery'] = $this->galery_model->getGalery();

			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar', $data);
			$this->load->view('rooms', $data);
			$this->load->view('tetangga_template/footer', $data);
		}

		public function detileroom($id=null)
		{	
			$data['rooms'] = $this->rooms_model->getAllRoom();
			$data['detileroom'] = $this->rooms_model->RoomById($id);

			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar', $data);
			$this->load->view('detileroom', $data);
			$this->load->view('tetangga_template/footer', $data);
		}

		public function about()
		{
			$data['villa'] = $this->villa_model->getAllVilla();
			$data['foods'] = $this->food_model->getFood();
			$data['rooms'] = $this->rooms_model->getAllRoom();
			$data['facilities'] = $this->facilities_model->getFacilities();
			$data['galery'] = $this->galery_model->getGalery();
			
			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar', $data);
			$this->load->view('about', $data);
			$this->load->view('tetangga_template/footer', $data);
		}

		public function contact()
		{
			$data['villa'] = $this->villa_model->getAllVilla();
			$data['rooms'] = $this->rooms_model->getAllRoom();
			
			$this->load->view('tetangga_template/header');
			$this->load->view('tetangga_template/navbar', $data);
			$this->load->view('contact', $data);
			$this->load->view('tetangga_template/footer', $data);

		}
	}
 ?>