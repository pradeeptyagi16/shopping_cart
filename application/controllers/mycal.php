<?php
class Mycal extends Controller {
	
	function index()
    {
        $this->load->library('calendar');
    }
	
    function generate_calendar()
    {
        $this->load->model('mycal_model');
        $data['calendar']= $this->mycal_model->generate_cal_model(); 
        $this->load->view('mycal',$data);
    }
}
