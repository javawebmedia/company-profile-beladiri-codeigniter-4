<?php 
namespace App\Controllers\Patient;

use CodeIgniter\Controller;

class Pembayaran extends BaseController
{
	// index
	public function index()
	{
		$this->simple_login->checklogin_patient();
		$data = [   'title'     	=> 'Data Pembayaran',
					'description'   => 'Data Pembayaran',
                    'keywords'      => 'Data Pembayaran',
					'content'		=> 'patient/pembayaran/index'
                ];
        return view('patient/layout/wrapper',$data);
	}

	// konfirmasi
	public function konfirmasi()
	{
		$this->simple_login->checklogin_patient();
		$data = [   'title'     	=> 'Konfirmasi Pembayaran',
					'description'   => 'Konfirmasi Pembayaran',
                    'keywords'      => 'Konfirmasi Pembayaran',
					'content'		=> 'patient/pembayaran/konfirmasi'
                ];
        return view('patient/layout/wrapper',$data);
	}
}