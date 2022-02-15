<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends Veripay_Controller
{
    function __construct()
    {
        parent:: __construct();

        $this->load->model($this->router->fetch_class() . '_model', 'model');

    }
    public function index()
    {
    }

    public function register()
    {
          $data=new stdClass();
          $this->form_validation->set_rules('mail','mail','required|xss_clean|valid_email');
          $this->form_validation->set_rules('ad','ad','required|xss_clean|max_length[15]');
          $this->form_validation->set_rules('sifre','sifre','required|xss_clean');

       if(!empty($this->form_validation->run() !=FALSE)){

              $post=new stdClass();

              $post->mail=$this->input->post('mail',true);
              $post->ad=$this->input->post('ad',true);
              $post->sifre=$this->input->post('sifre',true);
              $this->session->set_userdata('bilgi',$post);

              if($this->model->insert($post)){

                 $data->succes='BAŞARIYLA KAYDOLDUN';

              }



       }
            $data->csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()

    );
          $this->load->view('register',$data);


    }


  public function login(){


      $data=new stdClass();

      $this->form_validation->set_rules('ad','ad','required|xss_clean');
      $this->form_validation->set_rules('sifre','sifre','required|xss_clean');
      $this->form_validation->set_rules('mail','mail','required');


        if ($this->form_validation->run() !=FALSE) {

            $post=new stdClass();


             $post->ad=$this->input->post('ad',true);
             $post->sifre=$this->input->post('sifre',true);
             $post->mail=$this->input->post('mail',true);

            if (!empty($veri=$this->model->login($post))){


                 $this->session->set_userdata('logindata',$veri);


                 redirect(site_url('Homepage/sesson'));


            }
            else{

                   $data->succes='ad veya şifre hatalı';

            }


        }



      $data->csrf = array(
          'name' => $this->security->get_csrf_token_name(),
          'hash' => $this->security->get_csrf_hash()
      );

        $this->load->view('login',$data);
  }


   public function sesson(){


          $data=new stdClass();
          $data->user=$this->session->userdata('logindata');

       $data->csrf = array(
           'name' => $this->security->get_csrf_token_name(),
           'hash' => $this->security->get_csrf_hash()
       );

          $this->load->view('index',$data);


   }

   public function update(){

        $data=new stdClass();

         $this->form_validation->set_rules('ad','ad','required|xss_clean');
         $this->form_validation->set_rules('sifre','sifre','required|xss_clean');
         $this->form_validation->set_rules('mail','mail','required|xss_clean');
         $this->form_validation->set_rules('id','id','xss_clean|required');
         $data->user=$this->session->userdata('logindata');
          if($this->form_validation->run() !=FALSE){
             $post=new stdClass();

             $post->ad=$this->input->post('ad',true);
             $post->sifre=$this->input->post('sifre',true);
             $post->mail=$this->input->post('mail',true);
             $post->id=$this->input->post('id',true);
             if (!empty($this->model->update($post))){
                 $data->succes= "GÜNCELLENDİ";
             }


         }

       $data->csrf = array(
           'name' => $this->security->get_csrf_token_name(),
           'hash' => $this->security->get_csrf_hash()
       );



       $this->load->view('update',$data);

   }

   public function liste(){


         $data=new stdClass();


          $this->form_validation->set_rules('title','title','required|xss_clean');
          if ($this->form_validation->run() !=FALSE) {

              $post = new stdClass();

              $post->title=$this->input->post('title');

              if ($this->session->userdata('images')) {
                  $post->img_pet = $this->session->userdata('images')[0];
                  $this->session->unset_userdata('images');
              }
                  if (!empty($this->model->ekle($post))) {

                      $data->succes = 'KAYDEDİLDİ';
                  }
              }





       $data->csrf = array(
           'name' => $this->security->get_csrf_token_name(),
           'hash' => $this->security->get_csrf_hash()
       );



       $this->load->view('liste',$data);

   }

    public function add_image()
    {
        $uploaded_images = [];
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('Upload', $config);
        if ($this->upload->do_upload('file')) {
            $image_session = $this->session->userdata('images');
            if ($image_session == false) {
                $uploaded_images = [];
            } else {
                $uploaded_images = $image_session;
            }

            $uploaded_images[] = 'assets/uploads/'.$this->upload->data('file_name');
            $this->session->set_userdata('images', $uploaded_images);
            pre($this->session->userdata('images'));
        }
        else {
            $this->output->set_status_header('404');
            print strip_tags($this->upload->display_errors());
            exit;
        }



    }


}