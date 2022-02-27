<?php
class Admin extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_admin');
		
		if($this->session->userdata('status')!= "admin"){
			redirect(base_url('login'));
		}
	}
	
	public function index(){
		$data['pesanan'] =  $this->Model_admin->semua('tbl_pesanan')->num_rows();
		$data['pelanggan'] =  $this->Model_admin->semua('tbl_pelanggan')->num_rows();
		$data['title'] = 'Dashboard';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('admin/footer');
	} 

	public function pesanan(){
		$data['hasil']= $this->Model_admin->join()->result();
		$data['title'] = 'Pesanan';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/pesanan');
    $this->load->view('admin/footer');
	}

	public function pengguna(){
		$data['hasil']= $this->Model_admin->tampil('tbl_pelanggan')->result();
		$data['title'] = 'Pengguna';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/pengguna');
    $this->load->view('admin/footer');
	}

	public function Kirim(){
		$data['hasil1']= $this->Model_admin->tampil('tbl_pelanggan')->result();
		$data['hasil']= $this->Model_admin->join2()->result();
		$data['title'] = 'Kirim Pesanan';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/kirim');
    $this->load->view('admin/footer');
	}

	public function tambah()
	{	
						$kode = $_POST['kode'];;
						$where = array('kode' => $kode);
						$config['upload_path']          = './assets/gambar';
						$config['allowed_types']        = 'img|png|jpeg|gif|jpg|doc|docx|pdf';
						$config['max_size']             = 10000000;
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('foto')){
									 $error = array('error' => $this->upload->display_errors());
									 $this->session->set_flashdata('msg',
									 '<div class="alert alert-danger alert-dismissible fade show" role="alert">
									 <strong>Gagal !!</strong> <br>Pastikan Anda memilih File yang benar
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;</span>
									 </button>
								 </div>');
								 redirect(base_url('admin/kirim'));
								}else{
									 $data = array('foto' => $this->upload->data());
									 $uploadData = $this->upload->data();
									 $hasil = $uploadData['file_name'];
									 $data = array(
										'id_pelanggan' =>  $this->input->post('id'),
										'tgl' => date("Y-m-d"),
									 'file' => $hasil,
								 );

							$this->db->insert('tbl_kirim',$data,$where);
							$this->session->set_flashdata('msg',
							'<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Berhasil !!</strong> <br>Pesanan Berhasil Dikirim
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
							);
							redirect(base_url('admin/kirim'));
						}
	}   

	function hapus_pesanan($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_pesanan',$where);
		$this->session->set_flashdata('msg',
    '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil !!</strong> <br>Pesanan berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'
		);
		redirect(base_url('admin/pesanan'));
	}

	function hapus_pengguna($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_pelanggan',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Berhasil !!</strong> <br>Pengguna Berhasil Dihapus
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
		);
		redirect(base_url('admin/pengguna'));
	}

	function hapus_kirim($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_kirim',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Berhasil !!</strong> <br>File yang di kirim berhasil dihapus
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
		);
		redirect(base_url('admin/kirim'));
	}
}