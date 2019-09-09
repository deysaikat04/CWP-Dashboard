<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller
{

    public function addPortfolioImage()
    {
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $valERR = validation_errors();
            $this->session->set_flashdata('portfolioDataInsertFailed', $valERR);
            header("Location: " . base_url('Dashboard/page/Portfolio'));
        }
        $category = $this->input->post('category');
        if (!empty($_FILES['portfolioImage']['name'])) {
            $imageData = $this->uploadMultipleImages($_FILES);
            $portfolioData = $this->getPortfolioData($imageData, $category);
            $this->load->model('DashboardModel');
            $isUploaded = $this->DashboardModel->insertMultipleImages($portfolioData);
            if ($isUploaded == 1) {
                $this->session->set_flashdata('portfolioDataInsertSuccess', "Well that was easy!");
                header("Location: " . base_url('Dashboard/page/Portfolio'));
            } else {
                $this->session->set_flashdata('portfolioDataInsertFailed', "Looks like something is broken!");
                header("Location: " . base_url('Dashboard/page/Portfolio'));
            }
        } else {
            $this->session->set_flashdata('imageNotFound', "Please, select an image to upload.");
            header("Location: " . base_url('Dashboard/page/Portfolio'));
        }
    }

    public function addAlbum()
    {
        $this->load->model('DashboardModel');
        $this->form_validation->set_rules('albumName', 'Name of the Album', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('category', 'category', 'required');
        $albumFormData = array(
            'title' => $this->input->post('albumName'),
            'category' => $this->input->post('category'),
            'toc' => date('Y-m-d H:i:s'),
            'tou' => date('Y-m-d H:i:s')
        );
        if ($this->form_validation->run() == FALSE) {
            $valERR = validation_errors();
            $this->session->set_flashdata('addFromValErr', $valERR);
            redirect(base_url() . 'Dashboard/page/AddAlbum');
        } else {
            if (!empty($_FILES['portfolioImage']['name'])) {
                // Insert form data in table
                $lastInsertedId = $this->DashboardModel->addalbum($albumFormData);
                if ($lastInsertedId) { // if last inserted ID exist
                    $this->session->set_flashdata('addFromSucc', 'Data Added Successfully.');
                    if (!empty($_FILES['coverImage']['name'])) { // second time checking if exists or not
                        $path = 'assets/images/album/' . $lastInsertedId . '/';
                        $dir_exist = true; // flag for checking the directory exist or not
                        if (!is_dir($path)) {
                            mkdir($path, 0777, true);
                            $dir_exist = false; // dir not exist
                        }
                        $config['upload_path'] = $path;
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size'] = '500';
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
											/* checking image resolution */
											$file = $_FILES['coverImage']['tmp_name'];
											list($width, $height) = getimagesize($file);
											if($width != $height){ 
												$message = 'Cover Image resolution is '.$width .' X '.$height;
												$this->session->set_flashdata('coverResErr', $message);
												redirect(base_url() . 'Dashboard/page/AddAlbum');		
											}											
																					
											/*ends*/
                        if (!$this->upload->do_upload('coverImage', FALSE)) {
                            $leadImgUldErr = $this->upload->display_errors();
                            $this->session->set_flashdata('errUploadCoverImg', $leadImgUldErr);
                        } else { // Upload successful
                            $leadUpload_data = $this->upload->data();
                            $image_path = base_url("/assets/images/vcimg/" . $leadUpload_data['raw_name'] . $leadUpload_data['file_ext']);
                            $path = 'assets/images/album/' . $lastInsertedId . '/';
                            $image_path = $path . $leadUpload_data['raw_name'] . $leadUpload_data['file_ext'];
                            $leadImgData = array(
                                "album_id" => $lastInsertedId,
                                "file_name" => $leadUpload_data['file_name'],
                                "is_cover" => 1,
                                "path" => $image_path,
                                "tou" => date('Y-m-d H:i:s'),
                                "toc" => date('Y-m-d H:i:s')
                            );
                            $leadImgInsertd = $this->DashboardModel->insertCoverImage($leadImgData);
                            if (!$leadImgInsertd) {
                                $this->session->set_flashdata('errInsertCoverImg', 'Encountered an Error While Saving Image.');
                                $data['page'] = 'partial/AddAlbum';
                                redirect(base_url() . 'Dashboard/page/AddAlbum');
                            }
                            if (!empty($_FILES['portfolioImage']['name'])) { // If other images exists
                                $files = $_FILES;
                                $dataInfo = array();
                                $cpt = count($_FILES['portfolioImage']['name']);
                                $path = 'assets/images/album/' . $lastInsertedId . '/';
                                for ($i = 0; $i < $cpt; $i++) {
                                    $_FILES['portfolioImage']['name'] = $files['portfolioImage']['name'][$i];
                                    $_FILES['portfolioImage']['type'] = $files['portfolioImage']['type'][$i];
                                    $_FILES['portfolioImage']['tmp_name'] = $files['portfolioImage']['tmp_name'][$i];
                                    $_FILES['portfolioImage']['error'] = $files['portfolioImage']['error'][$i];
                                    $_FILES['portfolioImage']['size'] = $files['portfolioImage']['size'][$i];
                                    $othconfig['upload_path'] = $path;
                                    $othconfig['allowed_types'] = 'jpg|png';
                                    $othconfig['max_size'] = '500';
                                    $othconfig['encrypt_name'] = true;
                                    $this->load->library('upload', $othconfig);
                                    if (!$this->upload->do_upload('portfolioImage')) {
                                        $otherImgUldErr = $this->upload->display_errors();
                                        $this->session->set_flashdata('errAlbumImg', $otherImgUldErr);
                                    } else { // Upload successful
                                        $otherImageData = $this->upload->data();
//                                    $image_path = base_url("/assets/images/vcimg/". $otherImageData['raw_name'].$otherImageData['file_ext']);
                                        $path = 'assets/images/album/' . $lastInsertedId . '/';
                                        $image_path = $path . $otherImageData['file_name'];
                                        $dataInfo = array(
                                            "album_id" => $lastInsertedId,
                                            "file_name" => $otherImageData['file_name'],
                                            "is_cover" => 0,
                                            "path" => $image_path,
                                            "tou" => date('Y-m-d H:i:s'),
                                            "toc" => date('Y-m-d H:i:s')
                                        );

                                        $otherImgUploded = $this->DashboardModel->insertAlbumImages($dataInfo);
                                        if (!$otherImgUploded) {
                                            $this->session->set_flashdata('errAlbumInsertImg', 'Encountered an Error While Saving Images.');
                                        }
                                    }
                                }
                                $this->session->set_flashdata('addAlbumSucc', 'You have successfully added a new Album.');
                                redirect(base_url() . 'Dashboard/page/AddAlbum');
                            }
                        }
                    }
                } else {
                    $this->session->set_flashdata('addAlbumErr', 'Encountered an Error While Saving Data.');
                    redirect(base_url() . 'Dashboard/page/AddAlbum');
                }
            } else {
                $this->session->set_flashdata('cvrImageNotFound', 'You have not selected any image to upload!');
                redirect(base_url() . 'Dashboard/page/AddAlbum');
            }
        }
        redirect(base_url() . 'Dashboard/page/AddAlbum');
    }

    function uploadMultipleImages($files, $album_id = null)
    {
        // portfolio upload
        $_FILES = array();
        $resultObj = array();
        $cpt = count($files['portfolioImage']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['portfolioImage']['name'] = $files['portfolioImage']['name'][$i];
            $_FILES['portfolioImage']['type'] = $files['portfolioImage']['type'][$i];
            $_FILES['portfolioImage']['tmp_name'] = $files['portfolioImage']['tmp_name'][$i];
            $_FILES['portfolioImage']['error'] = $files['portfolioImage']['error'][$i];
            $_FILES['portfolioImage']['size'] = $files['portfolioImage']['size'][$i];

            $otherConfig['upload_path'] = 'assets/images/portfolio/';
            $otherConfig['allowed_types'] = 'jpg|png';
            $otherConfig['max_size'] = '500';
            $otherConfig['encrypt_name'] = true;
            $this->load->library('upload', $otherConfig);

            if (!$this->upload->do_upload('portfolioImage')) {
                $otherImgUldErr = $this->upload->display_errors();
                $this->session->set_flashdata('imageInsertFailed', $otherImgUldErr);
                header("Location: " . base_url('Dashboard/page/Portfolio'));
                die;
            } else {
                $resultObj[$i] = $this->upload->data();
            }
        }

        return $resultObj;
    }

    function getPortfolioData($imageData, $category)
    {
        $imageDataInfo = array();
        $imageCount = count($imageData);
        for ($i = 0; $i < $imageCount; $i++) {
            $image_path = "assets/images/portfolio/" . $imageData[$i]['raw_name'] . $imageData[$i]['file_ext'];
            $imageDataInfo[$i] = array(
                "path" => $image_path,
                "category" => $category,
                "file_name" => $imageData[$i]['file_name'],
                "tou" => date('Y-m-d H:i:s'),
                "toc" => date('Y-m-d H:i:s')
            );
        }
        return $imageDataInfo;
    }

    public function removePortfolioImage($id, $fileName)
    {
        $path = 'assets/images/portfolio/' . $fileName;
        $fileDeleted = $this->removeFile($path);
        if ($fileDeleted) {
            $this->load->model('DashboardModel');
            $isRemoved = $this->DashboardModel->removeImage($id);
            if ($isRemoved) {
                $this->session->set_flashdata('portfolioImageDeleteSuccess', "Image has been removed.");
                header("Location: " . base_url('Dashboard/page/Portfolio'));
            } else {
                $this->session->set_flashdata('portfolioImageDeleteFailed', "We couldn't remove the image.");
                header("Location: " . base_url('Dashboard/page/Portfolio'));
            }
        } else {
            $this->session->set_flashdata('portfolioImageDeleteFailed', "We couldn't remove the image.");
            header("Location: " . base_url('Dashboard/page/Portfolio'));
        }
    }

    function removeFile($path)
    {
        if (unlink($path)) {
            return true;
        } else {
            return false;
        }
    }

    public function addVideo()
    {
        $this->form_validation->set_rules('title', 'Title of the Video', 'trim|required');
        $this->form_validation->set_rules('link', 'Video Link', 'trim|required');
        $this->form_validation->set_rules('details', 'Details', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $valERR = validation_errors();
            $this->session->set_flashdata('filmDataInsertFailed', $valERR);
            header("Location: " . base_url('Dashboard/page/Videos'));
        }
        $title = $this->input->post('title');
        $link = $this->input->post('link');
        $details = $this->input->post('details');

        $data = array(
            'title' => $title,
            'details' => $details,
            'link' => $link,
            'tou' => date('Y-m-d H:i:s'),
            'toc' => date('Y-m-d H:i:s')
        );
        $this->load->model('DashboardModel');
        $inserted = $this->DashboardModel->insertVideo($data);
        if ($inserted) {
            $this->session->set_flashdata('filmDataInsertSuccess', 'Video has been added.');
            header("Location: " . base_url('Dashboard/page/Videos'));
        } else {
            $this->session->set_flashdata('filmDataInsertFailed', 'Looks like something is broken.');
            header("Location: " . base_url('Dashboard/page/Videos'));
        }
    }

    public function removeFilm($id)
    {
        $this->load->model('DashboardModel');
        $isRemoved = $this->DashboardModel->removeFilm($id);
        if ($isRemoved) {
            $this->session->set_flashdata('videoDeleteSuccess', "Image has been removed.");
            header("Location: " . base_url('Dashboard/page/Videos'));
        } else {
            $this->session->set_flashdata('videoDeleteFailed', "We couldn't remove the image.");
            header("Location: " . base_url('Dashboard/page/Videos'));
        }
    }

    public function editVideo()
    {
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
        $this->form_validation->set_rules('title', 'Title of the Video', 'trim|required');
        $this->form_validation->set_rules('link', 'Video Link', 'trim|required');
        $this->form_validation->set_rules('details', 'Details', 'trim');
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $link = $this->input->post('link');
        $details = $this->input->post('details');
        if ($this->form_validation->run() == FALSE) {
            $valERR = validation_errors();
            $this->session->set_flashdata('filmUpdateFailed', $valERR);
            header("Location: " . base_url('Dashboard/EditFilm/' . $id));
        }

        $data = array(
            'id' => $id,
            'title' => $title,
            'details' => $details,
            'link' => $link,
            'tou' => date('Y-m-d H:i:s')
        );
        $this->load->model('DashboardModel');
        $updated = $this->DashboardModel->updateVideo($data);
        if ($updated) {
            $this->session->set_flashdata('filmUpdateSuccess', "Record has been Updated.");
            header("Location: " . base_url('Dashboard/EditFilm/' . $id));
        } else {
            $this->session->set_flashdata('filmUpdateFailed', "We couldn't update the record.");
            header("Location: " . base_url('Dashboard/EditFilm/' . $id));
        }
    }
    public function delete_files($target) {
        if(is_dir($target)){
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

            foreach( $files as $file )
            {
                delete_files( $file );
            }

            rmdir( $target );
            return true;
        } elseif(is_file($target)) {
            unlink( $target );
            return true;
        }
    }
    public function removeAlbum($id){
        $path = 'assets/images/album/' . $id;
       $fileDeleted = $this->delete_files($path);
        if ($fileDeleted) {
            $this->load->model('DashboardModel');
            $isRemoved = $this->DashboardModel->removeAlbumId($id);
            if ($isRemoved) {
                $this->session->set_flashdata('albumRmSucc', "Record has been Updated.");
                header("Location: " . base_url('Dashboard/page/ViewAlbum'));
            } else {
                $this->session->set_flashdata('albumRmErr', "We couldn't update the record.");
                header("Location: " . base_url('Dashboard/page/ViewAlbum'));
            }
        }
    }

    public function removeAlbumImage($albumId, $id, $fileName){
        $path = 'assets/images/album/' .$albumId.'/'. $fileName;
        $fileDeleted = $this->removeFile($path);
        if ($fileDeleted) {
            $this->load->model('DashboardModel');
            $isRemoved = $this->DashboardModel->removeAlbumImage($id);
            if ($isRemoved) {
                $this->session->set_flashdata('albumImageDeleteSuccess', "Image has been removed.");
                header("Location: " . base_url('Dashboard/EditAlbum/'.$albumId));
            } else {
                $this->session->set_flashdata('albumImageDeleteFailed', "1We couldn't remove the image.");
                header("Location: " . base_url('Dashboard/EditAlbum/'.$albumId));
            }
        } else {
            $this->session->set_flashdata('albumImageDeleteFailed', "2We couldn't remove the image.");
            header("Location: " . base_url('Dashboard/EditAlbum/'.$albumId));
        }
    }

    public function updateCover($id)
    {
        $this->form_validation->set_rules('toc', 'toc', 'trim|required');
        $toc = $this->input->post('toc');
        $path = 'assets/images/album/' . $id . '/';


        if (!empty($_FILES['coverImage']['name'])) { // second time checking if exists or not
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '500';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
					
						/* checking image resolution */
						$file = $_FILES['coverImage']['tmp_name'];
						list($width, $height) = getimagesize($file);
						if($width != $height){ 
							$message = 'Cover Image resolution is '.$width .' X '.$height;
							$this->session->set_flashdata('coverResErr', $message);
							redirect(base_url() . 'Dashboard/page/AddAlbum');		
						}										

						/*ends*/
            if (!$this->upload->do_upload('coverImage', FALSE)) {
                $leadImgUldErr = $this->upload->display_errors();
                $this->session->set_flashdata('errCoverImg', $leadImgUldErr);
            } else { // Upload successful
                $leadUpload_data = $this->upload->data();
                $image_path = $path . $leadUpload_data['raw_name'] . $leadUpload_data['file_ext'];
                $leadImgData = array(
                    "album_id" => $id,
                    "file_name" => $leadUpload_data['file_name'],
                    "is_cover" => 1,
                    "path" => $image_path,
                    "tou" => date('Y-m-d H:i:s'),
                    "toc" => $toc
                );
                $this->load->model('DashboardModel');
                $leadImgInsertd = $this->DashboardModel->insertCoverImage($leadImgData);
                if (!$leadImgInsertd) {
                    $this->session->set_flashdata('ErrInsCvImg', 'Encountered an Error While Saving Image.');
                    header("Location: " . base_url('Dashboard/EditAlbum/' . $id));
                } else {
                    $this->session->set_flashdata('SuccsInsCvImg', 'Image Updated Successfully.');
                    header("Location: " . base_url('Dashboard/EditAlbum/' . $id));
                }
            }
        }
        $this->session->set_flashdata('addFromErr', 'Encountered an Error While Saving Data.');
        header("Location: " . base_url('Dashboard/EditAlbum/' . $id));

    }
    public function updateAlbumImage($id){
        $this->form_validation->set_rules('toc', 'toc', 'trim|required');
        $toc = $this->input->post('toc');
        if($id) {
            if (!empty($_FILES['portfolioImage']['name'])) { // If other images exists
                $files = $_FILES;
                $dataInfo = array();
                $cpt = count($_FILES['portfolioImage']['name']);
                $path = 'assets/images/album/' . $id . '/';
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['portfolioImage']['name'] = $files['portfolioImage']['name'][$i];
                    $_FILES['portfolioImage']['type'] = $files['portfolioImage']['type'][$i];
                    $_FILES['portfolioImage']['tmp_name'] = $files['portfolioImage']['tmp_name'][$i];
                    $_FILES['portfolioImage']['error'] = $files['portfolioImage']['error'][$i];
                    $_FILES['portfolioImage']['size'] = $files['portfolioImage']['size'][$i];
                    $othconfig['upload_path'] = $path;
                    $othconfig['allowed_types'] = 'jpg|png';
                    $othconfig['max_size'] = '500';
                    $othconfig['encrypt_name'] = true;
                    $this->load->library('upload', $othconfig);
                    if (!$this->upload->do_upload('portfolioImage')) {
                        $otherImgUldErr = $this->upload->display_errors();
                        $this->session->set_flashdata('errAlbumImg', $otherImgUldErr);
                    } else { // Upload successful
                        $otherImageData = $this->upload->data();
//                                    $image_path = base_url("/assets/images/vcimg/". $otherImageData['raw_name'].$otherImageData['file_ext']);
                        $path = 'assets/images/album/' . $id . '/';
                        $image_path = $path . $otherImageData['raw_name'] . $otherImageData['file_ext'];
                        $dataInfo = array(
                            "album_id" => $id,
                            "file_name" => $otherImageData['file_name'],
                            "is_cover" => 0,
                            "path" => $image_path,
                            "tou" => date('Y-m-d H:i:s'),
                            "toc" => $toc
                        );
                        $this->load->model('DashboardModel');
                        $otherImgUploded = $this->DashboardModel->insertAlbumImages($dataInfo);
                        if (!$otherImgUploded) {
                            $this->session->set_flashdata('ErrInsCvImg', 'Encountered an Error While Saving Image.');
                            header("Location: " . base_url('Dashboard/EditAlbum/' . $id));
                        } else {
                            $this->session->set_flashdata('SuccsInsCvImg', 'Image Updated Successfully.');
                            header("Location: " . base_url('Dashboard/EditAlbum/' . $id));
                        }
                    }
                }
                $this->session->set_flashdata('SuccsInsCvImg', 'Image Updated Successfully.');
                header("Location: " . base_url('Dashboard/EditAlbum/' . $id));
            }
        }
        $this->session->set_flashdata('addFromErr', 'Encountered an Error While Saving Data.');
        header("Location: " . base_url('Dashboard/EditAlbum/' . $id));
    }
}