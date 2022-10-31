<?php
class OrderController{
    //El controller tiene las diferentes acciones que se pueden hacer sobre el administrador 
    public function orderStatus(){
        require_once "models/order.php";
        $order = new Order();
        $orderStatus = $order->orderStatus();
        require_once "views/orders/orderStatus.php";
    }

    public function statusProcess(){
        require_once "views/orders/statusProcess.php";
    }

    public function statusModification(){
        require_once "models/order.php";
        $order = new Order();
        $edit = $order->statusModification($_POST['ID'], $_POST['Estado_Pedido']);
        $order2 = new Order();
        $orderStatus = $order2->orderStatus();
        require_once "views/orders/orderStatus.php";
    }
    
}
?>