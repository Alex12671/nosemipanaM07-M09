<?php
class OrderController{
    //Esta función es para mostrar los pedidos al administrador
    public function orderStatus(){
        if($_SESSION['rol']=='admin'){
            require_once "models/order.php";
            $order = new Order();
            $orderStatus = $order->orderStatus();
            require_once "views/orders/orderStatus.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    //esta función llama al formulario para modificar el estado del pedido
    public function statusProcess(){
        if($_SESSION['rol']=='admin'){
            require_once "views/orders/statusProcess.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    //Esta función modifica el estado del pedido 
    public function statusModification(){
        if($_SESSION['rol']=='admin'){
            require_once "models/order.php";
            $order = new Order();
            $edit = $order->statusModification($_POST['ID'], $_POST['Estado_Pedido']);
            //vuelve a la tabla de pedidos 
            $order2 = new Order();
            $orderStatus = $order2->orderStatus();
            require_once "views/orders/orderStatus.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function searchOrders() {
        if($_SESSION['rol']=='admin'){
            require_once "models/order.php";
            $order = new Order();
            $orderStatus = $order->searchOrders($_POST);
            require_once "views/orders/orderStatus.php";
        }else{
            print("Error, no estás validado como admin");
        }
    }

    public function AddOrder() {
        if($_SESSION['rol']=='admin'){
            require_once "models/order.php";
            if(isset($_SESSION['rol']) && $_SESSION ['rol'] == 'comprador') {
                $order = new Order();
                $addOrder = $order->AddOrder($_SESSION['id'],$_GET['total']);
                $order2 = new Order();
                $addOrderLine = $order2->AddOrderLine($addOrder);
                unset($_SESSION['Cart']);
                unset($_SESSION['TotalQuantity']);
                ?><meta http-equiv="refresh" content="0; url=index.php?controller=product&action=ShowMain"> <?php  
            }
            else {
                ?><meta http-equiv="refresh" content="0; url=index.php?controller=user&action=logUser&orderFailed=1"> <?php  
            }
        }else{
            print("Error, no estás validado como admin");
        }
    }
}
?>