<?php

class MahasiswaModel extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_mahasiswa()
  {
    $data = $this->db->get('mahasiswa')->result();
    return $data;
  }

  public function insert_mahasiswa($arrayData)
  {
    $data = $this->db->insert('mahasiswa', $arrayData);
    return $data ? true : false;
  }

  public function update_mahasiswa($arrayId, $arrayData)
  {
    $data = $this->db->where($arrayId)->update('mahasiswa', $arrayData);
    return $data ? true : false;
  }

  public function delete_mahasiswa($arrayId)
  {
    $data = $this->db->where($arrayId)->delete('mahasiswa');
    return $data ? true : false;
  }
}
