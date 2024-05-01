<?php 
namespace App\Controllers\Patient;

use CodeIgniter\Controller;
use App\Models\Patient_model;

class Akun extends BaseController
{
	public function index()
	{
		$this->simple_login->checklogin_patient();

		$patient_id 	= $this->session->get('patient_id');
		$m_patient 		= new Patient_model();
		$patient 		= $m_patient->detail($patient_id);

		$data = [   'title'     	=> 'My Account',
					'description'   => 'My Account',
                    'keywords'      => 'My Account',
                    'patient'		=> $patient,
					'content'		=> 'patient/akun/index'
                ];
        return view('patient/layout/wrapper',$data);
	}

	// edit
	public function edit()
	{
		$m_patient 		= new Patient_model();
		$patient_id 	= $this->session->get('patient_id');
		$patient 		= $m_patient->detail($patient_id);

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
			
            return redirect()->to(base_url('patient/akun/edit'))->with('sukses', 'Your profile updated successfully.');
			// masuk database
	    }else{
			$data = [	'title'			=> 'Update Profile',
						'description'	=> 'Update Profile',
						'keywords'		=> 'Update Profile',
						'patient'		=> $patient,
						'content'		=> 'patient/akun/edit'
					];
			return view('patient/layout/wrapper',$data);
		}
		// End proses
	}

	// password
	public function password()
	{
		$m_patient 		= new Patient_model();
		$patient_id 	= $this->session->get('patient_id');
		$patient 		= $m_patient->detail($patient_id);

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'password' 				=> [	'rules'  	=> 'required|min_length[6]|max_length[32]',
								            'errors' 	=> [
								                'required' 		=> 'Password name can not be empty',
								                'min_length'	=> 'Password at least 6 characters',
								                'max_length'	=> 'Password maximum 32 characters'
								            ]
								        ],
            	'password_confirmation' 	=> [	'rules'  	=> 'required|matches[password]',
								            'errors' 	=> [
								                'required' 	=> 'Password confirmation can not be empty',
								                'matches' 	=> 'Password is not same. Please type same passsword!'
								            ]
								        ]
        	])) {
			// masuk database
			$data = [	'patient_id'	=> $patient_id,
						'password'		=> sha1($this->request->getPost('password')),
						'ip_address'	=> $this->request->getIPAddress(),
					];
			$m_patient->edit($data);
            return redirect()->to(base_url('patient/akun/edit'))->with('sukses', 'Your profile updated successfully.');
			// masuk database
	    }else{
			$data = [	'title'			=> 'Change Password',
						'description'	=> 'Change Password',
						'keywords'		=> 'Change Password',
						'patient'		=> $patient,
						'content'		=> 'patient/akun/password'
					];
			return view('patient/layout/wrapper',$data);
		}
		// End proses
	}
}