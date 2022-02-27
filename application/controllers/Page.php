<?php
class Page extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_page');
		
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		}
	}
	
	public function index(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['hasil']= $this->Model_page->tampil_pesanan($id_pelanggan)->result();
		$data['hasil1']= $this->Model_page->tampil_pesanan1($id_pelanggan)->result();
		$data['title'] = 'Orderan Saya';
		$this->load->view('header', $data);
    $this->load->view('index');
    $this->load->view('footer');
	} 

	public function pembayaran(){
		$data['title'] = 'Pembayaran';
		$this->load->view('header', $data);
    $this->load->view('pembayaran');
    $this->load->view('footer');
	}


	public function bukti()
	{	
						$kode = $_POST['kode'];;
						$where = array('kode' => $kode);
						$config['upload_path']          = './assets/gambar';
						$config['allowed_types']        = 'img|png|jpeg|gif|jpg';
						$config['max_size']             = 10000000;
						$config['max_width']            = 10240;
						$config['max_height']           = 7680;
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
									 redirect(base_url('page/pembayaran?kode='.$kode));
					 }else{
									 $data = array('foto' => $this->upload->data());
									 $uploadData = $this->upload->data();
									 $hasil = $uploadData['file_name'];
									 $kode = "JK-".rand(100, 900);
									 $data = array(
									 'bukti' => $hasil,
								 );

							$this->db->update('tbl_pesanan',$data,$where);
							$this->session->set_flashdata('msg',
							'<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Berhasil !!</strong> <br>Pesanan Anda Sedang Kami Proses
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
							);
							redirect(base_url('page'));
						}
	}   

	public function tambah_proses()
	{
		$config['upload_path']          = './assets/gambar';
		$config['allowed_types']        = 'img|png|jpeg|gif|jpg';
		$config['max_size']             = 10000000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
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
				 	redirect(base_url('page'));
	 }else{
					 $data = array('foto' => $this->upload->data());
					 $uploadData = $this->upload->data();
					 $hasil = $uploadData['file_name'];
					 $kode = "JK-".rand(100, 900);
					 $data = array(
					 'id_pelanggan' => $this->session->userdata('id_pelanggan'),
					 'kode' => $kode,
					 'tgl_pesanan' => date("Y-m-d"),
					 'hp' => $this->input->post('hp'),
					 'file' => $hasil,
				 );

				 $this->db->insert('tbl_pesanan',$data);
				 $this->session->set_flashdata('msg',
				 '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Berhasil !!</strong> <br>Silahkan Lakukan Pembayaran
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
				 );
				 redirect(base_url('page/pembayaran/?kode='.$kode));
		}
	}


	function cancel($id){
		$where = array('id'=>$id);
		$this->Model_page->hapus('tbl_pesanan',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil !!</strong> <br>Membatalkan Pesanan
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>'
		);
		redirect(base_url('page'));
	}

}