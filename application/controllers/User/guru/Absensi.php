<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru/m_absensi');
        cek_login_guru();
        cek_jumlah_keluar();
    }
    public function index()
    {
        $nip = $this->session->userdata('nip');

        $querytrabsen = "SELECT * FROM `tr_absen_guru` join absen_guru on absen_guru.id_absen = tr_absen_guru.id_absen 
        WHERE tr_absen_guru.nip=$nip ORDER BY absen_guru.tanggal_berakhir DESC";

        $querytryabsen = "SELECT * FROM `tr_absen_guru` join absen_guru on absen_guru.id_absen = tr_absen_guru.id_absen 
        WHERE tr_absen_guru.nip=$nip";

        $queryabsen = "SELECT *
        FROM absen_guru
        WHERE NOT EXISTS
        (SELECT * FROM tr_absen_guru WHERE absen_guru.id_absen=tr_absen_guru.id_absen and tr_absen_guru.nip=$nip) 
        ORDER BY absen_guru.tanggal_berakhir DESC ";


        $data['title'] = 'Absensi';
        $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['absen'] = $this->db->query($querytrabsen)->result();
        $data['absensi'] = $this->db->query($querytryabsen)->row();
        $data['tanggal'] = $this->db->query($queryabsen)->result();

        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru', $data);
        $this->load->view('users/guru/absensi');
        $this->load->view('users/templates/footer');
        // $this->load->view('auto');
    }

    public function status($id)
    {
        $nip = $this->session->userdata('nip');

        $querytryabsen = "SELECT * FROM `tr_absen_guru` join absen_guru on absen_guru.id_absen = tr_absen_guru.id_absen 
        WHERE tr_absen_guru.nip=$nip ";

        $queryabsen = "SELECT * FROM `absen_guru` WHERE id_absen=$id";

        $data['title'] = 'Abs ensi';
        $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['tampil'] = $this->db->query($queryabsen)->row();
        $data['absensi'] = $this->db->query($querytryabsen)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/aksi_absensi');
        $this->load->view('users/templates/footer');
    }

    public function simpanData()
    {
        $id_absen = $this->input->post('id_absen');
        $nip = $this->input->post('nip');
        $status = $this->input->post('status');

        $data = [
            'id_absen' => $id_absen,
            'nip' => $nip,
            'status' => $status
        ];

        $simpan = $this->m_absensi->insert($data);

        redirect('User/Guru/Absensi', $simpan);
    }
    public function updateData($id)
    {
        $nip = $this->session->userdata('nip');
        // $total = "SELECT COUNT(absen_guru.id_absen) AS id
        // FROM absen_guru
        // WHERE NOT EXISTS
        // (SELECT * FROM tr_absen_guru WHERE absen_guru.id_absen=tr_absen_guru.id_absen and tr_absen_guru.nip=$nip";
        // $tot = $this->db->query($total)->result();
        // $s = 0;
        // foreach ($tot as $a) {
        //     for ($i = 0; $i < $a->id; $i++) {
        // $id_absen = $this->input->post('id_absen' . $i);
        // $status = $this->input->post('status' . $i);

        $data = [
            'id_absen' => $id,
            'nip' => $nip,
            'status' => '4'
        ];

        $simpan = $this->m_absensi->insert($data);


        redirect('User/Guru/Absensi', $simpan);
    }
}
