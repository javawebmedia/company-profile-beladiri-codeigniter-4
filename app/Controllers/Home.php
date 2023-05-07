<?php

namespace App\Controllers;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Berita_model;
use App\Models\Staff_model;


class Home extends BaseController
{
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
       parent::initController($request, $response, $logger);
        $this->konfigurasi_model    = new Konfigurasi_model();
        $this->galeri_model         = new Galeri_model();
        $this->berita_model         = new Berita_model();
        $this->staff_model          = new Staff_model();
    }

    // index
    public function index()
    {
        $site       = $this->konfigurasi_model->listing();
        $galeri     = $this->galeri_model->jenis_galeri_depan('Homepage');
        $popup      = $this->galeri_model->jenis_galeri_depan('Pop Up');
        $keunggulan = $this->berita_model->jenis_publish('Keunggulan');
        $berita     = $this->berita_model->beranda('Berita',6);
        $staff      = $this->staff_model->home(6);

        $data = [   'title'         => $site->namaweb.' | '.$site->tagline,
                    'description'   => $site->deskripsi,
                    'keywords'      => $site->keywords,
                    'site'          => $site,
                    'slider'        => $galeri,
                    'popup'         => $popup,
                    'keunggulan'    => $keunggulan,
                    'berita'        => $berita,
                    'staff'         => $staff,
                    'content'       => 'home/index'
                ];
        return view('layout/wrapper',$data);
    }

    // oops
    public function oops()
    {
        $m_site     = new Konfigurasi_model();
        $site       = $m_site->listing();
        $data = [   'title'         => 'Oops... Mohon Maaf',
                    'description'   => 'Oops... Mohon Maaf',
                    'keywords'      => 'Oops... Mohon Maaf',
                    'site'          => $site,
                    'content'       => 'home/oops'
                ];
        return view('layout/wrapper',$data);
    }

    // welcome
    public function welcome()
    {
        return view('welcome_message');
    }

}
