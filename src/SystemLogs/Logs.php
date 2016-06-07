<?php
namespace SystemLogs;

class Logs
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getLog($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('weg_status_logs');
        return $data = $query->row();
    }

    public function getLogs($id_ref = '', $key = '')
    {
        $this->db->where('id_ref', $id_ref);
        $this->db->where('key', $key);
        $query = $this->db->get('weg_status_logs');
        return $data = $query->result();
    }

    public function getLogsAll($key = '')
    {
        $this->db->where('key', $key);
        $query = $this->db->get('weg_status_logs');
        return $data = $query->result();
    }

    public function setLog($id_ref = '', $key = '', $logs = '', $modifyById = 0)
    {
        $this->db->set('id_ref', $id_ref);
        $this->db->set('key', $key);
        $this->db->set('logs', $logs);
        $this->db->set('created_on', date("Y-m-d H:i:s"));
        $this->db->set('modifier_id', $modifyById);
        $this->db->insert('weg_status_logs');
    }

}
