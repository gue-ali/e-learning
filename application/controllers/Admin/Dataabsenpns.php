<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataabsenpns extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('m_dataabsenpns');
    cek_login_admin();
  }

  public function index()
  {
    $queryabsenpns = "SELECT tr_absen_guru.id_absen, tr_absen_guru.nip, golongan.id_gol, guru.nama, tr_absen_guru.status, absen_guru.tanggal_berakhir, golongan.nama_golongan 
    FROM `tr_absen_guru` JOIN absen_guru ON absen_guru.id_absen=tr_absen_guru.id_absen 
    JOIN guru ON guru.nip=tr_absen_guru.nip 
    JOIN golongan ON guru.id_gol=golongan.id_gol WHERE golongan.id_gol = '1'";
    $data['title'] = 'Data Absen Guru PNS';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['absen'] = $this->db->query($queryabsenpns)->result();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/dataabsenpns', $data);
    $this->load->view('admin/templates/footer', $data);
    $this->load->view('auto');
  }

  public function tanggal()
  {
    $tanggal = $this->input->post('tanggal');
    $queryabsenpns = "SELECT tr_absen_guru.id_absen, tr_absen_guru.nip, golongan.id_gol, guru.nama, tr_absen_guru.status, absen_guru.tanggal_berakhir, golongan.nama_golongan 
    FROM `tr_absen_guru` JOIN absen_guru ON absen_guru.id_absen=tr_absen_guru.id_absen 
    JOIN guru ON guru.nip=tr_absen_guru.nip 
    JOIN golongan ON guru.id_gol=golongan.id_gol WHERE golongan.id_gol = '1' and absen_guru.tanggal_berakhir LIKE '%$tanggal%'";
    $data['title'] = 'Data Absen Guru PNS';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['absen'] = $this->db->query($queryabsenpns)->result();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/dataabsenpns1', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function detail($id, $gol)
  {
    $queryabsenpns = "SELECT tr_absen_guru.id_absen, tr_absen_guru.nip, golongan.id_gol, guru.nama, tr_absen_guru.status, absen_guru.tanggal_berakhir, golongan.nama_golongan 
    FROM `tr_absen_guru` JOIN absen_guru ON absen_guru.id_absen=tr_absen_guru.id_absen 
    JOIN guru ON guru.nip=tr_absen_guru.nip 
    JOIN golongan ON guru.id_gol=golongan.id_gol WHERE tr_absen_guru.id_absen = $id AND golongan.id_gol = $gol";
    $data['title'] = 'Detail Data Absen Guru PNS';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['detail'] = $this->db->query($queryabsenpns)->result();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/readdataabsenpns', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_absen', $id)->delete('tr_absen_guru');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
    redirect('Admin/Dataabsenpns');
  }
}
