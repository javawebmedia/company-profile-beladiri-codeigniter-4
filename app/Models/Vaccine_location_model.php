<?php 
namespace App\Models;

use CodeIgniter\Model;

class Vaccine_location_model extends Model
{

   public function __construct()
    {
        parent::__construct();
        $this->db       = \Config\Database::connect();
    }

    protected $table = 'vaccine_location';
    protected $primaryKey = 'vaccine_location_id';
    protected $allowedFields = ['*'];

    // listing
    public function listing()
    {
        $builder = $this->db->table('vaccine_location');
        $builder->select('*');
        $builder->orderBy('vaccine_location.vaccine_location_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('vaccine_location');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('vaccine_location.vaccine_location_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($vaccine_location_id)
    {
        $builder = $this->db->table('vaccine_location');
        $builder->where('vaccine_location_id',$vaccine_location_id);
        $builder->orderBy('vaccine_location.vaccine_location_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // read
    public function read($slug_vaccine_location)
    {
        $builder = $this->db->table('vaccine_location');
        $builder->where('slug_vaccine_location',$slug_vaccine_location);
        $builder->orderBy('vaccine_location.vaccine_location_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('vaccine_location');
        $builder->where('vaccine_location_id',$data['vaccine_location_id']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('vaccine_location');
        $builder->insert($data);
    }

    // tambah  log
    public function vaccine_location_log($data)
    {
        $builder = $this->db->table('vaccine_location_logs');
        $builder->insert($data);
    }
}