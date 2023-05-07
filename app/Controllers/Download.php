<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Download_model;

class Download extends BaseController
{
	// Download
	public function index()
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_download		= new Download_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$pager 			= service('pager'); 
		$total 			= $m_download->total_jenis_download('Download');
        $page    		= (int) ($this->request->getGet('page') ?? 1);
        $perPage 		= $this->website->paginasi_depan();
        $total   		= $total;
        $pager_links 	= $pager->makeLinks($page, $perPage, $total,'bootstrap_pagination');
        $page 			= ($this->request->getGet('page'))?($this->request->getGet('page')-1)*$perPage:0;
        $download 		= $m_download->jenis_download_all('Download',$perPage, $page);

		$data = [	'title'			=> 'Download File',
					'description'	=> 'Download File '.$konfigurasi->namaweb.', '.$konfigurasi->tentang,
					'keywords'		=> 'Download File '.$konfigurasi->namaweb.', '.$konfigurasi->keywords,
					'download'		=> $download,
					'konfigurasi'	=> $konfigurasi,
					'pagination'	=> $pager_links,
					'content'		=> 'download/index'
				];
		echo view('layout/wrapper',$data);
	}

	// Unduh
	public function baca($id_download)
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_download 	= new Download_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$download 		= $m_download->detail($id_download);
		// Update hits
		$data = [ 	'id_download'	=> $download['id_download'],
					'hits'			=> $download['hits']+1
				];
		$m_download->edit($data);
		// Update hits
		$data = [	'title'			=> $download['judul_download'],
					'description'	=> $download['judul_download'],
					'keywords'		=> $download['judul_download'],
					'download'		=> $download,
					'konfigurasi'	=> $konfigurasi,
					'content'		=> 'download/baca'
				];
		echo view('layout/wrapper',$data);
	}

	// Unduh
	public function unduh($id_download)
	{
		$m_download 			= new Download_model();
		$download 				= $m_download->detail($id_download);
		// Update hits
		$data = [ 	'id_download'	=> $download->id_download,
					'hits'			=> $download->hits+1
				];
		$m_download->edit($data);
		// Update hits
		if(!file_exists('../assets/upload/file/'.$download->gambar)) {
			$this->session->setFlashdata('warning','Mohon maaf, file tidak ditemukan.');
			return redirect()->to(base_url('admin/download'));
		}else{
			return $this->response->download('../assets/upload/file/'.$download->gambar, null);
		}
	}
}