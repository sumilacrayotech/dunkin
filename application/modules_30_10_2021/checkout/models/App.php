<?php
class App extends CI_Model
{
    public function __construct()
    {
        $this->load->model('Main');
        $this->load->library('memcached_library');
    }

    function getProduct($productId)
    {
        $this->db->where_in('product_id',$productId);
        $product = $this->db->get('catalog_product')->row();
        return $product;
    }

    function getUserData($id){
        $this->db->where('id',$id);
        return $this->db->get('users')->row();
    }

    function checkCustomerAddress($customerId)
    {
        $this->db->where('customer_id',$customerId);
        $query = $this->db->get('customer_address');
        $num = $query->num_rows();
        return $num;
    }

    function insertDefaultBillingAddress($postData,$customerId){
        $data = array(
            'first_name' => $postData['first_name'],
            'last_name' => $postData['last_name'],
            'customer_id' => $customerId,
            'phone_number' => $postData['phone_number'],
            'address' => $postData['address'],
            'country_code' => $postData['country_code'],
            'city' => $postData['city'],
            'state' => $postData['state'],
            'zip_code' => $postData['zip_code'],
            'address_type' => 'billing',
            'default_address' => 1,
        );
        $this->db->insert('customer_address', $data);
    }

    function insertDefaultShippingAddress($postData,$customerId){
        $data = array(
            'first_name' => $postData['first_name'],
            'last_name' => $postData['last_name'],
            'customer_id' => $customerId,
            'phone_number' => $postData['phone_number'],
            'address' => $postData['address'],
            'country_code' => $postData['country_code'],
            'city' => $postData['city'],
            'state' => $postData['state'],
            'zip_code' => $postData['zip_code'],
            'address_type' => 'shipping',
            'default_address' => 1,
        );
        $this->db->insert('customer_address', $data);
    }

    function saveShippingAddress($postData,$customerId){
        $data = array(
            'first_name' => $postData['first_name'],
            'last_name' => $postData['last_name'],
            'customer_id' => $customerId,
            'phone_number' => $postData['phone_number'],
            'address' => $postData['address'],
            'country_code' => $postData['country_code'],
            'city' => $postData['city'],
            'state' => $postData['state'],
            'zip_code' => $postData['zip_code'],
            'address_type' => 'shipping',
            'default_address' => 0,
        );
        $this->db->insert('customer_address', $data);
    }

    function getCartProductPrice($productId){

        $main = new Main();
        $this->db->select('price_data');
        $this->db->where_in('product_id',$productId);
        $product = $this->db->get('catalog_product')->row();
        $productPrice = $main->getProductPrice($product->price_data);
        if($productPrice->special_price_index){
            return $productPrice->special_price_index;
        }else{
            return $productPrice->price_index;
        }
    }

    function getCombinationPrice($parentId,$combination)
    {
        $this->db->select('price_data');
        $this->db->where('status', 'Enable');
        $this->db->where('combination',$combination);
        $this->db->where('parent_id', $parentId);
        $productPrice = $this->db->get('configurable_products')->row();
        if($productPrice->special_price_index){
            return $productPrice->special_price_index;
        }else{
            return $productPrice->price_index;
        }
    }

    function getCartPrice($cartData)
    {
        $combination = implode(',',$cartData['config']);
        $productId = $cartData['product_id'];
        if(empty($combination)) {
            $price = $this->getCartProductPrice($productId);
        }else{
            $price = $this->getCombinationPrice($productId,$combination);
        }
        return $price;
    }

    function getAllowedCountries()
    {
        $main = new Main();
        $allowedCountriesConfig = json_decode($main->getConfigValue('configurations/general/allowed_countries'),true);
        return $allowedCountriesConfig;
    }

    function getActiveShippingMethods()
    {
        $this->db->where('enabled', 'yes');
        $collection =  $this->db->get('shipping_methods')->result();
        return $collection;
    }

    function getActivePaymentMethods()
    {
        $this->db->where('enabled', 'yes');
        $collection =  $this->db->get('payment_methods')->result();
        return $collection;
    }

    function getShippingChargeById($shippingId)
    {
        $this->db->select('charge,shipping_title,shipping_id');
        $this->db->where_in('shipping_id',$shippingId);
        $shipping_methods = $this->db->get('shipping_methods')->row();
        return $shipping_methods;
    }

    function getPaymentMethodById($paymentId)
    {
        $this->db->select('payment_title,payment_id');
        $this->db->where_in('payment_id',$paymentId);
        $payment_methods = $this->db->get('payment_methods')->row();
        return $payment_methods;
    }

    function array_equal($a, $b) {
        return (
            is_array($a)
            && is_array($b)
            && count($a) == count($b)
            && array_diff($a, $b) === array_diff($b, $a)
        );
    }

    function getPaymentMethodData($id)
    {
        $this->db->where('payment_id', $id);
        $result =  $this->db->get('payment_methods')->row();
        return $result;
    }

    function getOrderStatus($id)
    {
        $paymentMethod = $this->getPaymentMethodData($id);
        switch ($paymentMethod->type) {
            case 'offline':
                $status = 'pending';
                break;
            case "prepaid":
                $status = 'processing';
                break;
            default:
                $status = 'pending';
        }
        return $status;
    }

    function createOrder($data)
    {
        $this->db->insert('sales_order',$data);
        $orderId = $this->db->insert_id();
        return $orderId;
    }

    function insertShippingAddress($data,$orderId,$customerId)
    {
        $main = new Main();
        $insertData = array(
            'order_id' => $orderId,
            'customer_id' => $customerId,
            'email' => $main->ifLogin()->email,
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'phone_number' => $data->phone_number,
            'address' => $data->address,
            'country_code' => $data->country_code,
            'city' => $data->city,
            'state' => $data->state,
            'zip_code' => $data->zip_code,
        );

        $this->db->insert('sales_order_shipping_address',$insertData);
        $shippingAddressId = $this->db->insert_id();

        $orderUpdate = array(
            'shipping_address_id' => $shippingAddressId,
        );
        $this->db->where('id',$orderId);
        $this->db->update('sales_order',$orderUpdate);
        return $shippingAddressId;
    }

    function insertBillingAddress($data,$orderId,$customerId)
    {
        $main = new Main();
        $insertData = array(
            'order_id' => $orderId,
            'customer_id' => $customerId,
            'email' => $main->ifLogin()->email,
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'phone_number' => $data->phone_number,
            'address' => $data->address,
            'country_code' => $data->country_code,
            'city' => $data->city,
            'state' => $data->state,
            'zip_code' => $data->zip_code,
        );

        $this->db->insert('sales_order_billing_address',$insertData);
        $billingAddressId = $this->db->insert_id();

        $orderUpdate = array(
            'billing_address_id' => $billingAddressId,
        );
        $this->db->where('id',$orderId);
        $this->db->update('sales_order',$orderUpdate);

        return $billingAddressId;
    }

    function updateSequenceOrder($orderId,$incId)
    {
        $orderUpdate = array(
            'order_increment_id' => $incId,
        );
        $this->db->where('id',$orderId);
        $this->db->update('sales_order',$orderUpdate);
        return $incId;
    }

    function insertOrderProducts($arrayBatchProduct)
    {
        $this->db->insert_batch('sales_order_item', $arrayBatchProduct);
    }

    function getCustomerAddress($customerId){
        $this->db->where('customer_id',$customerId);
        $this->db->where('address_type','shipping');
        $res = $this->db->get('customer_address')->result();
        return $res;
    }

    function getDefaultBillingAddress($customerId)
    {
        $this->db->where('customer_id',$customerId);
        $this->db->where('address_type','billing');
        $res = $this->db->get('customer_address')->row();
        return $res;
    }

    function getDefaultShippingAddress($customerId)
    {
        $this->db->where('customer_id',$customerId);
        $this->db->where('address_type','shipping');
        $res = $this->db->get('customer_address')->row();
        return $res;
    }

    function getAddressById($addressId)
    {
        $this->db->where('id',$addressId);
        $res = $this->db->get('customer_address')->row();
        return $res;
    }
}