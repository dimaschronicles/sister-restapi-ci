<?php

class MahasiswaController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MahasiswaModel');
  }

  public function response($data)
  {
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data))
      ->_display();
    exit;
  }

  public function get_mahasiswa()
  {
    $data = $this->MahasiswaModel->get_mahasiswa();

    // success
    return $this->response([
      "error" => false,
      "message" => "Data tersedia",
      "mahasiswa" => $data
    ]);
  }

  public function insert_mahasiswa()
  {
    $arrayData = [
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'kelas' => $this->input->post('kelas'),
      'jurusan' => $this->input->post('jurusan')
    ];

    $data = $this->MahasiswaModel->insert_mahasiswa($arrayData);

    // if error
    if ($data === false) {
      return $this->response([
        "error" => true,
        "message" => "Gagal menambahkan data"
      ]);
    }

    // if success
    return $this->response([
      "error" => false,
      "message" => "Berhasil menambahkan data"
    ]);
  }

  public function update_mahasiswa()
  {
    $arrayId = ["id" => $this->input->post('id')];
    $arrayData = [
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'kelas' => $this->input->post('kelas'),
      'jurusan' => $this->input->post('jurusan')
    ];

    $data = $this->MahasiswaModel->update_mahasiswa($arrayId, $arrayData);

    // if error
    if ($data === false) {
      return $this->response([
        "error" => true,
        "message" => "Gagal memperbaharui data"
      ]);
    }

    // if success
    return $this->response([
      "error" => false,
      "message" => "Berhasil memperbaharui data"
    ]);
  }

  public function delete_mahasiswa()
  {
    $arrayId = ["id" => $this->input->post('id')];
    $data = $this->MahasiswaModel->delete_mahasiswa($arrayId);

    // if error
    if ($data === false) {
      return $this->response([
        "error" => true,
        "message" => "Gagal menghapus data"
      ]);
    }

    // if success
    return $this->response([
      "error" => false,
      "message" => "Berhasil menghapus data"
    ]);
  }
}
