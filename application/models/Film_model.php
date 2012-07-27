<?php
class Film_model extends Model {
	
	function search($limit, $offset, $sort_by, $sort_order) {
		
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns =array('FID', 'title', 'category', 'length', 'rating', 'price');
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'title';
		
		$q = $this->db->select('FID, title, category, length, rating, price')
			->from('film_list')
			->limit($limit, $offset)
			->order_by($sort_by, $sort_order);
		
		$ret['rows'] = $q->get()->result();
		
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('film_list');
        
        $tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
        return $ret;
    }
}
