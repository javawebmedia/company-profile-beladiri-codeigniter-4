<?php 
namespace App\Models;

use CodeIgniter\Model;

class Vaccine_booking_model extends Model
{

   public function __construct()
    {
        parent::__construct();
        $this->db       = \Config\Database::connect();
    }

    protected $table = 'vaccine_booking';
    protected $primaryKey = 'vaccine_booking_id';
    protected $allowedFields = ['*'];

    // listing
    public function listing()
    {
        $builder = $this->db->table('vaccine_booking');
        // select
        $builder->select('vaccine_booking.*, 
                        vaccine_type.vaccine_type_name, 
                        vaccine_location.vaccine_location_name,
                        patient.full_name,
                        patient.id_card_number');
        // join
        $builder->join('vaccine_type','vaccine_type.vaccine_type_id = vaccine_booking.vaccine_type_id','LEFT');
        $builder->join('vaccine_location','vaccine_location.vaccine_location_id = vaccine_booking.vaccine_location_id','LEFT');
        $builder->join('patient','patient.patient_id = vaccine_booking.patient_id','LEFT');
        // join
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // listing_search
    public function listing_search($keywords)
    {
        $builder = $this->db->table('vaccine_booking');
        // select
        $builder->select('vaccine_booking.*, 
                        vaccine_type.vaccine_type_name, 
                        vaccine_location.vaccine_location_name,
                        patient.full_name,
                        patient.id_card_number');
        // join
        $builder->join('vaccine_type','vaccine_type.vaccine_type_id = vaccine_booking.vaccine_type_id','LEFT');
        $builder->join('vaccine_location','vaccine_location.vaccine_location_id = vaccine_booking.vaccine_location_id','LEFT');
        $builder->join('patient','patient.patient_id = vaccine_booking.patient_id','LEFT');
        // join
        $builder->like('vaccine_booking.vaccine_booking_code',$keywords,'BOTH');
        $builder->orLike('vaccine_location.vaccine_location_name',$keywords,'BOTH');
        $builder->orLike('vaccine_type.vaccine_type_name',$keywords,'BOTH');
        $builder->orLike('patient.full_name',$keywords,'BOTH');
        $builder->orLike('patient.first_name',$keywords,'BOTH');
        $builder->orLike('patient.last_name',$keywords,'BOTH');
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total_search
    public function total_search($keywords)
    {
        $builder = $this->db->table('vaccine_booking');
        // select
        $builder->select('vaccine_booking.*, 
                        vaccine_type.vaccine_type_name, 
                        vaccine_location.vaccine_location_name,
                        patient.full_name,
                        patient.id_card_number');
        // join
        $builder->join('vaccine_type','vaccine_type.vaccine_type_id = vaccine_booking.vaccine_type_id','LEFT');
        $builder->join('vaccine_location','vaccine_location.vaccine_location_id = vaccine_booking.vaccine_location_id','LEFT');
        $builder->join('patient','patient.patient_id = vaccine_booking.patient_id','LEFT');
        // join
        $builder->like('vaccine_booking.vaccine_booking_code',$keywords,'BOTH');
        $builder->orLike('vaccine_location.vaccine_location_name',$keywords,'BOTH');
        $builder->orLike('vaccine_type.vaccine_type_name',$keywords,'BOTH');
        $builder->orLike('patient.full_name',$keywords,'BOTH');
        $builder->orLike('patient.first_name',$keywords,'BOTH');
        $builder->orLike('patient.last_name',$keywords,'BOTH');
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // patient
    public function patient($patient_id)
    {
        $builder = $this->db->table('vaccine_booking');
        // select
        $builder->select('vaccine_booking.*, 
                        vaccine_type.vaccine_type_name, 
                        vaccine_location.vaccine_location_name,
                        patient.full_name,
                        patient.id_card_number');
        // join
        $builder->join('vaccine_type','vaccine_type.vaccine_type_id = vaccine_booking.vaccine_type_id','LEFT');
        $builder->join('vaccine_location','vaccine_location.vaccine_location_id = vaccine_booking.vaccine_location_id','LEFT');
        $builder->join('patient','patient.patient_id = vaccine_booking.patient_id','LEFT');
        // join
        $builder->where('vaccine_booking.patient_id',$patient_id);
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // vaccine_booking_status
    public function vaccine_booking_status($patient_id, $vaccine_booking_status)
    {
        $builder = $this->db->table('vaccine_booking');
        // select
        $builder->select('vaccine_booking.*, 
                        vaccine_type.vaccine_type_name, 
                        vaccine_location.vaccine_location_name,
                        patient.full_name,
                        patient.id_card_number');
        // join
        $builder->join('vaccine_type','vaccine_type.vaccine_type_id = vaccine_booking.vaccine_type_id','LEFT');
        $builder->join('vaccine_location','vaccine_location.vaccine_location_id = vaccine_booking.vaccine_location_id','LEFT');
        $builder->join('patient','patient.patient_id = vaccine_booking.patient_id','LEFT');
        // join
        $builder->where('vaccine_booking.patient_id',$patient_id);
        $builder->where('vaccine_booking.vaccine_booking_status',$vaccine_booking_status);
        
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('vaccine_booking');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($vaccine_booking_id)
    {
        $builder = $this->db->table('vaccine_booking');
        $builder->where('vaccine_booking_id',$vaccine_booking_id);
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // vaccine_booking_code
    public function vaccine_booking_code($vaccine_booking_code)
    {
        $builder = $this->db->table('vaccine_booking');

        $builder->select('vaccine_booking.*, 
                        patient.first_name, 
                        patient.full_name, 
                        patient.last_name, 
                        patient.id_card_number,
                        patient.date_of_birth,
                        vaccine_type.vaccine_type_name,
                        vaccine_location.vaccine_location_name
                    ');
        $builder->join('patient','patient.patient_id = vaccine_booking.patient_id','LEFT');
        $builder->join('vaccine_type','vaccine_type.vaccine_type_id = vaccine_booking.vaccine_type_id','LEFT');
        $builder->join('vaccine_location','vaccine_location.vaccine_location_id = vaccine_booking.vaccine_location_id','LEFT');

        $builder->where('vaccine_booking_code',$vaccine_booking_code);
        $builder->orderBy('vaccine_booking.vaccine_booking_id','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('vaccine_booking');
        $builder->where('vaccine_booking_id',$data['vaccine_booking_id']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('vaccine_booking');
        $builder->insert($data);
    }

    // tambah  log
    public function vaccine_booking_log($data)
    {
        $builder = $this->db->table('vaccine_booking_logs');
        $builder->insert($data);
    }
}