<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function upload_data()
    {
        if ($this->request->getFile('slider_image')->getSize() > 0) {
            $imageFile = $this->request->getFile('slider_image');
            $extension = $imageFile->getClientExtension();
            $uploaded_image = "slider_" . time() . '.' . $extension;
            $imageFile->move('sliders', $uploaded_image);
        } else {
            $uploaded_image = "";
        }
    }
    public function update_upload_data()
    {
        if ($this->request->getFile('slider_image')->getSize() > 0) {

            $check_file_path = ROOTPATH . 'slider/' . $this->request->getVar('old');
            if (file_exists($check_file_path)) {
                unlink($check_file_path);
            }

            $imageFile = $this->request->getFile('slider_image');
            $extension = $imageFile->getClientExtension();
            $uploaded_image = "slider_" . time() . '.' . $extension;
            $imageFile->move('sliders', $uploaded_image);
        } else {
            $uploaded_image = $this->request->getVar('old');
        }
    }
}