<?php 
namespace App\Controllers\Patient;
// panggil model database yang digunakan
use App\Models\Patient_model;
use App\Models\Vaccine_location_model;
use App\Models\Vaccine_type_model;
use App\Models\Vaccine_booking_model;

use CodeIgniter\Controller;

class Booking extends BaseController
{
	public function index()
	{
		$this->simple_login->checklogin_patient();

		$patient_id 		= $this->session->get('patient_id');
		$m_patient 			= new Patient_model();
		$m_vaccine_booking	= new Vaccine_booking_model();
		$patient 			= $m_patient->detail($patient_id);
		$vaccine_booking 	= $m_vaccine_booking->patient($patient_id);

		$data = [   'title'     		=> 'Vaccine Booking Schedule',
					'description'   	=> 'Vaccine Booking Schedule',
                    'keywords'      	=> 'Vaccine Booking Schedule',
                    'patient'			=> $patient,
                    'vaccine_booking'	=> $vaccine_booking,
					'content'			=> 'patient/booking/index'
                ];
        return view('patient/layout/wrapper',$data);
	}

	// detail
	public function detail($vaccine_booking_code)
	{
		$this->simple_login->checklogin_patient();

		$patient_id 		= $this->session->get('patient_id');
		$m_patient 			= new Patient_model();
		$m_vaccine_booking	= new Vaccine_booking_model();
		$patient 			= $m_patient->detail($patient_id);
		$vaccine_booking 	= $m_vaccine_booking->vaccine_booking_code($vaccine_booking_code);

		$data = [   'title'     		=> 'Vaccine Booking Detail: '.$vaccine_booking_code,
					'description'   	=> 'Vaccine Booking Detail: '.$vaccine_booking_code,
                    'keywords'      	=> 'Vaccine Booking Detail: '.$vaccine_booking_code,
                    'patient'			=> $patient,
                    'vaccine_booking'	=> $vaccine_booking,
					'content'			=> 'patient/booking/detail'
                ];
        return view('patient/layout/wrapper',$data);
	}

	// history
	public function history()
	{
		$this->simple_login->checklogin_patient();

		$patient_id 				= $this->session->get('patient_id');
		$m_patient 					= new Patient_model();
		$m_vaccine_booking			= new Vaccine_booking_model();
		$patient 					= $m_patient->detail($patient_id);
		$vaccine_booking_status 	= 'Verified';
		$vaccine_booking 			= $m_vaccine_booking->vaccine_booking_status($patient_id,$vaccine_booking_status);

		$data = [   'title'     		=> 'Vaccine History',
					'description'  	 	=> 'Vaccine History',
                    'keywords'      	=> 'Vaccine History',
                    'patient'			=> $patient,
                    'vaccine_booking'	=> $vaccine_booking,
					'content'			=> 'patient/booking/history'
                ];
        return view('patient/layout/wrapper',$data);
	}
}