<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Model {
    private $_countryID;
    private $_stateID;
    
    protected $table_name 	= 'tbl_review';
	protected $primary_key 	= 'review_id';
    // set country id
    public function setCountryID($countryID) {
        return $this->_countryID = $countryID;
    }
    // set state id
    public function setStateID($stateID) {
        return $this->_stateID = $stateID;
    }

    public function getAllCountries() {
        $this->db->select(array('*'));
        $this->db->from('tbl_countries as c');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllShipCountries() {
        $this->db->select(array('*'));
        $this->db->from('tbl_ship_countries as tsc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllLanguage() {
        $this->db->select(array('*'));
        $this->db->from('tbl_languages');
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function getAllCountries() {
    //     $this->db->select(array('*'));
    //     $this->db->from('countries as c');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // get state method
    public function getStates() {
        $this->db->select(array('s.id as state_id', 's.country_id', 's.state_name as state_name'));
        $this->db->from('tbl_states as s');
        $this->db->where('s.country_id', $this->_countryID);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get city method
    public function getCities() {
        $this->db->select(array('i.id as city_id', 'i.city_name as city_name', 'i.state_id'));
        $this->db->from('tbl_cities as i');
        $this->db->where('i.state_id', $this->_stateID);
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>