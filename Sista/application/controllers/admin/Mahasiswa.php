    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct(){
                parent::__construct();
                $this->load->model('mhs_model');
                $this->load->model('dosen_model');
                $this->load->model('seminar_model');
                $this->load->model('sidang_model');
    }

    public function index(){
        $mahasiswa = $this->mhs_model->listing();
        $dosen1 = $this->dosen_model->list_dospem1();
        $dosen2= $this->dosen_model->list_dospem2();
        $data = array(  'title'     => 'Data Mahasiswa Tugas Akhir',
                        'mahasiswa' => $mahasiswa,
                        'dosen1'     => $dosen1,
                        'dosen2'     => $dosen2,
                        'isi'       => 'admin/mahasiswa/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function edit($id_mhs){
        $mahasiswa = $this->mhs_model->detail($id_mhs);
        $dosen1 = $this->dosen_model->list_dospem1();
        $dosen2 = $this->dosen_model->list_dospem2();

            $i    = $this->input;
            $data = array(  'id_mhs'          => $id_mhs,
                            'id_dospem1'      => $i->post('dospem1'),
                            'id_dospem2'      => $i->post('dospem2'),
                            );
            $this->mhs_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/mahasiswa'));

    }
}