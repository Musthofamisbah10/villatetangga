<?php 

	class Auth extends CI_Controller{

		public function index()
		{
			$data['judul'] = "Login Admin"	;
			$this->load->view('admin_template/header', $data);
			$this->load->view('auth');
			$this->load->view('admin_template/footer');
		}

		public function save()
		{
			// sett validation
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('auth');
			}else{
				// memngambil nilai post
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				// membuat variabel inputan
				$user = $username;
				$pass = sha1($password);

				// pengecekan ke database dengan model
				$cek = $this->auth_model->cekLogin($user, $pass);

				if( $cek->num_rows() > 0 ){
					// session
					foreach( $cek->result() as $row ){
						$sess_data['username'] = $row->username;
						$sess_data['nama_admin'] = $row->email;

						//pemanggilan session data
						$this->session->set_userdata($sess_data);

						// echo var_dump($session);
					}

					if( $sess_data['username'] == $user){
						redirect('admin');
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger
							alert-dismissible
							fade show" role="alert">
							Username dan atau Password <strong>Salah</strong>.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible
						fade show" role="alert">
						Username dan atau Password <strong>Salah</strong>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
					redirect('auth');
				}
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('auth');
		}
	}

?>