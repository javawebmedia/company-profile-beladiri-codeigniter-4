<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Konfigurasi_model;
use App\Models\Patient_model;
use App\Models\User_model;
use App\Models\Vaccine_location_model;
use App\Models\Vaccine_type_model;
use App\Models\Vaccine_booking_model;

class Register extends BaseController
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
            return redirect()->to(base_url('register/booking'))->with('sukses', 'Registration success.');
			// masuk database
	    }else{
			$data = [	'title'			=> 'Account Registration',
						'description'	=> 'Account Registration '.$konfigurasi->namaweb.', '.$konfigurasi->tentang,
						'keywords'		=> 'Account Registration '.$konfigurasi->namaweb.', '.$konfigurasi->keywords,
						'session'		=> $session,
						'content'		=> 'register/index'
					];
			echo view('layout/wrapper-2',$data);
		}
		// End proses
	}

	// booking
	public function booking()
	{
		$session 		= \Config\Services::session();
		if(isset($_GET['redirect'])) {
			$this->session->set('pengalihan',$_GET['redirect']);
		}

		// jika belum login maka suruh login
		if($this->session->get('username_patient')=='') {
			return redirect()->to(base_url('signin'))->with('sukses', 'Please login with your account');
		}
		// end jika

		$m_konfigurasi 			= new Konfigurasi_model();
		$m_patient 				= new Patient_model();
		$m_vaccine_location 	= new Vaccine_location_model();
		$m_vaccine_type			= new Vaccine_type_model();
		$m_vaccine_booking 		= new Vaccine_booking_model();

		$konfigurasi 			= $m_konfigurasi->listing();
		$vaccine_type 			= $m_vaccine_type->listing();
		$vaccine_location 		= $m_vaccine_location->listing();
		$patient 				= $m_patient->email($session->get('username_patient'));

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				
            	'vaccine_booking_date' 	=> [	'rules'  	=> 'required',
								            	'errors' 	=> [
									                'required' 	=> 'Vaccine booking date can not be empty'
									            ]
								        ]
        	])) {
			// masuk database
			$vaccine_booking_code = strtoupper(random_string('alnum', 8));

			$data = [	'patient_id'				=> $patient->patient_id,
						'vaccine_type_id'			=> $this->request->getPost('vaccine_type_id'),
						'vaccine_location_id'		=> $this->request->getPost('vaccine_location_id'),
						'vaccine_booking_code'		=> $vaccine_booking_code,
						'vaccine_booking_date'		=> $this->request->getPost('vaccine_booking_date'),
						'vaccine_booking_status'	=> 'Scheduled',
						'description'				=> $this->request->getPost('description'),
						'date_created'				=> date('Y-m-d H:i:s')
					];
			$m_vaccine_booking->tambah($data);
			// end masuk database
            return redirect()->to(base_url('register/success/'.$vaccine_booking_code))->with('sukses', 'Registration success.');
			// masuk database
	    }else{
			$data = [	'title'				=> 'Vaccine Registration Booking',
						'description'		=> 'Vaccine Registration Booking '.$konfigurasi->namaweb.', '.$konfigurasi->tentang,
						'keywords'			=> 'Vaccine Registration Booking '.$konfigurasi->namaweb.', '.$konfigurasi->keywords,
						'session'			=> $session,
						'vaccine_type'		=> $vaccine_type,
						'vaccine_location'	=> $vaccine_location,
						'patient'			=> $patient,
						'content'			=> 'register/booking'
					];
			echo view('layout/wrapper-2',$data);
		}
		// End proses
	}

	// booking success
	public function success($vaccine_booking_code)
	{
		$m_vaccine_booking 	= new Vaccine_booking_model();
		$vaccine_booking 	= $m_vaccine_booking->vaccine_booking_code($vaccine_booking_code);

		$data = [	'title'				=> 'Vaccine Registration Booking Success',
					'description'		=> 'Vaccine Registration Booking Success',
					'keywords'			=> 'Vaccine Registration Booking Success',
					'vaccine_booking'	=> $vaccine_booking,
					'content'			=> 'register/success'
				];
		echo view('layout/wrapper-2',$data);
	}
}


