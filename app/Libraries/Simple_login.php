<?php 
namespace App\Libraries;
use App\Models\User_model;
use App\Models\Patient_model;

class Simple_login
{
	// check login
	public function login($username,$password,$pengalihan)
	{
		$this->session  = \Config\Services::session();
		$uri            = service('uri');
		$m_user 		= new User_model();
		$user 			= $m_user->login($username,$password);
		if($user) 
		{
			// Jika username password benar
			$this->session->set('username',$username);
			$this->session->set('id_user',$user->id_user);
			$this->session->set('id_staff',$user->id_staff);
			$this->session->set('nama',$user->nama);
			$this->session->set('akses_level',$user->akses_level);
			// $this->session->setFlashdata('warning', 'Hai '.$user->nama.', Anda berhasil login');
			// return redirect()->to(base_url('admin/dasbor'));
			if($pengalihan!=='') {
				header("Location: ".$pengalihan);
			}else{
				header("Location: admin/dasbor");
			}
			
            exit;
		}else{
			// jika username password salah
			$this->session->setFlashdata('warning','Username atau password salah');
			return redirect()->to(base_url('login'));
		}
	}

	// check login
	public function login_patient($username,$password)
	{
		$this->session  = \Config\Services::session();
		$uri            = service('uri');
		$m_patient 		= new Patient_model();
		$user 			= $m_patient->login($username,$password);
		if($user) 
		{
			// Jika username password benar
			$this->session->set('username_patient',$username);
			$this->session->set('patient_id',$user->patient_id);
			$this->session->set('patient_full_name',$user->full_name);
			$this->session->set('access_level','Patient');
			header("Location: patient/dasbor");			
            exit;
		}else{
			// jika username password salah
			$this->session->setFlashdata('warning','Username or password is not match');
			return redirect()->to(base_url('signin'));
		}
	}

	// check login
	public function checklogin()
	{
		$this->session  = \Config\Services::session();
		if($this->session->get('username')=='') 
		{
			$pengalihan = str_replace('index.php/','',current_url());
			$this->session->set('pengalihan',$pengalihan);
			$this->session->setFlashdata('warning','Anda belum login');
			header("Location: ".base_url('login')).'?redirect='.$pengalihan;
	        exit;
		}
	}

	// check login
	public function checklogin_patient()
	{
		$this->session  = \Config\Services::session();
		if($this->session->get('username_patient')=='') 
		{
			$pengalihan = str_replace('index.php/','',current_url());
			$this->session->set('pengalihan',$pengalihan);
			$this->session->setFlashdata('warning','Anda belum login');
			header("Location: ".base_url('signin')).'?redirect='.$pengalihan;
	        exit;
		}
	}

	// check logout
	public function logout()
	{
		$this->session  = \Config\Services::session();
		$this->session->remove('username');
		$this->session->remove('id_user');
		$this->session->remove('akses_level');
		$this->session->remove('nama');
		$this->session->setFlashdata('sukses','Anda berhasil logout');
		header("Location: ".base_url('login?logout=sukses'));
        exit;
	}
}