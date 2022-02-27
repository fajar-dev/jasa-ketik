<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Model_login');
		
		if($this->session->userdata('status')=="login"){
			?>
			<script>
			window.location="<?php echo base_url(); ?>page";
			</script>
			<?php
		}
		
	}

  public function index()
	{
		redirect(base_url('auth/login'));
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('daftar');
	}

  function proses_login()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$where = array(
			'username'=>$username,
			'password'=>md5($pass)
		);
		$cek = $this->Model_login->cek_login('tbl_pelanggan',$where)->num_rows();
		$hasil= $this->Model_login->cek_login('tbl_pelanggan',$where)->result();

		if($cek > 0 ){
			foreach ($hasil as $data) {
				$sesi = array(
					'email'=>$user,
					'nama'=>$data->nama,
					'id_pelanggan'=>$data->id,
					'status'=>"login"
					);
			};
			$this->session->set_userdata($sesi);
			redirect(base_url('page'));
		}else{
			$this->session->set_flashdata('msg',
			'<script>alert("GAGAL!!\n Email Atau Password yang anda masukan salah");</script>'
			);
			redirect(base_url('auth/login'));
		}
	}

	public function proses_daftar()
	{
		$tgl = $tgl = date("Y-m-d h:i:sa");
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$hp = $_POST['hp'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$data = array(
			'username'=>$username,
			'password'=>$password,
			'nama'=>$nama,
			'email_pelanggan'=>$email,
			'hp'=>$hp,
			'alamat'=>$alamat,
			);
		$this->Model_login->tambah('tbl_pelanggan',$data);
		$this->session->set_flashdata('msg',
		'<script>alert("Pendaftaran Berhasil !!");</script>'
		);
		redirect(base_url('auth/login'));
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->userdata('status')==" ";
		redirect(base_url('auth/login'));
	} 

}
