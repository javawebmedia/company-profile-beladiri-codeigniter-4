<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Konfigurasi_model;
use App\Models\Patient_model;

class Signin extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	// Homepage
	public function index()
	{
		$session 		= \Config\Services::session();
		if(isset($_GET['redirect'])) {
			$this->session->set('pengalihan',$_GET['redirect']);
		}
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_patient 		= new Patient_model();
		$konfigurasi 	= $m_konfigurasi->listing();

		// Start validasi
        if($this->request->getMethod() === 'post' && $this->validate(
            [
            'username'  => 'required|min_length[3]',
            'password'  => 'required|min_length[3]',
            ])) 
        {           
            $username       = $this->request->getPost('username');
            $password       = $this->request->getPost('password');
            $this->simple_login->login_patient($username,$password);
        }
		// End validasi
		$data = [	'title'			=> 'Login Patient',
					'description'	=> 'Login Patient '.$konfigurasi->namaweb.', '.$konfigurasi->tentang,
					'keywords'		=> 'Login Patient '.$konfigurasi->namaweb.', '.$konfigurasi->keywords,
					'session'		=> $session,
					'content'		=> 'signin/index'
				];
		echo view('layout/wrapper-2',$data);
		// End proses
	}

	// Logout
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('signin?logout=sukses'));
	}
}