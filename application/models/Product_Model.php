<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product_Model extends MY_Model {

	protected $table_name 	= 'tbl_products';
	protected $primary_key 	= 'product_id';
	
	public function __construct(){
		parent::__construct();
	}


    public function get_coupon_code($coupon_input)
    {   
        $query = $this->db->select('*')
                          ->from('tbl_coupon')
                          ->where('coupon_unique_id', $coupon_input) 
                          ->get();
       if($query && $query->num_rows()>0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
	function get_products_with_category($category){
		$products = array();
		foreach ($this->product_array as $product) {
			if($product['product_category'] === $category){
				$products[] = $product;
			}
		}
		return $products;
	}

	function get_products_by_id($product_id){
		$current_product = array();
		foreach ($this->product_array as $product) {
			if($product['product_id'] == $product_id) {
				$current_product = $product;
				break;
			}
		}
		return $current_product;
	}

	function get_product_name_by_id($product_id){
		$product_name = null;
		foreach ($this->product_array as $product) {
			if($product['product_id'] == $product_id) {
				$product_name = $product['product_title'];
				break;
			}
		}
		return $product_name;
	}

	public function get_products($product_id = false, $category_id=false, $display = ''){
        $this->db->select('tp.*, tc.category_id, tc.category_title');
        $this->db->from('tbl_products tp');
        $this->db->join('tbl_categories tc', 'tc.category_id = tp.product_category', 'inner');
        if(isset($display) && !empty($display)){
        	$this->db->where('tp.display', $display);
        }
        if($product_id){
        	$this->db->where('tp.product_id', $product_id);
        }

        if($category_id){
        	$this->db->where('tc.category_id', $category_id);
        }
        
        $query = $this->db->get();
        if($query->num_rows()){
        	if($product_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }
	
	
	public function get_permanent_product_page_list($product_id = false, $category_id=false, $display = ''){
        $this->db->select('tp.*');
        $this->db->from('tbl_permanent_product_page tp');
         
        
        
        $query = $this->db->get();
        if($query->num_rows()){
        	if($product_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }
	
	public function get_permanent_product_page_detail($pageId){
        $this->db->select('tp.*');
        $this->db->from('tbl_permanent_product_page tp');
        $this->db->where('tp.permanent_product_page_Id', $pageId); 
        
        
        $query = $this->db->get();
        if($query->num_rows()){
        	return $query->result_array(); 
        	}
         else {
            return FALSE;
        }
    }
	

    public function get_user($user_id) {
    	$this->db->select('first_name, user_id, last_name, address, postcode, contact_no, email, city');
    	$this->db->from('tbl_users');
    	$this->db->where('user_id', $user_id);
    	$query = $this->db->get();
        if($query->num_rows()){
        	return $query->row_array();
        }else{
        	return false;
        }
    }

    function get_user_ordered_products($user_id){
        $this->db->select('to.order_unique_id, top.*, tp.*');
        $this->db->from('tbl_orders to');
        $this->db->join('tbl_ordered_products top', 'top.order_id = to.order_id', 'inner');
          $this->db->join('tbl_users tu', 'tu.user_id = to.user_id', 'inner');
        $this->db->where('to.user_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows()){
            return $query->result_array(); 
        } else {
            return FALSE;
        }
    }

    public function update_checkout_order($orderArr){
        $query =  $this->db->insert_batch('tbl_ordered_products', $orderArr, 'ordered_product_id');
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function fetch_cart_view($user_id){
    	    $this->db->select('a.*,b.*,c.*,d.*,a.user_id');
    	    $this->db->from('tbl_users a');
    	    $this->db->join('tbl_countries b', 'b.id = a.country', 'left');
    	    $this->db->join ('tbl_states c', 'c.id = a.state', 'left'); 
    	    $this->db->join ('tbl_cities d', 'd.id = a.city' , 'left'); 
    	    if(isset($user_id) && !empty($user_id)){
            	$this->db->where('a.user_id', $user_id);
            }
    	    $q = $this->db->get();
    	    //print_r($this->db->last_query()); 
    	    if($q && $q->num_rows()>0)
    	    {
    	        return $q->result_array();
    	    }
    	    else
    	    {
    	        return FALSE;
    	    }
    }
    
    public function fetch_record($table_name, $primary_key_label='', $primary_key_value='',$start_limit='',$minvalue='',$maxvalue='',$display_label = '', $display = '') {
        $this->db->select('*');
        $this->db->from($table_name);
        if((isset($primary_key_label) && !empty($primary_key_label)) && (isset($primary_key_value) && !empty($primary_key_value))){
            $this->db->where($primary_key_label, $primary_key_value);
            $where = '(display="Y")';
            $this->db->where($where);
        }
        if(isset($start_limit) && !empty($start_limit)){
            $q = $this->db->limit($start_limit);
        }
        $q = $this->db->get();
        if($q && $q->num_rows()>0)
        {
            return $q->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function insert_data($data){ 
        $success = true;

        foreach ($data as $row) {
            // Assuming 'your_table' is the name of your database table
            $query = $this->db->insert('tbl_products', $row);

            if (!$query) {
                $success = false;
                // Optionally, log or handle the failure for this row
            }
        }

        return $success;
    }
	
	
	public function permanent_product_page_insert_data($data){
        $success = true;
        foreach ($data as $row){
            // Assuming 'your_table' is the name of your database table
            $query = $this->db->insert('tbl_permanent_product_page', $row);

            if (!$query){
                $success = false;
                // Optionally, log or handle the failure for this row
            }
        }
       return $success;
    }


/*****************************  permanent_city_page  ****************************************** */

	public function permanent_city_page_insert_data($data){
		
		$success = true;
		
		 		
		foreach($data as $key => $row){
			print_r($row);
            $data_n[$key] = array(
                'permanent_city_page_url' => $row['permanent_city_page_url'],
                'permanent_city_page_tpl' => $row['permanent_city_page_tpl'],
				'permanent_city_page_img_alt' => $row['permanent_city_page_img_alt'],
                'permanent_city_page_metatitle' => $row['permanent_city_page_metatitle'],
				'permanent_city_page_metadetails' => $row['permanent_city_page_metadetails'],
				'permanent_city_page_category' => $row['permanent_city_page_category'],
				'permanent_city_page_img_alt' => $row['permanent_city_page_img_alt']
				);
				
				 
            //print_r($data_n[$key]);
			$query = $this->db->insert('tbl_permanent_city_pages',$data_n[$key]);
			$insert_id = $this->db->insert_id();// get landing_page config id
		  if($row['permanent_city_page block_root1']!=""){
			$block1_n[$key] = array(
			    'permanent_city_page_FId' => $insert_id,
                'permanent_city_page_block_root' => $row['permanent_city_page block_root1'],
				'permanent_city_page_block_title' => $row['permanent_city_page_block_title1'],
                'permanent_city_page_block_filter1_lbl' => $row['permanent_city_page_block_filter1_lbl1'],
				'permanent_city_page_block_filter1' => $row['permanent_city_page_block_filter11'],
				'permanent_city_page_block_filter2_lbl' => $row['permanent_city_page_block_filter2_lbl1'],
				'permanent_city_page_block_filter2' => $row['permanent_city_page_block_filter21'],
				'permanent_city_page_block_filter3_lbl' => $row['permanent_city_page_block_filter3_lbl1'],
				'permanent_city_page_block_filter3' => $row['permanent_city_page_block_filter31'],
				'permanent_city_page_block_filter4_lbl' => $row['permanent_city_page_block_filter4_lbl1'],
				'permanent_city_page_block_filter4' => $row['permanent_city_page_block_filter41'],
				'permanent_city_page_block_filter5_lbl' => $row['permanent_city_page_block_filter5_lbl1'],
				'permanent_city_page_block_filter5' => $row['permanent_city_page_block_filter51'],
				'permanent_city_page_block_filter6_lbl' => $row['permanent_city_page_block_filter6_lbl1'],
				'permanent_city_page_block_filter6' => $row['permanent_city_page_block_filter61'],
				'permanent_city_page_block_max_products' => $row['permanent_city_page_block_max_products1'],
				
			    );
				print_r($block1_n[$key]);
			$query_block1 = $this->db->insert('tbl_permanent_city_page_blocks',$block1_n[$key]);	
		  }
         if($row['permanent_city_page block_root2'])	{	 
			$block2_n[$key] = array(
			    'permanent_city_page_FId' => $insert_id,
                'permanent_city_page_block_root' => $row['permanent_city_page block_root2'],
				'permanent_city_page_block_title' => $row['permanent_city_page_block_title2'],
                'permanent_city_page_block_filter1_lbl' => $row['permanent_city_page_block_filter1_lbl2'],
				'permanent_city_page_block_filter1' => $row['permanent_city_page_block_filter12'],
				'permanent_city_page_block_filter2_lbl' => $row['permanent_city_page_block_filter2_lbl2'],
				'permanent_city_page_block_filter2' => $row['permanent_city_page_block_filter22'],
				'permanent_city_page_block_filter3_lbl' => $row['permanent_city_page_block_filter3_lbl2'],
				'permanent_city_page_block_filter3' => $row['permanent_city_page_block_filter32'],
				'permanent_city_page_block_filter4_lbl' => $row['permanent_city_page_block_filter4_lbl2'],
				'permanent_city_page_block_filter4' => $row['permanent_city_page_block_filter42'],
				'permanent_city_page_block_filter5_lbl' => $row['permanent_city_page_block_filter5_lbl2'],
				'permanent_city_page_block_filter5' => $row['permanent_city_page_block_filter52'],
				'permanent_city_page_block_filter6_lbl' => $row['permanent_city_page_block_filter6_lbl2'],
				'permanent_city_page_block_filter6' => $row['permanent_city_page_block_filter62'],
				'permanent_city_page_block_max_products' => $row['permanent_city_page_block_max_products2'],
			    );
			$query_block2 = $this->db->insert('tbl_permanent_city_page_blocks',$block2_n[$key]);	
		 }	
		 if($row['permanent_city_page block_root3'] != ""){	
			$block3_n[$key] = array(
			    'permanent_city_page_FId' => $insert_id,
                'permanent_city_page_block_root' => $row['permanent_city_page block_root3'],
				'permanent_city_page_block_title' => $row['permanent_city_page_block_title3'],
                'permanent_city_page_block_filter1_lbl' => $row['permanent_city_page_block_filter1_lbl3'],
				'permanent_city_page_block_filter1' => $row['permanent_city_page_block_filter13'],
				'permanent_city_page_block_filter2_lbl' => $row['permanent_city_page_block_filter2_lbl3'],
				'permanent_city_page_block_filter2' => $row['permanent_city_page_block_filter23'],
				'permanent_city_page_block_filter3_lbl' => $row['permanent_city_page_block_filter3_lbl3'],
				'permanent_city_page_block_filter3' => $row['permanent_city_page_block_filter33'],
				'permanent_city_page_block_filter4_lbl' => $row['permanent_city_page_block_filter4_lbl3'],
				'permanent_city_page_block_filter4' => $row['permanent_city_page_block_filter43'],
				'permanent_city_page_block_filter5_lbl' => $row['permanent_city_page_block_filter5_lbl3'],
				'permanent_city_page_block_filter5' => $row['permanent_city_page_block_filter53'],
				'permanent_city_page_block_filter6_lbl' => $row['permanent_city_page_block_filter6_lbl3'],
				'permanent_city_page_block_filter6' => $row['permanent_city_page_block_filter63'],
				'permanent_city_page_block_max_products' => $row['permanent_city_page_block_max_products3'],
			    );
			$query_block3 = $this->db->insert('tbl_permanent_city_page_blocks',$block3_n[$key]);	
		 }	
		if($row['permanent_city_page block_root4'] != ""){	
			$block4_n[$key] = array(
			    'permanent_city_page_FId' => $insert_id,
                'permanent_city_page_block_root' => $row['permanent_city_page block_root4'],
				'permanent_city_page_block_title' => $row['permanent_city_page_block_title4'],
                'permanent_city_page_block_filter1_lbl' => $row['permanent_city_page_block_filter1_lbl4'],
				'permanent_city_page_block_filter1' => $row['permanent_city_page_block_filter14'],
				'permanent_city_page_block_filter2_lbl' => $row['permanent_city_page_block_filter2_lbl4'],
				'permanent_city_page_block_filter2' => $row['permanent_city_page_block_filter24'],
				'permanent_city_page_block_filter3_lbl' => $row['permanent_city_page_block_filter3_lbl4'],
				'permanent_city_page_block_filter3' => $row['permanent_city_page_block_filter34'],
				'permanent_city_page_block_filter4_lbl' => $row['permanent_city_page_block_filter4_lbl4'],
				'permanent_city_page_block_filter4' => $row['permanent_city_page_block_filter44'],
				'permanent_city_page_block_filter5_lbl' => $row['permanent_city_page_block_filter5_lbl4'],
				'permanent_city_page_block_filter5' => $row['permanent_city_page_block_filter54'],
				'permanent_city_page_block_filter6_lbl' => $row['permanent_city_page_block_filter6_lbl4'],
				'permanent_city_page_block_filter6' => $row['permanent_city_page_block_filter64'],
				'permanent_city_page_block_max_products' => $row['permanent_city_page_block_max_products4'],
			    );
			$query_block5 = $this->db->insert('tbl_permanent_city_page_blocks',$block4_n[$key]);	
		}	
		if($row['permanent_city_page block_root5']!=""){	
			$block5_n[$key] = array(
			    'permanent_city_page_FId' => $insert_id,
                'permanent_city_page_block_root' => $row['permanent_city_page block_root5'],
				'permanent_city_page_block_title' => $row['permanent_city_page_block_title5'],
                'permanent_city_page_block_filter1_lbl' => $row['permanent_city_page_block_filter1_lbl5'],
				'permanent_city_page_block_filter1' => $row['permanent_city_page_block_filter15'],
				'permanent_city_page_block_filter2_lbl' => $row['permanent_city_page_block_filter2_lbl5'],
				'permanent_city_page_block_filter2' => $row['permanent_city_page_block_filter25'],
				'permanent_city_page_block_filter3_lbl' => $row['permanent_city_page_block_filter3_lbl5'],
				'permanent_city_page_block_filter3' => $row['permanent_city_page_block_filter35'],
				'permanent_city_page_block_filter4_lbl' => $row['permanent_city_page_block_filter4_lbl5'],
				'permanent_city_page_block_filter4' => $row['permanent_city_page_block_filter45'],
				'permanent_city_page_block_filter5_lbl' => $row['permanent_city_page_block_filter5_lbl5'],
				'permanent_city_page_block_filter5' => $row['permanent_city_page_block_filter55'],
				'permanent_city_page_block_filter6_lbl' => $row['permanent_city_page_block_filter6_lbl5'],
				'permanent_city_page_block_filter6' => $row['permanent_city_page_block_filter65'],
				'permanent_city_page_block_max_products' => $row['permanent_city_page_block_max_products5'],
			    );
			$query_block5 = $this->db->insert('tbl_permanent_city_page_blocks',$block5_n[$key]);	
		}	
			
			
			 if(!$query){
              $success = false;
             // Optionally, log or handle the failure for this row
            }
        }
		
	 /*	
	    permanent_landing_page_metadetails
		permanent_landing_page_metadetails
		
        foreach($data as $row){
          // Assuming 'your_table' is the name of your database table
          $query = $this->db->insert('tbl_permanent_landing_pages', $row);
          if(!$query){
             $success = false;
             // Optionally, log or handle the failure for this row
          }
        }
		*/
       //return $success;
	   
	   return $this->db->last_query();
	   
	}	
	

/*******************************  permanent_landing_page  ****************************************************** */	
	
	public function permanent_landing_page_insert_data($data){
		
		$success = true;
		
		 		
		foreach($data as $key => $row){
			print_r($row);
            $data_n[$key] = array(
                'permanent_landing_page_url' => $row['permanent_landing_page_url'],
                'permanent_landing_page_tpl' => $row['permanent_landing_page_tpl'],
				'permanent_landing_page_img_alt' => $row['permanent_landing_page_img_alt'],
                'permanent_landing_page_metatitle' => $row['permanent_landing_page_metatitle'],
				'permanent_landing_page_metadetails' => $row['permanent_landing_page_metadetails'],
				'permanent_landing_page_category' => $row['permanent_landing_page_category'],
				'permanent_landing_page_img_alt' => $row['permanent_landing_page_img_alt']
				);
				
				 
            //print_r($data_n[$key]);
			$query = $this->db->insert('tbl_permanent_landing_pages',$data_n[$key]);
			$insert_id = $this->db->insert_id();// get landing_page config id
		  if($row['permanent_landing_page block_root5']!=""){
			$block1_n[$key] = array(
			    'permanent_landing_page_FId' => $insert_id,
                'permanent_landing_page_block_root' => $row['permanent_landing_page block_root1'],
				'permanent_landing_page_block_title' => $row['permanent_landing_page_block_title1'],
                'permanent_landing_page_block_filter1_lbl' => $row['permanent_landing_page_block_filter1_lbl1'],
				'permanent_landing_page_block_filter1' => $row['permanent_landing_page_block_filter11'],
				'permanent_landing_page_block_filter2_lbl' => $row['permanent_landing_page_block_filter2_lbl1'],
				'permanent_landing_page_block_filter2' => $row['permanent_landing_page_block_filter21'],
				'permanent_landing_page_block_filter3_lbl' => $row['permanent_landing_page_block_filter3_lbl1'],
				'permanent_landing_page_block_filter3' => $row['permanent_landing_page_block_filter31'],
				'permanent_landing_page_block_filter4_lbl' => $row['permanent_landing_page_block_filter4_lbl1'],
				'permanent_landing_page_block_filter4' => $row['permanent_landing_page_block_filter41'],
				'permanent_landing_page_block_filter5_lbl' => $row['permanent_landing_page_block_filter5_lbl1'],
				'permanent_landing_page_block_filter5' => $row['permanent_landing_page_block_filter51'],
				'permanent_landing_page_block_filter6_lbl' => $row['permanent_landing_page_block_filter6_lbl1'],
				'permanent_landing_page_block_filter6' => $row['permanent_landing_page_block_filter61'],
				'permanent_landing_page_block_max_products' => $row['permanent_landing_page_block_max_products1'],
				
			    );
				print_r($block1_n[$key]);
			$query_block1 = $this->db->insert('tbl_permanent_landing_page_blocks',$block1_n[$key]);	
		  }
         if($row['permanent_landing_page block_root2'])	{	 
			$block2_n[$key] = array(
			    'permanent_landing_page_FId' => $insert_id,
                'permanent_landing_page_block_root' => $row['permanent_landing_page block_root2'],
				'permanent_landing_page_block_title' => $row['permanent_landing_page_block_title2'],
                'permanent_landing_page_block_filter1_lbl' => $row['permanent_landing_page_block_filter1_lbl2'],
				'permanent_landing_page_block_filter1' => $row['permanent_landing_page_block_filter12'],
				'permanent_landing_page_block_filter2_lbl' => $row['permanent_landing_page_block_filter2_lbl2'],
				'permanent_landing_page_block_filter2' => $row['permanent_landing_page_block_filter22'],
				'permanent_landing_page_block_filter3_lbl' => $row['permanent_landing_page_block_filter3_lbl2'],
				'permanent_landing_page_block_filter3' => $row['permanent_landing_page_block_filter32'],
				'permanent_landing_page_block_filter4_lbl' => $row['permanent_landing_page_block_filter4_lbl2'],
				'permanent_landing_page_block_filter4' => $row['permanent_landing_page_block_filter42'],
				'permanent_landing_page_block_filter5_lbl' => $row['permanent_landing_page_block_filter5_lbl2'],
				'permanent_landing_page_block_filter5' => $row['permanent_landing_page_block_filter52'],
				'permanent_landing_page_block_filter6_lbl' => $row['permanent_landing_page_block_filter6_lbl2'],
				'permanent_landing_page_block_filter6' => $row['permanent_landing_page_block_filter62'],
				'permanent_landing_page_block_max_products' => $row['permanent_landing_page_block_max_products2'],
			    );
			$query_block2 = $this->db->insert('tbl_permanent_landing_page_blocks',$block2_n[$key]);	
		 }	
		 if($row['permanent_landing_page block_root3'] != ""){	
			$block3_n[$key] = array(
			    'permanent_landing_page_FId' => $insert_id,
                'permanent_landing_page_block_root' => $row['permanent_landing_page block_root3'],
				'permanent_landing_page_block_title' => $row['permanent_landing_page_block_title3'],
                'permanent_landing_page_block_filter1_lbl' => $row['permanent_landing_page_block_filter1_lbl3'],
				'permanent_landing_page_block_filter1' => $row['permanent_landing_page_block_filter13'],
				'permanent_landing_page_block_filter2_lbl' => $row['permanent_landing_page_block_filter2_lbl3'],
				'permanent_landing_page_block_filter2' => $row['permanent_landing_page_block_filter23'],
				'permanent_landing_page_block_filter3_lbl' => $row['permanent_landing_page_block_filter3_lbl3'],
				'permanent_landing_page_block_filter3' => $row['permanent_landing_page_block_filter33'],
				'permanent_landing_page_block_filter4_lbl' => $row['permanent_landing_page_block_filter4_lbl3'],
				'permanent_landing_page_block_filter4' => $row['permanent_landing_page_block_filter43'],
				'permanent_landing_page_block_filter5_lbl' => $row['permanent_landing_page_block_filter5_lbl3'],
				'permanent_landing_page_block_filter5' => $row['permanent_landing_page_block_filter53'],
				'permanent_landing_page_block_filter6_lbl' => $row['permanent_landing_page_block_filter6_lbl3'],
				'permanent_landing_page_block_filter6' => $row['permanent_landing_page_block_filter63'],
				'permanent_landing_page_block_max_products' => $row['permanent_landing_page_block_max_products3'],
			    );
			$query_block3 = $this->db->insert('tbl_permanent_landing_page_blocks',$block3_n[$key]);	
		 }	
		if($row['permanent_landing_page block_root4'] != ""){	
			$block4_n[$key] = array(
			    'permanent_landing_page_FId' => $insert_id,
                'permanent_landing_page_block_root' => $row['permanent_landing_page block_root4'],
				'permanent_landing_page_block_title' => $row['permanent_landing_page_block_title4'],
                'permanent_landing_page_block_filter1_lbl' => $row['permanent_landing_page_block_filter1_lbl4'],
				'permanent_landing_page_block_filter1' => $row['permanent_landing_page_block_filter14'],
				'permanent_landing_page_block_filter2_lbl' => $row['permanent_landing_page_block_filter2_lbl4'],
				'permanent_landing_page_block_filter2' => $row['permanent_landing_page_block_filter24'],
				'permanent_landing_page_block_filter3_lbl' => $row['permanent_landing_page_block_filter3_lbl4'],
				'permanent_landing_page_block_filter3' => $row['permanent_landing_page_block_filter34'],
				'permanent_landing_page_block_filter4_lbl' => $row['permanent_landing_page_block_filter4_lbl4'],
				'permanent_landing_page_block_filter4' => $row['permanent_landing_page_block_filter44'],
				'permanent_landing_page_block_filter5_lbl' => $row['permanent_landing_page_block_filter5_lbl4'],
				'permanent_landing_page_block_filter5' => $row['permanent_landing_page_block_filter54'],
				'permanent_landing_page_block_filter6_lbl' => $row['permanent_landing_page_block_filter6_lbl4'],
				'permanent_landing_page_block_filter6' => $row['permanent_landing_page_block_filter64'],
				'permanent_landing_page_block_max_products' => $row['permanent_landing_page_block_max_products4'],
			    );
			$query_block5 = $this->db->insert('tbl_permanent_landing_page_blocks',$block4_n[$key]);	
		}	
		if($row['permanent_landing_page block_root5']!=""){	
			$block5_n[$key] = array(
			    'permanent_landing_page_FId' => $insert_id,
                'permanent_landing_page_block_root' => $row['permanent_landing_page block_root5'],
				'permanent_landing_page_block_title' => $row['permanent_landing_page_block_title5'],
                'permanent_landing_page_block_filter1_lbl' => $row['permanent_landing_page_block_filter1_lbl5'],
				'permanent_landing_page_block_filter1' => $row['permanent_landing_page_block_filter15'],
				'permanent_landing_page_block_filter2_lbl' => $row['permanent_landing_page_block_filter2_lbl5'],
				'permanent_landing_page_block_filter2' => $row['permanent_landing_page_block_filter25'],
				'permanent_landing_page_block_filter3_lbl' => $row['permanent_landing_page_block_filter3_lbl5'],
				'permanent_landing_page_block_filter3' => $row['permanent_landing_page_block_filter35'],
				'permanent_landing_page_block_filter4_lbl' => $row['permanent_landing_page_block_filter4_lbl5'],
				'permanent_landing_page_block_filter4' => $row['permanent_landing_page_block_filter45'],
				'permanent_landing_page_block_filter5_lbl' => $row['permanent_landing_page_block_filter5_lbl5'],
				'permanent_landing_page_block_filter5' => $row['permanent_landing_page_block_filter55'],
				'permanent_landing_page_block_filter6_lbl' => $row['permanent_landing_page_block_filter6_lbl5'],
				'permanent_landing_page_block_filter6' => $row['permanent_landing_page_block_filter65'],
				'permanent_landing_page_block_max_products' => $row['permanent_landing_page_block_max_products5'],
			    );
			$query_block5 = $this->db->insert('tbl_permanent_landing_page_blocks',$block5_n[$key]);	
		}	
			
			
			 if(!$query){
              $success = false;
             // Optionally, log or handle the failure for this row
            }
        }
		
	 /*	
	    permanent_landing_page_metadetails
		permanent_landing_page_metadetails
		
        foreach($data as $row){
          // Assuming 'your_table' is the name of your database table
          $query = $this->db->insert('tbl_permanent_landing_pages', $row);
          if(!$query){
             $success = false;
             // Optionally, log or handle the failure for this row
          }
        }
		*/
       //return $success;
	   
	   return $this->db->last_query();
	   
	}
	
 /***********
  fn : getPermanentProductPageDetails based on requested pageno & page order -- gen
     **********************/  
	
	public function getPermanentProductPageDetails($pid){ 
		$this->db->select('*');
        $this->db->from('tbl_permanent_product_page');
        $this->db->where('permanent_product_page_Id', $pid);
        $query = $this->db->get();
        return $query->row_array();
	}
	
	
	public function getPermanentCityPageDetails($pid){ 
		$this->db->select('*');
        $this->db->from('tbl_permanent_city_pages');
        $this->db->where('permanent_city_page_url', $pid);
        $query = $this->db->get();
		echo "lstQrt - ". $this->db->last_query();
        return $query->row_array();
	}
	
	public function getPermanentCityPageBlocksDetails($pid){ 
		$this->db->select('*');
        $this->db->from('tbl_permanent_city_page_blocks');
        $this->db->where('permanent_city_page_FId', $pid);
        $query = $this->db->get();
		$rowData = $query->result_array();
	    return $rowData;
	}
	
	public function getPermanentLandingPageDetails($pid){ 
		$this->db->select('*');
        $this->db->from('tbl_permanent_landing_pages');
        $this->db->where('permanent_landing_page_url', $pid);
        $query = $this->db->get();
		echo "lstQrt - ". $this->db->last_query();
        return $query->row_array();
	}
	public function getPermanentLandingPageBlocksDetails($pid){ 
		$this->db->select('*');
        $this->db->from('tbl_permanent_landing_page_blocks');
        $this->db->where('permanent_landing_page_FId', $pid);
        $query = $this->db->get();
		$rowData = $query->result_array();
	    return $rowData;
	}
	
	
	public function get_permanent_landing_page_list($product_id = false, $category_id=false, $display = ''){
        $this->db->select('tp.*');
        $this->db->from('tbl_permanent_landing_pages tp');
         
        
        
        $query = $this->db->get();
        if($query->num_rows()){
        	if($product_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }
	
	public function get_rapaport_rate_list($product_id = false, $category_id=false, $display = ''){
        $this->db->select('tp.*');
        $this->db->from('tbl_rapaport tp');
         
        $query = $this->db->get();
        if($query->num_rows()){
        	if($product_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }
	
	public function rapaport_rate_insert_data($data){
		echo "Inside model session.......";
		 $success = true;
		 print_r($data);
        foreach ($data as $row){
			    // print_r($row);
			 //echo $row[]."<br/>";
             
		  $conditions = array('stone_shape' => $row['stone_shape'],'stone_clarity' => $row['stone_clarity'],'stone_color' => $row['stone_color'],'stone_weight_frm' => $row['stone_weight_frm'],'stone_weight_to' => $row['stone_weight_to']); //if a row matches both my post's question and tag...
          $query = $this->db->get_where('tbl_rapaport', $conditions); //get the results
            // echo "num_rows -". $query->num_rows();
          if ($query->num_rows() > 0){ //if there are results (1 or more rows are returned from the db) then update whatever's there:
              $this->db->where($conditions); //make sure to add this where clause again - the "where" from your $query no longer applies to your update
              $this->db->update('tbl_rapaport', $row);
          } else {
              $this->db->insert('tbl_rapaport', $row);
          }

            if (!$query){
                $success = false;
                // Optionally, log or handle the failure for this row
            }
			 
        }
       return $success;
	   
	}
	
	
}
?>
