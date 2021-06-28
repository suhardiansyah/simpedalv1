<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('login');
		cek_login();
	}

	public function index()
	{
		$this->template->load('back-end/_template', 'back-end/_dashboard');
	}

	public function lokasiInvestasi()
	{
		$this->template->load('back-end/_template', 'back-end/_petaInvestasi');
	}

	public function petaKecamatan()
	{
		$this->template->load('back-end/_template', 'back-end/_petakecamatan');
	}

	public function profil()
	{
		if (isset($_POST['update'])) {
			$data = array(
				'judul'			=> $this->input->post('judul'),
				'isi_profil'	=> $this->input->post('isi'),
			);
			$this->db->where('id_profil', $this->input->post('id'));
			$this->db->update('profil', $data);
			redirect('dashboard/profil');
		} else {
			$data['p'] = $this->db->get_where('profil', array('id_profil' => 1))->row_array();
			$this->template->load('back-end/_template', 'back-end/_profil', $data);
		}
	}

	public function Lokasi()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'telp'		=> $this->input->post('telp'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
			);
			$this->db->insert('lokasi', $data);
			redirect('dashboard/lokasi');
		} elseif (isset($_POST['update'])) {
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'telp'		=> $this->input->post('telp'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('lokasi', $data);
			redirect('dashboard/lokasi');
		} else {
			$data['l'] = $this->db->get('lokasi');
			$this->template->load('back-end/_template', 'back-end/_lokasi', $data);
		}
	}

	public function Lokasi_tambah()
	{
		$data['k'] = $this->db->get('kategori');
		$this->template->load('back-end/_template', 'back-end/_lokasi_tambah', $data);
	}


	public function Lokasi_edit($id)
	{
		$data['k'] = $this->db->get('kategori');
		$data['l'] = $this->db->get_where('lokasi', array('id' => $id))->row_array();
		$this->template->load('back-end/_template', 'back-end/_lokasi_edit', $data);
	}

	public function Lokasi_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('lokasi');
		redirect('dashboard/lokasi');
	}

	public function Lokasi_kategori()
	{
		if (isset($_POST['simpan'])) {
			if ($_FILES['gambar']['error'] <> 4) {

				$config['upload_path'] = './uploads/icon';
				$config['allowed_types'] = 'jpg|png|gif|bmp';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				} else {
					$hasil 	= $this->upload->data();
					$data = array(
						'nama_kategori'	=> $this->input->post('nama'),
						'keterangan'	=> $this->input->post('keterangan'),
						'ikon'			=> $hasil['file_name'],
					);
					$this->db->insert('kategori', $data);
					redirect('dashboard/Lokasi_kategori');
				}
			} else {
				$data = array(
					'nama_kategori'	=> $this->input->post('nama'),
					'keterangan'	=> $this->input->post('keterangan'),
				);
				$this->db->insert('kategori', $data);
				redirect('dashboard/Lokasi_kategori');
			}
		} elseif (isset($_POST['update'])) {
			if ($_FILES['gambar']['error'] <> 4) {

				$config['upload_path'] = './uploads/icon';
				$config['allowed_types'] = 'jpg|png|gif|bmp';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				} else {
					$hasil 	= $this->upload->data();
					$data = array(
						'nama_kategori'	=> $this->input->post('nama'),
						'keterangan'	=> $this->input->post('keterangan'),
						'ikon'			=> $hasil['file_name'],
					);

					$id 	= $this->input->post('id');
					$query 	= $this->db->get_where('kategori', array('id' => $id))->row_array();
					unlink("./uploads/icon/" . $query['ikon']);

					$this->db->where('id', $id);
					$this->db->update('kategori', $data);
					redirect('dashboard/Lokasi_kategori');
				}
			} else {
				$data = array(
					'nama_kategori'	=> $this->input->post('nama'),
					'keterangan'	=> $this->input->post('keterangan'),
				);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('kategori', $data);
				redirect('dashboard/Lokasi_kategori');
			}
		} else {
			$data['k'] = $this->db->get('kategori');
			$this->template->load('back-end/_template', 'back-end/_lokasi_kategori', $data);
		}
	}

	public function lokasi_kategori_edit($id)
	{
		$data['l'] = $this->db->get_where('kategori', array('id' => $id))->row_array();
		$this->template->load('back-end/_template', 'back-end/_lokasi_kategori_edit', $data);
	}

	public function lokasi_kategori_delete($id)
	{
		$query = $this->db->get_where('kategori', array('id' => $id))->row_array();

		unlink("./uploads/icon/" . $query['ikon']);

		$this->db->delete('kategori', array('id' => $id));
		redirect('dashboard/Lokasi_kategori');
	}

	public function Kecamatan()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'namacamat'		=> $this->input->post('namacamat'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'telp'		=> $this->input->post('telp'),
				'populasi'		=> $this->input->post('populasi'),
				'sejarah'		=> $this->input->post('sejarah'),
				'jlh_desa'		=> $this->input->post('jlh_desa'),
				'jlh_kelurahan'		=> $this->input->post('jlh_kelurahan'),
				'luas'		=> $this->input->post('luas'),
				'jlh_investasi'		=> $this->input->post('jlh_investasi'),
				'jns_investasi'		=> $this->input->post('jns_investasi'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
				'foto'	=> $this->input->post('foto'),
			);
			$this->db->insert('kecamatan', $data);
			redirect('dashboard/kecamatan');
		} elseif (isset($_POST['update'])) {
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'namacamat'		=> $this->input->post('namacamat'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'telp'		=> $this->input->post('telp'),
				'populasi'		=> $this->input->post('populasi'),
				'sejarah'		=> $this->input->post('sejarah'),
				'jlh_desa'		=> $this->input->post('jlh_desa'),
				'jlh_kelurahan'		=> $this->input->post('jlh_kelurahan'),
				'luas'		=> $this->input->post('luas'),
				'jlh_investasi'		=> $this->input->post('jlh_investasi'),
				'jns_investasi'		=> $this->input->post('jns_investasi'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
				'foto'	=> $this->input->post('foto'),
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kecamatan', $data);
			redirect('dashboard/Kecamatan');
		} else {
			$data['l'] = $this->db->get('kecamatan');
			$this->template->load('back-end/_template', 'back-end/kecamatan/_Kecamatan', $data);
		}
	}

	public function Kecamatan_tambah()
	{
		$data['k'] = $this->db->get('kategori');
		$this->template->load('back-end/_template', 'back-end/kecamatan/_kecamatan_tambah', $data);
	}

	public function Kecamatan_edit($id)
	{
		$data['k'] = $this->db->get('kategori');
		$data['l'] = $this->db->get_where('kecamatan', array('id' => $id))->row_array();
		$this->template->load('back-end/_template', 'back-end/kecamatan/_Kecamatan_edit', $data);
	}

	public function Kecamatan_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kecamatan');
		redirect('dashboard/Kecamatan');
	}

	public function Kecamatan_kategori()
	{
		if (isset($_POST['simpan'])) {
			if ($_FILES['gambar']['error'] <> 4) {

				$config['upload_path'] = './uploads/img';
				$config['allowed_types'] = 'jpg|png|gif|bmp';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				} else {
					$hasil 	= $this->upload->data();
					$data = array(
						'nama_kategori'	=> $this->input->post('nama'),
						'keterangan'	=> $this->input->post('keterangan'),
						'ikon'			=> $hasil['file_name'],
					);
					$this->db->insert('kategori', $data);
					redirect('dashboard/Kecamatan_kategori');
				}
			} else {
				$data = array(
					'nama_kategori'	=> $this->input->post('nama'),
					'keterangan'	=> $this->input->post('keterangan'),
				);
				$this->db->insert('kategori', $data);
				redirect('dashboard/Kecamatan_kategori');
			}
		} elseif (isset($_POST['update'])) {
			if ($_FILES['gambar']['error'] <> 4) {

				$config['upload_path'] = './uploads/img';
				$config['allowed_types'] = 'jpg|png|gif|bmp';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				} else {
					$hasil 	= $this->upload->data();
					$data = array(
						'nama_kategori'	=> $this->input->post('nama'),
						'keterangan'	=> $this->input->post('keterangan'),
						'ikon'			=> $hasil['file_name'],
					);

					$id 	= $this->input->post('id');
					$query 	= $this->db->get_where('kategori', array('id' => $id))->row_array();
					unlink("./uploads/icon/" . $query['ikon']);

					$this->db->where('id', $id);
					$this->db->update('kategori', $data);
					redirect('dashboard/Kecamatan_kategori');
				}
			} else {
				$data = array(
					'nama_kategori'	=> $this->input->post('nama'),
					'keterangan'	=> $this->input->post('keterangan'),
				);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('kategori', $data);
				redirect('dashboard/Kecamatan_kategori');
			}
		} else {
			$data['k'] = $this->db->get('kategori');
			$this->template->load('back-end/_template', 'back-end/kecamatan/_Kecamatan_kategori', $data);
		}
	}

	public function Kecamatan_kategori_edit($id)
	{
		$data['l'] = $this->db->get_where('kategori', array('id' => $id))->row_array();
		$this->template->load('back-end/_template', 'back-end/_kecamatan_kategori_edit', $data);
	}

	public function Kecamatan_kategori_delete($id)
	{
		$query = $this->db->get_where('kategori', array('id' => $id))->row_array();

		unlink("./uploads/icon/" . $query['ikon']);

		$this->db->delete('kategori', array('id' => $id));
		redirect('dashboard/Kecamatan_kategori');
	}

	public function berita()
	{
		if (isset($_POST['simpan'])) {
			if ($_FILES['gambar']['error'] <> 4) {

				$config['upload_path'] = './uploads/berita';
				$config['allowed_types'] = 'jpg|png|gif|bmp';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				} else {
					$hasil 	= $this->upload->data();
					$data = array(
						'judul'			=> $this->input->post('judul'),
						'isi_berita'	=> $this->input->post('isi'),
						'gambar'		=> $hasil['file_name'],
						'tanggal'		=> date('Y-m-d'),
						'penulis'		=> 'Admin',
						'dibaca'		=> '0',
					);
					$this->db->insert('berita', $data);
					redirect('dashboard/berita');
				}
			} else {
				$data = array(
					'judul'			=> $this->input->post('judul'),
					'isi_berita'	=> $this->input->post('isi'),
					'tanggal'		=> date('Y-m-d'),
					'penulis'		=> 'Admin',
					'dibaca'		=> '0',
				);
				$this->db->insert('berita', $data);
				redirect('dashboard/berita');
			}
		} elseif (isset($_POST['update'])) {
			if ($_FILES['gambar']['error'] <> 4) {

				$config['upload_path'] = './uploads/berita';
				$config['allowed_types'] = 'jpg|png|gif|bmp';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				} else {
					$hasil 	= $this->upload->data();
					$data = array(
						'judul'			=> $this->input->post('judul'),
						'isi_berita'	=> $this->input->post('isi'),
						'gambar'		=> $hasil['file_name'],
					);

					$id 	= $this->input->post('id');
					$query 	= $this->db->get_where('berita', array('id_berita' => $id))->row_array();
					unlink("./uploads/berita/" . $query['gambar']);

					$this->db->where('id_berita', $id);
					$this->db->update('berita', $data);
					redirect('dashboard/berita');
				}
			} else {
				$data = array(
					'judul'			=> $this->input->post('judul'),
					'isi_berita'	=> $this->input->post('isi'),
				);
				$this->db->where('id_berita', $this->input->post('id'));
				$this->db->update('berita', $data);
				redirect('dashboard/berita');
			}
		} else {
			$data['b'] = $this->db->get('berita');
			$this->template->load('back-end/_template', 'back-end/_berita', $data);
		}
	}

	public function berita_tambah()
	{
		$this->template->load('back-end/_template', 'back-end/_berita_tambah');
	}

	public function berita_edit($id)
	{
		$data['b'] = $this->db->get_where('berita', array('id_berita' => $id))->row_array();
		$this->template->load('back-end/_template', 'back-end/_berita_edit', $data);
	}

	public function berita_delete($id)
	{
		$r = $this->db->get_where('berita', array('id_berita' => $id))->row_array();

		unlink("./uploads/berita/" . $r['gambar']);

		$this->db->delete('berita', array('id_berita' => $id));
		redirect('dashboard/berita');
	}

	public function komentar()
	{
		$data['k'] = $this->db->get('komentar');
		$this->template->load('back-end/_template', 'back-end/_komentar', $data);
	}

	public function komentar_delete($id)
	{
		$this->db->where('id_komentar', $id);
		$this->db->delete('komentar');
		redirect('dashboard/komentar');
	}
}
