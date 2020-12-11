<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_khutbah_model extends CI_Model
{
    protected $_tableKhutbahCategory = "khutbah_category";

    protected $tblKhutbah = "khutbah";

    protected $tblUstadz = "ustadz";

    public function getKhutbahByJoin()
    {
        $this->db->select('ustadz.name as nameUstadz,category.name as nameCategory,khutbah.date as dateKhutbah,khutbah.id');
        $this->db->from($this->tblKhutbah . ' AS khutbah');
        $this->db->join($this->tblUstadz . ' AS ustadz', 'ustadz.id = khutbah.id_ustadz');
        $this->db->join($this->_tableKhutbahCategory . ' AS category', 'category.id = khutbah.id_khutbah_category');
        $result = $this->db->get()->result();
        return $result;
    }
    public function addCategory()
    {
        $data = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description'),
            "created_date" => date('Y-m-d H:i:s'),
        ];
        $result = $this->db->insert($this->_tableKhutbahCategory, $data);
        return $result;
    }

    public function postDataCategory($isForUpdate = false)
    {

        if ($isForUpdate) $x = "updated_date";
        else $x = "created_date";

        $data = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description'),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_khutbah_model.php */
