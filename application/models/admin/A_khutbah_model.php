<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_khutbah_model extends CI_Model
{
    protected $tblKhutbahCategory = "khutbah_category";

    protected $tblKhutbah = "khutbah";

    protected $tblUstadz = "ustadz";

    public function getKhutbahByJoin($where = null, $orderBy = null)
    {
        $this->db->select(' ustadz.name as nameUstadz,
                            ustadz.image as imageUstadz,
                            category.name as nameCategory,
                            khutbah.date as dateKhutbah,
                            khutbah.id as id');
        $this->db->from($this->tblKhutbah . ' AS khutbah');
        $this->db->join($this->tblUstadz . ' AS ustadz', 'ustadz.id = khutbah.id_ustadz');
        $this->db->join($this->tblKhutbahCategory . ' AS category', 'category.id = khutbah.id_khutbah_category');
        if (isset($where) and !empty($where)) {
            $this->db->where($where[0], $where[1]);
        }
        if (isset($orderBy) and !empty($orderBy)) {
            $this->db->order_by($orderBy, 'asc');
        }

        $result = $this->db->get()->result();
        return $result;
    }


    public function getKhutbahById($id)
    {
        $this->db->select(' ustadz.name as nameUstadz,
        ustadz.image as imageUstadz,
        category.name as nameCategory,
        khutbah.date as dateKhutbah,
        khutbah.title as titleKhutbah,
        khutbah.short_content as contentKhutbah,
        khutbah.id as id');
        $this->db->from($this->tblKhutbah . ' AS khutbah');
        $this->db->join($this->tblUstadz . ' AS ustadz', 'ustadz.id = khutbah.id_ustadz');
        $this->db->join($this->tblKhutbahCategory . ' AS category', 'category.id = khutbah.id_khutbah_category');

        $this->db->where('khutbah.id', $id);
        return $this->db->get()->row();
    }

    public function addCategory()
    {
        $data = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description'),
            "created_date" => date('Y-m-d H:i:s'),
        ];
        $result = $this->db->insert($this->tblKhutbahCategory, $data);
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
