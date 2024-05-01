<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Patient_model;

class Patient extends BaseController
{
	
	// index
	public function index()
	{
		$this->simple_login->checklogin();
		$m_patient 			= new Patient_model();
		$pager 				= service('pager'); 
		// patient
		if(isset($_GET['keywords'])) 
		{
			$keywords 		= $this->request->getVar('keywords');
			$total 			= $m_patient->total_cari($keywords);
			$title 			= 'Hasil pencarian: '.$_GET['keywords'].' - '.$total.' ditemukan';
	        $page    		= (int) ($this->request->getGet('page') ?? 1);
	        $perPage 		= $this->website->paginasi();
	        $total   		= $total;
	        $pager_links 	= $pager->makeLinks($page, $perPage, $total,'bootstrap_pagination');
	        $page 			= ($this->request->getGet('page'))?($this->request->getGet('page')-1)*$perPage:0;
	        $patient 		= $m_patient->paginasi_admin_cari($keywords,$perPage, $page);
		}else{
			$totalnya 		= $m_patient->total();
			$title 			= 'Data Patient ('.$totalnya->total.')';
	        $page    		= (int) ($this->request->getGet('page') ?? 1);
	        $perPage 		= $this->website->paginasi();
	        $total   		= $totalnya->total;
	        $pager_links 	= $pager->makeLinks($page, $perPage, $total,'bootstrap_pagination');
	        $page 			= ($this->request->getGet('page'))?($this->request->getGet('page')-1)*$perPage:0;
	        $patient 		= $m_patient->paginasi_admin($perPage, $page);
		}
		// end patient

		$data = [	'title'				=> $title,
					'patient'			=> $patient,
					'pagination'		=> $pager_links,
					'content'			=> 'admin/patient/index'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// Tambah
	public function tambah()
	{
		$this->simple_login->checklogin();
		$m_patient 			= new Patient_model();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'first_name' 				=> [	'rules'  	=> 'required',
								            'errors' 	=> [
								                'required' 	=> 'First name can not be empty'
								            ]
								        ],
				'last_name' 			=> [	'rules'  	=> 'required',
								            'errors' 	=> [
								                'required' 	=> 'Last name can not be empty.'
								            ]
								        ],
				'id_card_number' 			=> [	'rules'  	=> 'required|is_unique[patient.id_card_number]',
								            'errors' 	=> [
								                'required' 		=> 'ID Card Number can not be empty.',
								                'is_unique' 	=> 'ID Card Number already registered. Please use different ID Card number.'
								            ]
								        ],
            	'email' 			=> [	'rules'		=> 'required|is_unique[patient.email]',
            								'errors'	=> [
            									'required' 	=> 'Email can not be empty.',
            									'is_unique'	=> 'Email already registered. Please use a new email!'
            								]
            							],
            	'password' 			=> [	'rules'		=> 'required|min_length[6]|max_length[32]',
            								'errors'	=> [
            									'required' 	=> 'Password can not be empty.',
            									'min_length'=> 'Password at least 6 characters.',
            									'max_length'=> 'Password no more than 32 characters.'
            								]
            							],
            	'date_of_birth' 	=> [	'rules'  	=> 'required',
								            'errors' 	=> [
								                'required' 	=> 'Date of birth can not be empty'
								            ]
								        ]
        	])) {
			// masuk database
			$data = [	'first_name'		=> $this->request->getPost('first_name'),
						'last_name'			=> $this->request->getPost('last_name'),
						'full_name'			=> $this->request->getPost('first_name').' '.$this->request->getPost('last_name'),
						'email'				=> $this->request->getPost('email'),
						'password'			=> sha1($this->request->getPost('password')),
						'id_card_number'	=> $this->request->getPost('id_card_number'),
						'phone_number'		=> $this->request->getPost('phone_number'),
						'date_of_birth'		=> $this->request->getPost('date_of_birth'),
						'gender'			=> $this->request->getPost('gender'),
						'home_address'		=> $this->request->getPost('home_address'),
						'patient_status'	=> 'Pending',
						'ip_address'		=> $this->request->getIPAddress(),
						'date_created'		=> date('Y-m-d H:i:s')
					];
			$m_patient->tambah($data);
			// proses login
			$username       = $this->request->getPost('email');
            $password       = $this->request->getPost('password');
            $pengalihan     = $this->request->getPost('pengalihan');
            // proses login
            $this->session->set('username_patient',$username);
            // end proses login
            return redirect()->to(base_url('admin/patient'))->with('sukses', 'Registration success.');
			// masuk database
	    }else{

			$data = [	'title'				=> 'Tambah Patient',
						'content'			=> 'admin/patient/tambah'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// proses
	public function proses()
	{
		$this->simple_login->checklogin();
		$m_patient 		= new Patient_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit 	= $this->request->getVar('submit');
		$patient_id 	= $this->request->getVar('patient_id');
		// check patient
		if(empty($this->request->getVar('patient_id')))
		{
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih patient. Pilih salah satu patient');
		}
		// end check patient
		// proses
		if($submit=='Update') {
   			for($i=0; $i < sizeof($patient_id);$i++) {
				$data = array(	'patient_id'	=> $patient_id[$i],
								'id_user'		=> $this->session->get('id_user'),
								'gender'		=> $this->request->getVar('gender')
							);
   				$m_patient->edit($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Patient berhasil diupdate jenis patientnya');
		}elseif($submit=='Approved') {
			for($i=0; $i < sizeof($patient_id);$i++) {
				$data = array(	'patient_id'		=> $patient_id[$i],
								'id_user'		=> $this->session->get('id_user'),
								'patient_status'	=> 'Approved'
							);
   				$m_patient->edit($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Patient berhasil dipublikasikan');
		}elseif($submit=='Pending') {
			for($i=0; $i < sizeof($patient_id);$i++) {
				$data = array(	'patient_id'		=> $patient_id[$i],
								'id_user'		=> $this->session->get('id_user'),
								'patient_status'	=> 'Pending'
							);
   				$m_patient->edit($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Patient berhasil tidak dipublikasikan');
		}elseif($submit=='Delete') {
			for($i=0; $i < sizeof($patient_id);$i++) {
				$data = array(	'patient_id'	=> $patient_id[$i]);
   				$m_patient->delete($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// edit
	public function edit($patient_id)
	{
		$this->simple_login->checklogin();
		$m_patient 			= new Patient_model();
		$patient 			= $m_patient->detail($patient_id);
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'first_name' 				=> [	'rules'  	=> 'required',
								            'errors' 	=> [
								                'required' 	=> 'First name can not be empty'
								            ]
								        ],
				'last_name' 			=> [	'rules'  	=> 'required',
								            'errors' 	=> [
								                'required' 	=> 'Last name can not be empty.'
								            ]
								        ],
				
            	'date_of_birth' 	=> [	'rules'  	=> 'required',
								            'errors' 	=> [
								                'required' 	=> 'Date of birth can not be empty'
								            ]
								        ]
        	])) {
			// masuk database
			$data = [	'patient_id'		=> $patient_id,
						'first_name'		=> $this->request->getPost('first_name'),
						'last_name'			=> $this->request->getPost('last_name'),
						'full_name'			=> $this->request->getPost('first_name').' '.$this->request->getPost('last_name'),
						'email'				=> $this->request->getPost('email'),
						'id_card_number'	=> $this->request->getPost('id_card_number'),
						'phone_number'		=> $this->request->getPost('phone_number'),
						'date_of_birth'		=> $this->request->getPost('date_of_birth'),
						'gender'			=> $this->request->getPost('gender'),
						'home_address'		=> $this->request->getPost('home_address'),
						'ip_address'		=> $this->request->getIPAddress(),
						
					];
			$m_patient->edit($data);
			
            return redirect()->to(base_url('admin/patient'))->with('sukses', 'Your profile updated successfully.');
			// masuk database
	    }else{
			$data = [	'title'				=> 'Edit Patient: '.$patient->full_name,
						'patient'			=> $patient,
						'content'			=> 'admin/patient/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// Delete
	public function delete($patient_id)
	{
		$this->simple_login->checklogin();
		$m_patient = new Patient_model();
		$data = ['patient_id'	=> $patient_id];
		$m_patient->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/patient'));
	}
}