<?php 
namespace App\Models;

use CodeIgniter\Model;

class Patient_model extends Model
{

   public function __construct()
    {
        parent::__construct();
        $this->db       = \Config\Database::connect();
    }

    protected $table = 'patient';
    protected $primaryKey = 'patient_id';
    protected $allowedFields = ['*'];

    // listing
    public function listing()
    {
        $builder = $this->db->table('patient');
        $builder->select('*');
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // paginasi_admin
    public function paginasi_admin($limit,$start)
    {
        $builder = $this->db->table('patient');
        $builder->select('*');
        $builder->limit($limit,$start);
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // paginasi_admin_cari
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $builder = $this->db->table('patient');
        $builder->select('*');

        $builder->like('first_name',$keywords,'BOTH');
        $builder->orLike('last_name',$keywords,'BOTH');
        $builder->orLike('full_name',$keywords,'BOTH');
        $builder->orLike('email',$keywords,'BOTH');
        $builder->orLike('id_card_number',$keywords,'BOTH');
        $builder->orLike('date_of_birth',$keywords,'BOTH');

        $builder->limit($limit,$start);
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total_cari
    public function total_cari($keywords)
    {
        $builder = $this->db->table('patient');
        $builder->select('*');

        $builder->like('first_name',$keywords,'BOTH');
        $builder->orLike('last_name',$keywords,'BOTH');
        $builder->orLike('full_name',$keywords,'BOTH');
        $builder->orLike('email',$keywords,'BOTH');
        $builder->orLike('id_card_number',$keywords,'BOTH');
        $builder->orLike('date_of_birth',$keywords,'BOTH');
        
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // cari
    public function cari($keywords='')
    {
        $builder = $this->db->table('patient');
        $builder->select('*');
        if($keywords=='') {}else{
            $builder->like('nama_patient',$keywords,'BOTH');
        }
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('patient');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($patient_id)
    {
        $builder = $this->db->table('patient');
        $builder->where('patient_id',$patient_id);
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // email
    public function email($email)
    {
        $builder = $this->db->table('patient');
        $builder->where('email',$email);
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // login
    public function login($email,$password)
    {
        $builder = $this->db->table('patient');
        $builder->where('email',$email);
        $builder->where('password',sha1($password));
        $builder->orderBy('patient.patient_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('patient');
        $builder->where('patient_id',$data['patient_id']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('patient');
        $builder->insert($data);
    }

    // tambah  log
    public function patient_log($data)
    {
        $builder = $this->db->table('patient_logs');
        $builder->insert($data);
    }
}