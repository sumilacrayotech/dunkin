<?php
class Checkout extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->library('grocery_CRUD');
        $this->load->library('cart');
        error_reporting(0);
    }

    function addToCart()
    {
        sleep(2);
        $app  = new App();
        $main = new Main();
        try {
            $data = $this->input->post();
            $product = $app->getProduct($data['product_id']);
            $price = $app->getCartPrice($data);
            if(!empty($data['config'])){
                $configOptions = $data['config'];
            }else{
                $configOptions = '';
            }
            $insertData = array(
                'id' => $data['product_id'],
                'qty' => $data['qty'],
                'name' => $product->product_name,
                'options' => $configOptions,
                'image' => base_url().'assets/uploads/products/main/'.$product->image,
                'currency_code' => $main->currentCurrency(),
                'product_url' => base_url('product/'.$product->url_key),
                'weight' => $product->weight,
                'sku' => $product->product_code,
                'price' => $price
            );
            $this->cart->insert($insertData);
            $successMessage = 'You added '.$product->product_name.' to your <a href="'.base_url().'checkout/cart/" style="color: #eb4494;">cart</a>';
            $CartData['cartData'] = $this->cart->contents();
            $CartData['main'] = $main;
            $responseData = array(
                'cartItemCount' => count($this->cart->contents()),
                'message' => $main->successMessage($successMessage),
                'miniCart' => $this->load->view('miniCart',$CartData,true),
            );
            echo json_encode($responseData);die;
        } catch (Exception $e) {
            $successMessage = $e->getMessage();
            $CartData['cartData'] = $this->cart->contents();
            $CartData['main'] = $main;
            $responseData = array(
                'cartItemCount' => count($this->cart->contents()),
                'message' => $main->successMessage($successMessage),
                'miniCart' => '',
            );
            echo json_encode($responseData);die;
        }
    }

    function removeItem($rowid)
    {
        $main = new Main();
        try {
            $data = array(
                'rowid'   => $rowid,
                'qty'     => 0
            );
            $this->cart->update($data);
            $CartData['cartData'] = $this->cart->contents();
            $CartData['main'] = $main;
            $this->session->set_flashdata('message_like', $main->successMessage('Your cart item removed successfully'));
            redirect($_SERVER['HTTP_REFERER']);
        }catch (Exception $e) {
            $CartData['cartData'] = $this->cart->contents();
            $CartData['main'] = $main;
            $this->session->set_flashdata('message_like', $main->errorMessage($e->getMessage()));
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function cart()
    {
        $app = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['cartData'] = $this->cart->contents();
        $data['message_like'] = $this->session->flashdata('message_like');
        $this->template->load('frontend/product', 'cart',$data);
    }

    function qtyUpdate()
    {
        sleep(2);
        $cart_item_qty = $this->input->post('qty');
        $cart_item_id = $this->input->post('rid');
        $data = array(
            'rowid'   => $cart_item_id,
            'qty'     => $cart_item_qty
        );
        $this->cart->update($data);
    }

    function updateCart()
    {
        $main = new Main();
        $cart_info =  $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid'   => $rowid,
                'price'   => $price,
                'amount'  => $amount,
                'qty'     => $qty
            );
            $this->cart->update($data);
        }
        $this->session->set_flashdata('message_like', $main->successMessage('Your cart quantity updated successfully'));

        redirect(base_url().'checkout/cart');
    }

    function index($tab='')
    {
        $app = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['loginForm'] = $this->load->view('login',$data,true);
        $data['coupon'] = $this->load->view('coupon',$data,true);
        $data['tab'] = $tab;
        $data['paymentMethods'] = $app->getActivePaymentMethods();
        $data['shippingMethods'] = $app->getActiveShippingMethods();
        $data['cartData'] = $this->cart->contents();
        $data['customer'] = $app->getUserData($main->ifLogin()->id);
        if(empty($this->session->userdata('billingAddressData'))){
            $defaultBillingAddress = $app->getDefaultBillingAddress($main->ifLogin()->id);
            $this->session->set_userdata('billingAddressData', $defaultBillingAddress);
        }

        if(empty($this->session->userdata('shippingAddressData'))){
            $defaultShippingAddress = $app->getDefaultShippingAddress($main->ifLogin()->id);
            $this->session->set_userdata('shippingAddressData', $defaultShippingAddress);
        }

        $data['shippingAddressData']  = $this->session->userdata('shippingAddressData');
        $data['shippingAddressDataNew']  = $this->session->userdata('shippingAddressDataNew');
        $data['billingAddressData']  = $this->session->userdata('billingAddressData');
        $data['shippingSelected']  = $this->session->userdata('shippingCharge');
        $data['paymentSelected']  = $this->session->userdata('paymentMethod');
        $data['billingAddressForm'] = $this->load->view('billing_address',$data,true);
        $data['shippingAddressForm'] = $this->load->view('shipping_address',$data,true);
        $data['message_like'] = $this->session->flashdata('message_like');
        $data['customerAddress'] = $app->getCustomerAddress($main->ifLogin()->id);
        if($main->ifLogin()){
            $this->template->load('frontend/product', 'checkout',$data);
        }else{
            $this->session->set_flashdata('message_like', $main->warningMessage('login required for checkout order'));
            redirect(base_url('customer/login'));
        }
    }

    function defaultBillingAddress()
    {
        $app = new App();
        $main = new Main();
        $defaultBillingAddress = $app->getDefaultBillingAddress($main->ifLogin()->id);
        $this->session->set_userdata('billingAddressData', $defaultBillingAddress);
        $this->session->set_userdata('shipping_billing', 'diff');
    }

    function sameAsShippingAddress()
    {
        $shippingAddress = $this->session->userdata('shippingAddressData');
        $this->session->set_userdata('billingAddressData', $shippingAddress);
        $this->session->set_userdata('shipping_billing', 'same');
    }

    function saveShippingAddressSession()
    {
        $address = (object) $this->input->post();
        $this->session->set_userdata('shippingAddressData', $address);
        $this->session->set_userdata('shippingAddressDataNew', $address);
        $main = new Main();
        echo '<div class="adding-address-box address-box3" data-toggle="modal" data-target="#exampleModal" style="text-align: left;padding: 14px;height: 245px;border: 2px solid #EB4494;">
                <address>
                    '.ucfirst($address->first_name).' '.ucfirst($address->last_name).' <br/>
                    '.ucfirst($address->address).'<br/>
                    '.ucfirst($address->state).'<br/>
                    '.ucfirst($address->city).'<br/>
                    '.ucfirst($address->zip_code).'<br/>
                    '.ucfirst($main->getCountryNameByCode($address->country_code)).'<br/>
                    T: '.ucfirst($address->phone_number).'
                </address>
               <i class="fa fa-check selected" aria-hidden="true"></i>
               <a href="javascript:void(0)" data-country-code="IN" data-address-type="checkout-del" class="btn btn-fill-out" style="color: #FFF;padding: 2px 10px 2px 10px;float: right;">Edit</a>
            </div>';die;

    }

    function saveBillingAddressSession()
    {
        $main = new Main();
        $billingAddressData = (object) $this->input->post();
        $shippingAddressData = $this->session->userdata('shippingAddressData');
        if(empty($shippingAddressData)){
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo $main->errorMessage('Shipping address required');die;
            }else{
                $this->session->set_flashdata('message_like', $main->warningMessage('Shipping address required'));
                redirect(base_url('checkout/index/shippingMethods'));
            }
        }else{
            $this->session->set_userdata('billingAddressData', $billingAddressData);
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo 1;
            }else{
                redirect(base_url('checkout/index/shippingMethods'));
            }
        }
    }

    function saveShippingAmount(){
        $app = new App();
        $shippingId = $this->input->post('shippingId');
        $shippingMethod = $app->getShippingChargeById($shippingId);
        $shippingAmountData = array(
            'amount' => $shippingMethod->charge,
            'title' => $shippingMethod->shipping_title,
            'shipping_id' => $shippingMethod->shipping_id,
        );
        $this->session->set_userdata('shippingCharge', $shippingAmountData);
        echo json_encode($shippingAmountData);die;
    }

    function savePaymentAmount()
    {
        $app = new App();
        $paymentId = $this->input->post('paymentId');
        $paymentMethod = $app->getPaymentMethodById($paymentId);
        $paymentMethodData = array(
            'title' => $paymentMethod->payment_title,
            'payment_id' => $paymentMethod->payment_id,
        );
        $this->session->set_userdata('paymentMethod', $paymentMethodData);
    }

    function orderPlace()
    {
        $app = new App();
        $main = new Main();
        $customerId = $main->ifLogin()->id;
        try {
            $shippingAddressData  = $this->session->userdata('shippingAddressData');
            $billingAddressData  = $this->session->userdata('billingAddressData');
            $shippingSelected  = $this->session->userdata('shippingCharge');
            $paymentMethod  = $this->session->userdata('paymentMethod');
            $shippingBillingSame  = $this->session->userdata('shipping_billing');
            $cartData = $this->cart->contents();
            if($shippingAddressData->save_address=='on'){
                $addressCount = $app->checkCustomerAddress($customerId);
                if($addressCount==0){
                    if($shippingBillingSame=='same'){
                        $app->insertDefaultBillingAddress((array) $shippingAddressData,$customerId);
                        $app->insertDefaultShippingAddress((array) $shippingAddressData,$customerId);
                    }else{
                        $app->insertDefaultBillingAddress((array) $billingAddressData,$customerId);
                        $app->insertDefaultShippingAddress((array) $shippingAddressData,$customerId);
                    }
                }else{
                    $app->saveShippingAddress((array) $shippingAddressData,$customerId);
                }
            }
            $subTotalArray = [];
            foreach($cartData as $item){
                $subTotalArray[] = $item['subtotal'];
            }
            $subTotal = array_sum($subTotalArray);
            $orderStatus = $app->getOrderStatus($paymentMethod['payment_id']);
            $shippingCharge = $shippingSelected['amount'];
            $grandTotal = $subTotal+$shippingCharge;
            $locale = '';
            $coupon_code = '';
            $discount_amount = '';
            $tax_amount = '';

            $orderData = array(
                'status' => $orderStatus,
                'locale' => $locale,
                'customer_id' => $customerId,
                'sub_total' => $subTotal,
                'shipping_amount' => $shippingCharge,
                'grand_total' => $grandTotal,
                'currency_code' => $main->currentCurrency(),
                'coupon_code' => $coupon_code,
                'discount_amount' => $discount_amount,
                'tax_amount' => $tax_amount,
                'email_address' => $main->ifLogin()->email,
                'no_of_piece' => count($subTotalArray),
                'payment_method' => $paymentMethod['title'],
                'payment_method_id' => $paymentMethod['payment_id'],
                'shipping_method' => $shippingSelected['title'],
                'shipping_method_id' => $shippingSelected['shipping_id'],
            );

            $orderId = $app->createOrder($orderData);
            $orderIncNumber = sprintf("%'.09d\n", $orderId);
            $app->updateSequenceOrder($orderId,$orderIncNumber);
            $app->insertShippingAddress($shippingAddressData,$orderId,$customerId);
            $app->insertBillingAddress($billingAddressData,$orderId,$customerId);
            $arrayBatchProduct =  array();
            foreach($cartData as $product){

                if(empty($product['options'])){
                    $productType = 'simple';
                    $product_options = '';
                }else{
                    $productType = 'configurable';
                    $product_options = json_encode($product['options']);
                }

                if(empty($product['weight'])){
                    $weight = '0.5';
                }else{
                    $weight = $product['weight'];
                }

                $arrayBatchProduct[] = array(
                    'order_id' => $orderId,
                    'parent_item_id' => $product['id'],
                    'locale' => $locale,
                    'product_id' => $product['id'],
                    'product_type' => $productType,
                    'product_options' => $product_options,
                    'weight' => $weight,
                    'sku' => $product['sku'],
                    'name' => $product['name'],
                    'qty' => $product['qty'],
                    'price' => $product['price'],
                    'row_total' => $product['subtotal'],
                );
            }
            $app->insertOrderProducts($arrayBatchProduct);
            $this->session->set_userdata('orderIncId', $orderIncNumber);
            redirect(base_url('checkout/success'));
        } catch (Exception $e) {
            $this->session->set_flashdata('message_like', $main->errorMessage($e->getMessage()));
            redirect(base_url('checkout/index'));
        }
    }

    function selectAddress()
    {
        $app = new App();
        $shippingAddressId = $this->input->post('addressId');
        $shippingAddress = $app->getAddressById($shippingAddressId);
        $this->session->set_userdata('shippingAddressData', $shippingAddress);
    }

    function success()
    {
        $app = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['orderIncId']  = $this->session->userdata('orderIncId');
        $data['message_like'] = $this->session->flashdata('message_like');
        $this->cart->destroy();
        $this->session->unset_userdata('shippingAddressData');
        $this->session->unset_userdata('billingAddressData');
        $this->session->unset_userdata('shippingCharge');
        $this->session->unset_userdata('paymentMethod');
        $this->template->load('frontend/product', 'success',$data);
    }
}