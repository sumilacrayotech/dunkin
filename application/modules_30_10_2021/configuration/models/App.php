<?php
class app extends CI_Model
{ 

   public function __construct()
    {
		error_reporting(0);
    }

    function getCountries()
    {
      $this->db->order_by("country_name", "asc");
      $res = $this->db->get('country')->result();
        
       return $res;
    }
    
    function getZones()
    {
      $this->db->order_by("zone_name", "asc");
      $res = $this->db->get('zone')->result();
        
       return $res;
    }
    
    function getLocales()
    {
      $this->db->order_by("name", "asc");
      $res = $this->db->get('locale')->result();
        
       return $res;
    }
    
    function getCurrencies()
    {
      $this->db->order_by("currency_name", "asc");
      $res = $this->db->get('currencies')->result();
        
       return $res;
    }





    function get_category()
    {
        $this->db->where('parent_category','0');
        return $this->db->get('catalog_category')->result();
    }
    

    function configuration_update($json,$id)
    {    
        $data=array(		
		'value'=>$json											
		);               
        $this->db->where('id',$id);
        $this->db->update('config_data', $data);
    }
    
     function configuration_update_state($jsonstate,$idstate)
    {    
        $data=array(		
		'value'=>$jsonstate											
		);               
        $this->db->where('id',$idstate);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_zip($jsonzip,$idzip)
    {    
        $data=array(		
		'value'=>$jsonzip											
		);               
        $this->db->where('id',$idzip);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_zone($timezone,$idzone)
    {    
        $data=array(		
		'value'=>$timezone											
		);               
        $this->db->where('id',$idzone);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_default($default,$iddefault)
    {    
        $data=array(		
		'value'=>$default											
		);               
        $this->db->where('id',$iddefault);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_locale($jsonlocale,$idlocale)
    {    
        $data=array(		
		'value'=>$jsonlocale											
		);               
        $this->db->where('id',$idlocale);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_unit($unit,$idunit)
    {    
        $data=array(		
		'value'=>$unit											
		);               
        $this->db->where('id',$idunit);
        $this->db->update('config_data', $data);
    }
    
     function configuration_update_store($store_name,$idstore)
    {    
        $data=array(		
		'value'=>$store_name											
		);               
        $this->db->where('id',$idstore);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_country($storecountry,$idstorecountry)
    {    
        $data=array(		
		'value'=>$storecountry											
		);               
        $this->db->where('id',$idstorecountry);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_phone($phone,$idphone)
    {    
        $data=array(		
		'value'=>$phone											
		);               
        $this->db->where('id',$idphone);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_region($region,$idregion)
    {    
        $data=array(		
		'value'=>$region											
		);               
        $this->db->where('id',$idregion);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_postalcode($postalcode,$idpostalcode) 
    {    
        $data=array(		
		'value'=>$postalcode											
		);               
        $this->db->where('id',$idpostalcode);
        $this->db->update('config_data', $data);
    }
    
    
    function configuration_update_address1($address1,$idaddress1) 
    {    
        $data=array(		
		'value'=>$address1											
		);               
        $this->db->where('id',$idaddress1);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_address2($address2,$idaddress2) 
    {    
        $data=array(		
		'value'=>$address2											
		);               
        $this->db->where('id',$idaddress2);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_city($city,$idcity) 
    {    
        $data=array(		
		'value'=>$city											
		);               
        $this->db->where('id',$idcity);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_vat($vat,$idvat) 
    {    
        $data=array(		
		'value'=>$vat											
		);               
        $this->db->where('id',$idvat);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_allowedcurrency($jsonallowedcurrency,$idallowedcurrency)
    {    
        $data=array(		
		'value'=>$jsonallowedcurrency											
		);               
        $this->db->where('id',$idallowedcurrency);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_basecurrency($basecurrency,$idbasecurrency)
    {    
        $data=array(		
		'value'=>$basecurrency											
		);               
        $this->db->where('id',$idbasecurrency);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_conversion($conversion,$idconversion)
    {    
        $data=array(		
		'value'=>$conversion											
		);               
        $this->db->where('id',$idconversion);
        $this->db->update('config_data', $data);
    }
    
    
    function configuration_update_general_contact_name($general_contact_name,$idgeneralcontact)
    {    
        $data=array(		
		'value'=>$general_contact_name											
		);               
        $this->db->where('id',$idgeneralcontact);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_general_contact_email($general_contact_email,$idgeneralcontactemail)
    {    
        $data=array(		
		'value'=>$general_contact_email											
		);               
        $this->db->where('id',$idgeneralcontactemail);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_support_name($support_name,$idsupportname)
    {    
        $data=array(		
		'value'=>$support_name											
		);               
        $this->db->where('id',$idsupportname);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_support_email($support_email,$idsupportemail)
    {    
        $data=array(		
		'value'=>$support_email											
		);               
        $this->db->where('id',$idsupportemail);
        $this->db->update('config_data', $data);
    }
    
     function configuration_update_contact_enable($contact_enable,$idcontactenable) 
    {    
        $data=array(		
		'value'=>$contact_enable											
		);               
        $this->db->where('id',$idcontactenable);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_email_to($email_to,$idemailto) 
    {    
        $data=array(		
		'value'=>$email_to											
		);               
        $this->db->where('id',$idemailto);
        $this->db->update('config_data', $data);
    }
    
    
    
    
    
     function configuration_update_products_per_page($products_per_page,$idproductsperpage)
    {    
        $data=array(		
		'value'=>$products_per_page											
		);               
        $this->db->where('id',$idproductsperpage);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_product_sort($product_sort,$idproductsort)
    {    
        $data=array(		
		'value'=>$product_sort											
		);               
        $this->db->where('id',$idproductsort);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_product_enable($product_enable,$idproductenable)
    {    
        $data=array(		
		'value'=>$product_enable											
		);               
        $this->db->where('id',$idproductenable);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_guest_review($guest_review,$idguestreview)
    {    
        $data=array(		
		'value'=>$guest_review											
		);               
        $this->db->where('id',$idguestreview);
        $this->db->update('config_data', $data);
    }
    
     function configuration_update_stock_products($stock_products,$idstockproducts) 
    {    
        $data=array(		
		'value'=>$stock_products											
		);               
        $this->db->where('id',$idstockproducts);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_max_quantity($max_quantity,$idmaxquantity) 
    {    
        $data=array(		
		'value'=>$max_quantity											
		);               
        $this->db->where('id',$idmaxquantity);
        $this->db->update('config_data', $data);
    }
    
    
    
    function configuration_update_website_key($website_key,$idwebsitekey) 
    {    
        $data=array(		
		'value'=>$website_key											
		);               
        $this->db->where('id',$idwebsitekey);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_secret_key($secret_key,$idsecretkey) 
    {    
        $data=array(		
		'value'=>$secret_key											
		);               
        $this->db->where('id',$idsecretkey);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_key_status($key_status,$idkeystatus) 
    {    
        $data=array(		
		'value'=>$key_status											
		);               
        $this->db->where('id',$idkeystatus);
        $this->db->update('config_data', $data);
    }
    
    function configuration_update_logo($new_name,$idlogo) 
    {    
        $data=array(		
		'value'=>$new_name											
		);               
        $this->db->where('id',$idlogo);
        $this->db->update('config_data', $data);
    }
    
    
    function configuration_update_fav($new_name,$idfav) 
    {    
        $data=array(		
		'value'=>$new_name											
		);               
        $this->db->where('id',$idfav);
        $this->db->update('config_data', $data);
    }




    
    
     function getselectedcountry($id)
    {                     
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedstate($idstate)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idstate);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedzip($idzip)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idzip);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedzone($idzone)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idzone);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselecteddefault($iddefault)
    {                     
        $this->db->select('*');
        $this->db->where('id', $iddefault);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedlocale($idlocale)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idlocale);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedunit($idunit)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idunit);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedstore($idstore)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idstore);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
     function getselectedphone($idphone)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idphone);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedstorecountry($idstorecountry)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idstorecountry);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedregion($idregion)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idregion);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedpostalcode($idpostalcode)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idpostalcode);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedaddress1($idaddress1)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idaddress1);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
     function getselectedaddress2($idaddress2)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idaddress2);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedcity($idcity)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idcity);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedvat($idvat)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idvat);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedallowedcurrencies($idallowedcurrency)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idallowedcurrency);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedbasecurrency($idbasecurrency)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idbasecurrency);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedconversion($idconversion)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idconversion);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedgeneral_contact_name($idgeneralcontact)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idgeneralcontact);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedgeneral_contact_email($idgeneralcontactemail)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idgeneralcontactemail);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedsupport_name($idsupportname)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idsupportname);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedsupport_email($idsupportemail)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idsupportemail);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedcontact_enable($idcontactenable)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idcontactenable);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedemail_to($idemailto)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idemailto);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    
    
    function getselectedproducts_per_page($idproductsperpage)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idproductsperpage);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedproduct_sort($idproductsort)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idproductsort);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedproduct_enable($idproductenable)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idproductenable);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedguest_review($idguestreview)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idguestreview);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedstock_products($idstockproducts)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idstockproducts);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedmax_quantity($idmaxquantity)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idmaxquantity);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    
    
    
    
    function getselectedwebsite_key($idwebsitekey)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idwebsitekey);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedsecret_key($idsecretkey)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idsecretkey);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedkey_status($idkeystatus)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idkeystatus);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    function getselectedlogo($idlogo)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idlogo);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }
    
    
    function getselectedfav($idfav)
    {                     
        $this->db->select('*');
        $this->db->where('id', $idfav);
        $query = $this->db->get('config_data');
        $res=$query->row();        
        return $res;
    }



































}
?>