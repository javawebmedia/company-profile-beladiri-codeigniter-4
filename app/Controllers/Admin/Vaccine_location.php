<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Vaccine_location_model;

class Vaccine_location extends BaseController
{

	// mainpage
	public function index()
	{
		$this->simple_login->checklogin();
		$m_vaccine_location = new Vaccine_location_model();
		$vaccine_location 	= $m_vaccine_location->listing();
		$total 		= $m_vaccine_location->total();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'vaccine_location_name' 	=> 'required|min_length[3]|is_unique[vaccine_location.vaccine_location_name]',
        	])) {
			// masuk database
			
			$data = [	'id_user'					=> $this->session->get('id_user'),
						'vaccine_location_name'			=> $this->request->getPost('vaccine_location_name'),
						'vaccine_location_address'		=> $this->request->getPost('vaccine_location_address'),
						'google_map'					=> $this->request->getPost('google_map'),
						'vaccine_location_status'		=> $this->request->getPost('vaccine_location_status'),
						'vaccine_location_description'	=> $this->request->getPost('vaccine_location_description'),
						'date_created'				=> date('Y-m-d H:i:s')
					];
			$m_vaccine_location->tambah($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/vaccine_location'));
	    }else{
			$data = [	'title'			=> 'Vaccine Location: '.$total->total,
						'vaccine_location'		=> $vaccine_location,
						'content'		=> 'admin/vaccine_location/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($vaccine_location_id)
	{
		$this->simple_login->checklogin();
		$m_vaccine_location = new Vaccine_location_model();
		$vaccine_location 	= $m_vaccine_location->detail($vaccine_location_id);
		$total 		= $m_vaccine_location->total();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'vaccine_location_name' 	=> 'required|min_length[3]',
        	])) {
			// masuk database
			$data = [	'vaccine_location_id'	=> $vaccine_location_id,
						'id_user'					=> $this->session->get('id_user'),
						'vaccine_location_name'			=> $this->request->getPost('vaccine_location_name'),
						'vaccine_location_address'		=> $this->request->getPost('vaccine_location_address'),
						'google_map'					=> $this->request->getPost('google_map'),
						'vaccine_location_status'		=> $this->request->getPost('vaccine_location_status'),
						'vaccine_location_description'	=> $this->request->getPost('vaccine_location_description'),
					];
			$m_vaccine_location->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/vaccine_location'));
	    }else{
			$data = [	'title'			=> 'Edit Vaccine Location: '.$vaccine_location->vaccine_location_name,
						'vaccine_location'		=> $vaccine_location,
						'content'		=> 'admin/vaccine_location/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($vaccine_location_id)
	{
		$this->simple_login->checklogin();
		$m_vaccine_location = new Vaccine_location_model();
		$data = ['vaccine_location_id'	=> $vaccine_location_id];
		$m_vaccine_location->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/vaccine_location'));
	}
}