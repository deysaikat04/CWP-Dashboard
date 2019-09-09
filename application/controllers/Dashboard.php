<?php
/**
 * Created by PhpStorm.
 * User: Saikat Dey
 * Date: 30-10-2017
 * Time: 11:52 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('DashboardModel');
    }
		
    public function page($page = 'Stats')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            if (!file_exists(APPPATH . 'views/partial/' . $page . '.php')) {
                show_404();
            }
            if ($page === 'Portfolio') {
                $data['images'] = $this->DashboardModel->getPortfolioImages();
            } elseif ($page === 'Videos'){
                $data['videos'] = $this->DashboardModel->getVideos();
            } elseif ($page === 'ViewAlbum'){
                $data['allAlbum']=$this->DashboardModel->getallAlbum();
            } 
            $data['page'] = 'partial/' . $page;
            $this->load->view('common/Dashboard', $data);
        }
    }

    public function EditFilm($id = null)
    {
        if($id == null) {
            show_404();
        }
        $data['video'] = $this->DashboardModel->getVideo($id);
        if ($data['video']) {
            $data['page'] = 'partial/EditFilm';
            $this->load->view('common/Dashboard', $data);
        } else {
            show_404();
        }

    }
    public function EditAlbum($id = null)
    {
        if($id == null) {
            show_404();
        }
        $data['album'] = $this->DashboardModel->getAlbumDetailsbyId($id);
        $data['coverImage'] = $this->DashboardModel->getAlbumCoverImagesbyId($id);
        $data['count'] = $this->DashboardModel->imagecount($id);
        $data['albumImage'] = $this->DashboardModel->getAlbumImagesbyId($id);
        if ($data['album']) {
            $data['page'] = 'partial/EditAlbum';
            $this->load->view('common/Dashboard', $data);
        } else {
            show_404();
        }

    }
    public function updateAlbumDetail($id){
        $this->load->model('DashboardModel');
        $this->form_validation->set_rules('albumName', 'Name of the Album', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('toc', 'toc', 'trim|required');
        $toc = $this->input->post('toc');

        $albumFormData = array(
            'id' =>  $id,
            'title' => $this->input->post('albumName'),
            'category' => $this->input->post('category'),
            'toc' => $toc,
            'tou' => date('Y-m-d H:i:s')
        );
        if ($this->form_validation->run() == FALSE) {
            $valERR = validation_errors();
            $this->session->set_flashdata('updateAlbumErr', $valERR);
            redirect(base_url() . 'Dashboard/page/AddAlbum');
        } else {
            $isUploaded = $this->DashboardModel->updateAlbum($albumFormData);
            if ($isUploaded) {
                $this->session->set_flashdata('updateAlbumSucc', "Record has been Updated.");
                header("Location: " . base_url('Dashboard/EditAlbum/'.$albumFormData['id']));
            } else {
                $this->session->set_flashdata('updateAlbumErr', "We couldn't update the record.");
                header("Location: " . base_url('Dashboard/EditAlbum/'.$albumFormData['id']));
            }
        }
    }
}