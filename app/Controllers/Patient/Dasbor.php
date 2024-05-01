<?php 
namespace App\Controllers\Patient;
// panggil model database yang digunakan
use App\Models\Patient_model;
use App\Models\Vaccine_location_model;
use App\Models\Vaccine_type_model;
use App\Models\Vaccine_booking_model;

use CodeIgniter\Controller;

class Dasbor extends BaseController
{
	public function index()
	{
		$this->simple_login->checklogin_patient();

		$patient_id 		= $this->session->get('patient_id');
		$m_patient 			= new Patient_model();
		$m_vaccine_booking	= new Vaccine_booking_model();
		$patient 			= $m_patient->detail($patient_id);
		$vaccine_booking 	= $m_vaccine_booking->patient($patient_id);

		$data = [   'title'     		=> 'Dasbor Pendaftar',
					'description'   	=> 'Dasbor Pendaftar',
                    'keywords'      	=> 'Dasbor Pendaftar',
                    'patient'			=> $patient,
                    'vaccine_booking'	=> $vaccine_booking,
					'content'			=> 'patient/dasbor/index'
                ];
        return view('patient/layout/wrapper',$data);
	}
}