<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_sekretaris_pkk();
        $this->load->model('Event_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'event_data' => $this->Event_model->get_all(),
        );
        $this->template->load('template','event/event_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Event_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_event' => $row->id_event,
                'nama_event' => $row->nama_event,
                'tanggal' => $row->tanggal,
                'tempat' => $row->tempat,
                'foto' => $row->foto,
                'keterangan' => $row->keterangan,
            );
            $this->template->load('template','event/event_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('event'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('event/create_action'),
            'id_event' => set_value('id_event'),
            'nama_event' => set_value('nama_event'),
            'tanggal' => date('Y-m-d H:i'),
            'tempat' => set_value('tempat'),
            'foto' => set_value('foto'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template','event/event_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']      = './uploads/event/';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $ext                        = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $foto                       = time().".".$ext;
                $config['file_name']        = $foto;
                $config['file_size']        = $_FILES['foto']['size']/1028;
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('foto')) {
                    $uploadData = $this->upload->data();
                    // Compress Image 
                    $config['image_library']    ='gd2';
                    $config['source_image']     ='./uploads/event/'.$uploadData['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = FALSE;
                    $config['overwrite']        = TRUE;
                    $config['quality']          = '50%';
                    $config['width']            = 384;
                    $config['height']           = 215;
                    $config['new_image']        = './uploads/event/thumb_'.$uploadData['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    // End Compress Image
                    $extension = pathinfo($uploadData['file_name'] , PATHINFO_EXTENSION);
                    $extension = ".".$extension;
                    $data = array(
                        'nama_event' => $this->input->post('nama_event',TRUE),
                        'tanggal' => $this->input->post('tanggal',TRUE),
                        'tempat' => $this->input->post('tempat',TRUE),
                        'foto' => $uploadData['file_name'],
                        'keterangan' => $this->input->post('keterangan',TRUE),
                        'id_pengguna' => $this->session->userdata('id_pengguna'),
                        'status_event' => 'aktif',
                    );
                    $this->Event_model->insert($data);
                    $this->session->set_flashdata('message', 'Berhasil Tambah Data');
                    redirect(site_url('event'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah Foto');
                    redirect(site_url('event/create'));
                }
            } else {
                $data = array(
                    'nama_event' => $this->input->post('nama_event',TRUE),
                    'tanggal' => $this->input->post('tanggal',TRUE),
                    'tempat' => $this->input->post('tempat',TRUE),
                    'keterangan' => $this->input->post('keterangan',TRUE),
                );

                $this->Event_model->insert($data);
                $this->session->set_flashdata('message', 'Berhasil Tambah Data');
                redirect(site_url('event'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Event_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('event/update_action'),
                'id_event' => set_value('id_event', $row->id_event),
                'nama_event' => set_value('nama_event', $row->nama_event),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'tempat' => set_value('tempat', $row->tempat),
                'foto' => set_value('foto', $row->foto),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->template->load('template','event/event_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('event'));
        }
    }
	
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_event', TRUE));
        } else {
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']      = './uploads/event/';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $ext                        = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $foto                       = time().".".$ext;
                $config['file_name']        = $foto;
                $config['file_size']        = $_FILES['foto']['size']/1028;
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('foto')) {
                    $path= './uploads/event/';
                    $foto = $this->input->post('foto_old',TRUE);
                    if (!empty($foto)) {
                        @unlink($path.$foto);
                        @unlink($path."thumb_".$foto);
                    }
                    $uploadData = $this->upload->data();
                    // Compress Image 
                    $config['image_library']    ='gd2';
                    $config['source_image']     ='./uploads/event/'.$uploadData['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = FALSE;
                    $config['overwrite']        = TRUE;
                    $config['quality']          = '50%';
                    $config['width']            = 384;
                    $config['height']           = 215;
                    $config['new_image']        = './uploads/event/thumb_'.$uploadData['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    // End Compress Image
                    $extension = pathinfo($uploadData['file_name'] , PATHINFO_EXTENSION);
                    $extension = ".".$extension;
                    $data = array(
                        'nama_event' => $this->input->post('nama_event',TRUE),
                        'tanggal' => $this->input->post('tanggal',TRUE),
                        'tempat' => $this->input->post('tempat',TRUE),
                        'foto' => $uploadData['file_name'],
                        'keterangan' => $this->input->post('keterangan',TRUE),
                        'id_pengguna' => $this->session->userdata('id_pengguna'),
                    );
                    $this->Event_model->update($this->input->post('id_event', TRUE), $data);
                    $this->session->set_flashdata('message', 'Berhasil Edit Data');
                    redirect(site_url('event'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah Foto');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $data = array(
                    'nama_event' => $this->input->post('nama_event',TRUE),
                    'tanggal' => $this->input->post('tanggal',TRUE),
                    'tempat' => $this->input->post('tempat',TRUE),
                    'keterangan' => $this->input->post('keterangan',TRUE),
                    'id_pengguna' => $this->session->userdata('id_pengguna'),
                );

                $this->Event_model->update($this->input->post('id_event', TRUE), $data);
                $this->session->set_flashdata('message', 'Berhasil Edit Data');
                redirect(site_url('event'));
            }
        }
    }
    
    public function nonaktif($id) 
    {
        $row = $this->Event_model->get_by_id($id);
        if ($row) {
            $this->Event_model->nonaktif($id);
            $this->session->set_flashdata('message', 'Berhasil Nonaktifkan Data');
            redirect(site_url('event'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('event'));
        }
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('nama_event', 'nama event', 'trim|required');
      $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
      $this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
      $this->form_validation->set_rules('foto', 'foto', 'trim');
      $this->form_validation->set_rules('keterangan', 'keterangan', 'trim');

      $this->form_validation->set_rules('id_event', 'id_event', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}

/* End of file Event.php */
/* Location: ./application/controllers/Event.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2019-03-14 09:37:49 */
