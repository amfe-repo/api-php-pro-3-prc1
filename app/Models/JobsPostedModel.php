<?php

namespace App\Models;

use CodeIgniter\Model;

class JobsPostedModel extends Model
{

    protected $table = 'JobsPosted';
    protected $primaryKey = 'IdJob';

    protected $returnType = 'array';
    protected $allowedFields = ['Description', 'IdSchedule', 'Position', 'UrlWebSite', 'Ubication', 'IdBussiness', 'IdCategory'];

    protected $validationRules = [
        'Description' => 'required|min_length[3]|max_length[120]',
        'Position' => 'required|min_length[3]|max_length[40]',
        'UrlWebSite' => 'required|valid_email|min_length[3]|max_length[80]',
        'Ubication' => 'required|min_length[3]|max_length[40]'
    ];

    protected $validationMessage = [
        'Description' => [
            'valid_description' => 'Debe ingresar un descripcion'
        ]

    ];

    protected $skipValidation = false;

    public function jobsWithInfo($id = null)
    {
        $tableBuilder = $this->db->table($this->table);
        $tableBuilder->select("JobsPosted.idJob, JobsPosted.Description, ScheduleJob.Schedule AS ScheduleJob, JobsPosted.Position, JobsPosted.UrlWebSite, JobsPosted.Ubication, Bussiness.Name AS Bussiness, Bussiness.Description AS BussinessDescription, Bussiness.EmailToReply AS BussinessEmail, Categories.Name AS Category");

        $tableBuilder->join('ScheduleJob', 'ScheduleJob.IdSchedule = JobsPosted.IdSchedule');
        $tableBuilder->join('Bussiness', 'Bussiness.IdBussiness = JobsPosted.IdBussiness');
        $tableBuilder->join('Categories', 'Categories.IdCategory = JobsPosted.IdCategory');

        if($id != null)
            $tableBuilder->where('JobsPosted.idJob', $id);

        $query = $tableBuilder->get();
        return $query->getResult();
    }
}

?>