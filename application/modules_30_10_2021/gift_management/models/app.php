<?php
class app extends CI_Model
{
    function randomvalue()
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 1;
        $pass = '';
        while ($i <= 4) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }
   	function randomvalue1()
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 1;
        $pass = '';
        while ($i <= 1) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }
    function getcoupon_code($code)
	{			
		$this->db->where('coupon_code',$code ); 
		$val= $this->db->get('tb_coupon');		
		return $val->num_rows;
	}
    function save_gift_code()
	{
		ini_set('max_execution_time', 30000);
		$count=$this->input->post('counts');
		/**/
		$start_date = $this->input->post('start');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$end_date = $this->input->post('end');
        $datetime1 = new DateTime($start_date);
        $datetime2 = new DateTime($end_date);
        $difference = $datetime1->diff($datetime2);
        $exp=$difference->d;			
		for($k=0;$k<$count;$k++)
		{
	       $coupon_code = strtolower('LBGC' . $this->app->randomvalue());				
		   $add_new_code=$this->app->randomvalue1();
		   $check_code=$this->app->getcoupon_code($coupon_code);
           if($check_code > 0)
		   {
		      $coupon_code=$coupon_code.$add_new_code;
		   }
		   else
		   {
		      $coupon_code=$coupon_code;
		   }
		   $code_type = $this->input->post('code_type') ;		
		   if($code_type=='1')
		   {
		      $coupon_code = $coupon_code ;		
		   }
		   else
		   {	
		      $coupon_code = $this->input->post('coupon_code') ;		
           }
            $data=array(
                'coupon_code' =>$coupon_code,
        		'coupon_amount'=>$this->input->post('amounts'),
        		'coupon_balance'=>$this->input->post('amounts'),
        		'usable'=>$this->input->post('usable'),
        		'usable2'=>$this->input->post('usable'),
        		'coupon_type'=>$this->input->post('coupon_type'),
        		'exp'=>$exp,
        		'limit'=>$this->input->post('limit'),
        		'amount_type'=>$this->input->post('amount_type'),
        		'amount_percentage'=>$this->input->post('amount_percentage'),
        		'start'=>$start_date,
        		'end'=>$end_date,
        		'start_time'=>$start_time,
        		'end_time'=>$end_time,
        		'code_type'=>$this->input->post('code_type'),
        		'status'=>'a',
        		'date'=>date('Y-m-d'),
        		'p_date'=>date('d-m-Y'),
        		'currency_code'=>'INR',
        		'type'=>'admin'
                );
                $this->db->insert('tb_coupon',$data);
		}
	}
}
?>