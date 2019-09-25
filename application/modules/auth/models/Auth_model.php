<?php 

class Auth_model extends CI_Model{

	public function cekLogin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin');
	}

	// melihat apakah login cocok
	public function getLoginData($user, $pass)
	{
		$u = $user;
		$p = sha1($pass);

		$query_ceklogin = $this->db->get_where('admin', ['username' => $u, 'password' => $p]);

		if (count($query_ceklogin->result()) > 0 ){
			foreach( $query_ceklogin->result() as $cek ) {
				foreach( $query_ceklogin->result() as $row){
					$sess_data ['logged_in'] = TRUE;
					$sess_data ['username'] = $row->username;
					$sess_data ['password'] = $row->password;

					// pemanggilan session data
					
					$this->session->set_userdata($sess_data);
				}
				redirect('admin');
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