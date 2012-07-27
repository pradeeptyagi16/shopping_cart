<?php
class Films extends Controller {
	
	function display($sort_by = 'title', $sort_order = 'asc', $offset = 0) {
		
		$limit = 20;
		$data['fields'] = array(
			'FID' => 'ID',
			'title' => 'Title',
			'category' => 'Category',
			'length' => 'Length',
			'rating' => 'Rating',
			'price' => 'Price'
		);
		
        $this->load->model('Film_model');
        $results = $this->Film_model->search($limit, $offset, $sort_by, $sort_order);
		$data['films'] = $results['rows'];
		$data['num_results'] = $results['num_rows'];
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url("index.php/films/display/$sort_by/$sort_order");
		$config['total_rows'] = $data['num_results'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
        $this->load->view('films', $data);
	}
}
