<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Vaccine_type_model;

class Vaccine_type extends BaseController
{

	// mainpage
	public function index()
	{
		$this->simple_login->checklogin();
		$m_vaccine_type = new Vaccine_type_model();
		$vaccine_type 	= $m_vaccine_type->listing();
		$total 		= $m_vaccine_type->total();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'vaccine_type_name' 	=> 'required|min_length[3]|is_unique[vaccine_type.vaccine_type_name]',
        	])) {
			// masuk database
			
			$data = [	'id_user'					=> $this->session->get('id_user'),
						'vaccine_type_name'			=> $this->request->getPost('vaccine_type_name'),
						'vaccine_type_origin'		=> $this->request->getPost('vaccine_type_origin'),
						'vaccine_type_status'		=> $this->request->getPost('vaccine_type_status'),
						'vaccine_type_description'	=> $this->request->getPost('vaccine_type_description'),
						'date_created'				=> date('Y-m-d H:i:s')
					];
			$m_vaccine_type->tambah($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/vaccine_type'));
	    }else{
			$data = [	'title'			=> 'Vaccine Type: '.$total->total,
						'vaccine_type'		=> $vaccine_type,
						'content'		=> 'admin/vaccine_type/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($vaccine_type_id)
	{
		$this->simple_login->checklogin();
		$m_vaccine_type = new Vaccine_type_model();
		$vaccine_type 	= $m_vaccine_type->detail($vaccine_type_id);
		$total 		= $m_vaccine_type->total();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'vaccine_type_name' 	=> 'required|min_length[3]',
        	])) {
			// masuk database
			$data = [	'vaccine_type_id'	=> $vaccine_type_id,
						'id_user'					=> $this->session->get('id_user'),
						'vaccine_type_name'			=> $this->request->getPost('vaccine_type_name'),
						'vaccine_type_origin'		=> $this->request->getPost('vaccine_type_origin'),
						'vaccine_type_status'		=> $this->request->getPost('vaccine_type_status'),
						'vaccine_type_description'	=> $this->request->getPost('vaccine_type_description'),
					];
			$m_vaccine_type->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/vaccine_type'));
	    }else{
			$data = [	'title'			=> 'Edit Vaccine Type: '.$vaccine_type->vaccine_type_name,
						'vaccine_type'		=> $vaccine_type,
						'content'		=> 'admin/vaccine_type/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($vaccine_type_id)
	{
		$this->simple_login->checklogin();
		$m_vaccine_type = new Vaccine_type_model();
		$data = ['vaccine_type_id'	=> $vaccine_type_id];
		$m_vaccine_type->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/vaccine_type'));
	}
}