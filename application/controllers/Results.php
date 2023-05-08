<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php

class Results extends CI_Controller{


     public function __construct(){
       parent::__construct();
       $this->load->database();
       $this->load->helper(array('form','url','text'));
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('results_model');


     }


 public function index (){
      $this->data['title'] = ' Polling Unit Results ';
      $this->load->view('layout/template/header');
      $this->data['results'] = $this->results_model->polling_unit_result();
      //echo "<pre>"; print_r($this->data['results']);die;
      $this->load->view('layout/pages/result',$this->data);
      $this->load->view('layout/template/footer');
 }

public function summed_lga(){
  if($_POST){
        $lga_name = $this->input->post('lga_name');
        $this->data['title'] = ' Summed Lga';
        $this->data['all_lga'] = $this->db->get('lga')->result();
        $this->data['total_score'] = $this->results_model->summed_lga();
        // echo "<pre>"; print_r($this->data['total_score']);die;

        @$num = $this->db->get_where('polling_unit',array('lga_id'=>$lga_name))->row()->uniqueid;
        $data['total_score'] = $this->results_model->summed_result($num);
        if($data['total_score']){
          $this->load->view('layout/template/header');
          $this->load->view('layout/pages/summed_lga',$this->data);
          $this->load->view('layout/template/footer');
        }else{
          $this->session->set_flashdata('msg_error','No result on this local government ');
          return redirect(base_url('results/summed_lga'));
        }
  }else{
    $this->data['all_lga'] = $this->db->get('lga')->result();
    $this->load->view('layout/template/header');
    $this->load->view('layout/pages/summed_lga',$this->data);
    $this->load->view('layout/template/footer');
  }



}



public function create_poll_unit(){
     if($_POST){
       $this->form_validation->set_rules('party','Party','required');
       $this->form_validation->set_rules('polling_unit','Polling Unit','required');
       $this->form_validation->set_rules('score','Score','required');
       $this->form_validation->set_rules('lga'.'L G A','required');
       $this->form_validation->set_rules('ward',' Ward ','required');
       if($this->form_validation->run() === TRUE){
            $data = [
              'party'=>$this->input->post('party'),
              'polling_unit'=>$this->input->post('polling_unit'),
              'score'=>$this->input->post('score'),
              'lga'=>$this->input->post('lga'),
              'ward'=>$this->input->post('ward')
            ];
            $exist = $this->db->get_where('new_polling_unit',array('polling_unit'=>$data['polling_unit']))->row();
            if($exist){
              $this->session->set_flashdata('create',' POLLING UNIT  ALREADY EXIST ');
              return redirect(base_url('results/create_poll_unit'));
            }else{
              $this->session->set_flashdata('created',' RECORED CREATED  ');
              $this->db->insert('new_polling_unit',$data);
              return redirect(base_url('results/create_poll_unit'));
            }

       }else{
         $this->data['title'] = ' Create Polling Unit ';
         $this->load->view('layout/template/header');
         $this->load->view('layout/pages/create_poll_unit',$this->data);
         $this->load->view('layout/template/footer');
       }
     }else{
       $this->data['title'] = ' Create Polling Unit ';
       $this->load->view('layout/template/header');
       $this->load->view('layout/pages/create_poll_unit',$this->data);
       $this->load->view('layout/template/footer');
     }



  ;


}




}

?>
