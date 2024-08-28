<?php


class Shops extends CI_Controller
{
    public function index()
    {
        $this->load->model("shop");
       
        $view_data = array(
            "items" => $this->shop->select_all(),
            "cart_items" => $this->session->userdata("cart_counter")  
        );


        $this->load->view("shops/index", $view_data);
    }


    public function cart()
    {
        // Retrieve product data and cart quantities from the session
        $products = $this->session->userdata("product");
        $cart = $this->session->userdata("cart");
        // Pass the data to the view
        $view_data = array(
            "products" => $products,
            "cart" => $cart
        );
   
        // Load the cart view with the data
        $this->load->view("shops/cart", $view_data);
    }
    public function add_to_cart()
    {
        // Retrieve product ID and cart data
        $product_id = $this->input->post("product_id");
        $quantity = $this->input->post("quantity");
        $cart = $this->session->userdata("cart");
    
        if ($this->input->post("add")) {
            // Check if product exists in cart
            if (!isset($cart[$product_id])) {
                // New item, add to cart with posted quantity
                $cart[$product_id] = $quantity;
                $counter = $this->session->userdata("cart_counter");
                $counter++;
                $this->session->set_userdata("cart_counter", $counter);
            } else {
                // Existing item, increase its quantity
                $cart[$product_id] += $quantity;
            }
    
            // Retrieve existing products from session
            $products = $this->session->userdata("product");
            
            // Append new product to the existing products array
            $this->load->model("shop");
            $product = $this->shop->select_by_id($product_id);
            $products[$product_id] = $product;
    
            // Update session data with new cart and products
            $this->session->set_userdata("product", $products);
            $this->session->set_userdata("cart", $cart);
    
            // Redirect to homepage

            redirect("/");
        }
    
        // Remove product from cart
        if ($this->input->post("remove")) {
            $product_id = $this->input->post("product_id");
            
            if (isset($cart[$product_id])) {
                // Set quantity to 0 and remove item
                $cart[$product_id] = 0;
                unset($cart[$product_id]);
    
                // Update counter
                $counter = $this->session->userdata("cart_counter");
                $counter--;
                $this->session->set_userdata("cart_counter", $counter);
    
                // Remove product from products array
                $products = $this->session->userdata("product");
                unset($products[$product_id]);
                $this->session->set_userdata("product", $products);
    
                // Update session data with new cart
                $this->session->set_userdata("cart", $cart);
            } else {
                // Item not found in cart, handle feedback to user
                echo "Item not found in your cart.";
            }
    
            // Redirect to appropriate page
            redirect("/");
        }
    }
    
    public function remove_from_cart()
    {
        // Retrieve product ID and cart data
        $product_id = $this->input->post("product_id");
        $cart = $this->session->userdata("cart");
    
        if (isset($cart[$product_id])) {
            // Remove the item from the cart
            unset($cart[$product_id]);
    
            // Update cart counter
            $counter = $this->session->userdata("cart_counter");
            $counter--;
            $this->session->set_userdata("cart_counter", $counter);
    
            // Remove the product from the products array
            $products = $this->session->userdata("product");
            unset($products[$product_id]);
            $this->session->set_userdata("product", $products);
    
            // Update session data with the new cart
            $this->session->set_userdata("cart", $cart);
    
            // Redirect back to the cart page
            redirect("cart");
        } else {
            // Item not found in cart, handle feedback to user
            echo "Item not found in your cart.";
        }
    }
    


}
?>
