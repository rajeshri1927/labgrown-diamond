<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Currency_lib{
    private $CI;
    private $rate;
    private $fromCurrency;
    private $toCurrency;
    private $amount;
    private $hourDifference;
    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database(); 
        
    }
    function currencyConverter($from_Currency,$to_Currency,$amount)
    {
		  $to_Currency =$_SESSION['geo_currencyConverter'];
		  //echo  $to_Currency."<br/>";
          $from_Currency = urlencode($from_Currency);
          $to_Currency = urlencode($to_Currency);
          $encode_amount = $amount;
          if($to_Currency=="0")
			  $converted_currency =  $amount;
		  else{
			  //echo "amount*to_Currency :".$amount." || ".$to_Currency;
			  $amt = $amount*$to_Currency;  
			  $converted_currency =   $amt;
		  }
          
          return number_format($converted_currency, 2, '.', '');
    }
  //Return Currency Name
  function GetCurrencyName($currency_code){
    $query=$this->CI->db->select('currency_name')->where('currency_code',$currency_code)->get('currency');
    $res=$query->row();
    if (!empty($res->currency_name))
      return (string) $res->currency_name;
    else
      return '';
  }
  //Return Currency Symbol
  function getCurrencySymbol($currency_code){
  
    $query=$this->CI->db->select('symbol')->where('currency_code',$currency_code)->get('currency');
    $res=$query->row();
    if (!empty($res->symbol))
      return (string) $res->symbol;
    else
      return '';
  }
  //Return Currency Symbol in HEX
  function getCurrencySymbolHex($currency_code){
      $query=$this->CI->db->select('hex')->where('currency_code',$currency_code)->get('currency');
    $res=$query->row();
    if (!empty($res->hex))
      return (string) $res->hex;
    else
      return '';
  }
  
  function geoplugin(){
	   // $ip = $this->input->ip_address;
	   $ip = "3.11.88.57";
	   $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" .$this->input->ip_address));
       //print_r($ipdat);	   
	   $geopluginresult['countryName']    = $ipdat->geoplugin_countryName;
	   $geopluginresult['countryCode']    = $ipdat->geoplugin_countryCode;
       $geopluginresult['currencyCode']   = $ipdat->geoplugin_currencyCode;
	   $geopluginresult['currencySymbol'] = $ipdat->geoplugin_currencySymbol;
       $geopluginresult['currencySymbol_utf'] = $ipdat->geoplugin_currencySymbol_UTF8;
       $geopluginresult['geoplugin_currencyConverter'] = $ipdat->geoplugin_currencyConverter;
       
       return  $geopluginresult;	   
  }
  
}
?>