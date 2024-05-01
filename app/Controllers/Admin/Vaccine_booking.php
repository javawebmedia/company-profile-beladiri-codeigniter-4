<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;

use App\Models\Patient_model;
use App\Models\Vaccine_location_model;
use App\Models\Vaccine_type_model;
use App\Models\Vaccine_booking_model;

class Vaccine_booking extends BaseController
{
	public function index()
	{
		$this->simple_login->checklogin();

		$m_vaccine_booking 	= new Vaccine_booking_model();

		// if searching a keyword
		if(isset($_GET['keywords'])) {
			$keywords 			= $this->request->getVar('keywords');
			$vaccine_booking 	= $m_vaccine_booking->listing_search($keywords);
			$total 				= $m_vaccine_booking->total_search($keywords);
			$totalnya 			= $total;
		}else{
			$vaccine_booking 	= $m_vaccine_booking->listing();
			$total 				= $m_vaccine_booking->total();
			$totalnya 			= $total->total;
		}
		// end searching

		

		$data = [   'title'     		=> 'Vaccine Booking Data ('.$totalnya.')',
					'vaccine_booking'	=> $vaccine_booking,
					'content'			=> 'admin/vaccine_booking/index'
                ];
        return view('admin/layout/wrapper',$data);
	}

	// detail
	public function detail($vaccine_booking_code)
	{
		$this->simple_login->checklogin();

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
					'content'			=> 'admin/vaccine_booking/detail'
                ];
        return view('admin/layout/wrapper',$data);
	}

	// proses
	public function proses()
	{
		$this->simple_login->checklogin();

		$m_vaccine_booking 		= new Vaccine_booking_model();
		$pengalihan		 		= $this->request->getVar('pengalihan');
		$vaccine_booking_id 	= $this->request->getVar('vaccine_booking_id');
		$submit 				= $this->request->getVar('submit');

		if(empty($vaccine_booking_id)) {
			return redirect()->to($pengalihan)->with('warning', 'Please choose at least one of data.');
		}

		if($submit=='Update') {
   			for($i=0; $i < sizeof($vaccine_booking_id);$i++) {
				$data = array(	'vaccine_booking_id'	=> $vaccine_booking_id[$i],
								'id_user'				=> $this->session->get('id_user'),
								'vaccine_booking_status'=> $this->request->getVar('vaccine_booking_status'),
								'vaccine_date'			=> date('Y-m-d',strtotime($this->request->getVar('vaccine_date')))
							);
   				$m_vaccine_booking->edit($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Vaccine booking status updated successfully');
		}elseif($submit=='Delete') {
			for($i=0; $i < sizeof($vaccine_booking_id);$i++) {
				$data = array(	'vaccine_booking_id'	=> $vaccine_booking_id[$i]);
   				$m_vaccine_booking->delete($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Vaccine booking deleted successfully');
		}
	}
}