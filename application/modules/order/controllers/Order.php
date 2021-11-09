<?php
class Order extends MY_Controller
{
    protected $productCollection;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('image_CRUD');
        $this->load->library('cart');
        //error_reporting(0);
        if($this ->ion_auth ->logged_in()!=1) {
            redirect(base_url().'admin');
        }
    }

    function status_column_callback($value, $row)
    {
        $data = ucfirst($value);
        return $data;
    }

    function price_column_callback($value, $row)
    {
        $main = new Main();
        $data = $main->CurrencyFormattedPrice($value,$row->currency_code);
        return $data;
    }

    function index()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('sales_order');
        $crud->set_subject('Orders');
        $crud->columns('order_increment_id','status','discount_amount','sub_total','shipping_amount','grand_total','email_address','currency_code','shipping_method','payment_method','no_of_piece','created_at');
        $crud->display_as('order_increment_id','ID');
        $crud->display_as('discount_amount','Discount');
        $crud->display_as('email_address','Customer Email');
        $crud->display_as('no_of_piece','No. Products');
        $crud->add_action('Edit', ''.base_url().'skin/admin/images/icons/view-file.png', 'order/orderView');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $crud->callback_column('status',array($this,'status_column_callback'));
        $crud->callback_column('discount_amount',array($this,'price_column_callback'));
        $crud->callback_column('sub_total',array($this,'price_column_callback'));
        $crud->callback_column('shipping_amount',array($this,'price_column_callback'));
        $crud->callback_column('grand_total',array($this,'price_column_callback'));
        $output = $crud->render();
        $this->template->load('admin_blank', 'orders', $output);
    }

    function orderView($orderId)
    {
        $app  =  new App();
        $main = new Main();
        $data['app'] = $app;
        $data['main'] = $main;
        $data['order'] = $app->getOrder($orderId);
        $data['billingAddress'] = $app->getBillingAddress($orderId);
        $data['shippingAddress'] = $app->getShippingAddress($orderId);
        $data['orderItems'] = $app->orderItems($orderId);
        $this->template->load('admin/advanced_form', 'orderView', $data);
    }

    function createOrder()
    {
        $app  =  new App();
        $main = new Main();
        $data['app'] = $app;
        $data['main'] = $main;
        $this->productCollection = $app->getCurrentProductCollection();
        if(isset($_GET["page"])){
            $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
            if(!is_numeric($page_number)){die('Invalid page number!');}
        }else{
            $page_number = 1;
        }
        $item_per_page = 12;
        $get_total_rows = count($app->getProductCollection());
        $total_pages = ceil($get_total_rows/$item_per_page);
        $page_position = (($page_number-1) * $item_per_page);
        $productCollection = $app->getProductCollection($page_position, $item_per_page);
        $data['productCollection'] =  $productCollection;
        
        $selectedpricearr=array();
        $i="0";
        
        foreach ($data['productCollection'] as $dataval)
        {
        
         $i=$i+1;
         $jsonpriceval=json_decode($dataval->price_data);
         $m="0";            
	               foreach ($jsonpriceval as $k)
	                     {
                           $m=$m+1;
                           $data['dbselectedprice'][$i][$m]=$k->price;
                           $data['dbselectedspecialprice'][$i][$m]=$k->special_price;
                           $data['dbselectedcode'][$i][$m]=$k->currency_code;
                           $data['dbselectedid'][$i][$m]=$k->currency_id;
                         } 
      
        }
       
        $data['pagination'] = $app->paginate_function_admin($item_per_page, $page_number, $get_total_rows[0], $total_pages);
        $data['productCount'] = $get_total_rows;
        $data['message_like'] = $this->session->flashdata('message_like');
        $this->template->load('admin/advanced_form','admin/createOrder',$data);
    }

    function getCombination()
    {
        $app  = new App();
        $data = $this->input->post();
        $optionId = $data['optionId'];
        $parentId = $data['parentId'];

        $selectData = $app->getCombination($optionId,$parentId);
        $source['app'] = $app;
        $source['configProduct'] = $selectData;
        $source['productId'] = $parentId;
        echo $this->load->view('admin/selectbox',$source,true);
    }

    function addToCart()
    {
        $app  = new App();
        $this->load->library('cart');
        $data = $this->input->post();
        $price = $app->getCartPrice($data);
        $insertData = array(
            'id' => $data['product_id'],
            'qty' => $data['qty'],
            'name' => $data['product_name'],
            'options' => $data['config'],
            'price' => $price
        );
        $this->cart->insert($insertData);
        $this->session->set_flashdata('message_like', 'You added '.$data['product_name'].' to your shopping cart.');
        redirect("order/createOrder");
    }

    function simpleAddToCart()
    {
        $app  = new App();
        $this->load->library('cart');
        $data = $this->input->post();
        $price = $app->getCartPrice($data);
        $data = array(
            'id' => $data['product_id'],
            'qty' => $data['qty'],
            'name' => $data['product_name'],
            'options' => $data['config'],
            'price' => $price
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('message_like', 'You added '.$data['product_name'].' to your shopping cart.');
        redirect("order/createOrder");
    }

    function myCart()
    {
        $app  =  new App();
        $main = new Main();
        $data['app'] = $app;
        $data['main'] = $main;
        $this->template->load('admin/advanced_form','admin/myCart',$data);
    }

    function qtyUpdate()
    {
        $cart_item_qty = $this->input->post('qty');
        $cart_item_id = $this->input->post('rid');
        $data = array(
            'rowid'   => $cart_item_id,
            'qty'     => $cart_item_qty
        );
        $this->cart->update($data);
    }

    function checkout()
    {
        $app  =  new App();
        $main = new Main();
        $data['app'] = $app;
        $data['main'] = $main;
        $data['paymentMethods'] = $app->getActivePaymentMethods();
        $data['shippingMethods'] = $app->getActiveShippingMethods();
        $this->template->load('admin/advanced_form','admin/checkout',$data);
    }

    function orderTotalFromShippingAmount()
    {
        $app = new App();
        $main = new Main();
        $shippingId = $this->input->post('shippingId');
        $shippingCharge = $app->getShippingChargeById($shippingId);
        $source['shippingCharge'] = $shippingCharge;
        $source['main'] = $main;
        echo $this->load->view('admin/orderTotalShipping',$source,true);
    }

    function orderPlace()
    {
        $app = new App();
        $main = new Main();
        $data = $this->input->post();
        $shippingMethod = $data['shipping_method'];
        $cart = $this->cart->contents();
        $subTotalArray = [];
        foreach($cart as $item){
            $subTotalArray[] = $item['subtotal'];
        }

        $subTotal = array_sum($subTotalArray);
        $shippingCharge = $app->getShippingChargeById($shippingMethod);
        $grandTotal = $subTotal+$shippingCharge;
        $orderStatus = $app->getOrderStatus($data['payment_method']);
        $locale = '';
        $customerId = '';

        $orderData = array(
            'status' => $orderStatus,
            'locale' => $locale,
            'customer_id' => $customerId,
            'sub_total' => $subTotal,
            'shipping_amount' => $shippingCharge,
            'grand_total' => $grandTotal,
            'currency_code' => $grandTotal,
        );
        echo $grandTotal;die;
    }
}
