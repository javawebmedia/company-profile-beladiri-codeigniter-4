<?php 
namespace App\Models;

use CodeIgniter\Model;

class Vaccine_type_model extends Model
{

   public function __construct()
    {
        parent::__construct();
        $this->db       = \Config\Database::connect();
    }

    protected $table = 'vaccine_type';
    protected $primaryKey = 'vaccine_type_id';
    protected $allowedFields = ['*'];

    // listing
    public function listing()
    {
        $builder = $this->db->table('vaccine_type');
        $builder->select('*');
        $builder->orderBy('vaccine_type.vaccine_type_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('vaccine_type');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('vaccine_type.vaccine_type_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($vaccine_type_id)
    {
        $builder = $this->db->table('vaccine_type');
        $builder->where('vaccine_type_id',$vaccine_type_id);
        $builder->orderBy('vaccine_type.vaccine_type_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // read
    public function read($slug_vaccine_type)
    {
        $builder = $this->db->table('vaccine_type');
        $builder->where('slug_vaccine_type',$slug_vaccine_type);
        $builder->orderBy('vaccine_type.vaccine_type_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('vaccine_type');
        $builder->where('vaccine_type_id',$data['vaccine_type_id']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('vaccine_type');
        $builder->insert($data);
    }

    // tambah  log
    public function vaccine_type_log($data)
    {
        $builder = $this->db->table('vaccine_type_logs');
        $builder->insert($data);
    }
}