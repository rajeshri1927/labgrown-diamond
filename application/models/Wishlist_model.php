<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist_model extends MY_Model {
	protected $table_name 	= 'tbl_wishlist';
	protected $primary_key 	= 'id';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_wishlist_by_user_product($user_id, $product_id) {
        // Select wishlist record based on user ID and product ID
        $this->db->select('*');
        $this->db->from('tbl_wishlist');
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();

        // Check if the query executed successfully and returned a result
        if ($query && $query->num_rows() > 0) {
            // Return the wishlist record
            return $query->row_array();
        } else {
            // Return FALSE if no matching record found
            return FALSE;
        }
    }
    
    // public function get_all_wishlist_details_with_count($user_id = '', $total_wishlist_count = '') {
    //     // Select all wishlist details by default
    //     $this->db->select('tw.*');
    //     $this->db->from('tbl_wishlist tw');
    //     // Add condition to filter by user_id if provided
    //     if (!empty($user_id)) {
    //         $this->db->where('tw.user_id', $user_id);
    //     }
    
    //     // Add condition to include wishlist count if requested
    //     if (!empty($total_wishlist_count)) {
    //         $this->db->select('COUNT(*) as wishlist_count');
    //         $this->db->group_by('tw.user_id'); // Group by user_id to get wishlist count per user
    //     }
    
    //     // Execute the query
    //     $query = $this->db->get();
    
    //     // Check if the query executed successfully and returned results
    //     if ($query && $query->num_rows() > 0) {
    //         // Return results based on the presence of product_id parameter
    //         if (!empty($product_id)) {
    //             return $query->row_array();
    //         } else {
    //             return $query->result_array();
    //         }
    //     } else {
    //         return FALSE; // Return FALSE if no records found
    //     }
    // }

    public function get_all_wishlist_details_with_count($user_id = '', $total_wishlist_count = '') {
        // Select all wishlist details by default
        if (!empty($total_wishlist_count)) {
            $this->db->select('tw.user_id, COUNT(*) as wishlist_count');
            $this->db->group_by('tw.user_id'); // Group by user_id to get wishlist count per user
        } else {
            $this->db->select('tw.*');
        }
        $this->db->from('tbl_wishlist tw');
    
        // Add condition to filter by user_id if provided
        if (!empty($user_id)) {
            $this->db->where('tw.user_id', $user_id);
        }
    
        // Execute the query
        $query = $this->db->get();
    
        // Check if the query executed successfully and returned results
        if ($query && $query->num_rows() > 0) {
            // Return results based on the presence of product_id parameter
            if (!empty($product_id)) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        } else {
            return FALSE; // Return FALSE if no records found
        }
    }
      
    
}