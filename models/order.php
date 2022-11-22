<?php
require_once("database.php");
class Order extends Database {
    private   $price;
    private   $vat;
    private   $date;
    private   $orderStatus;
    protected $rows;

    function getPrice() {
        return $this->price;
    }

    function getVat() {
        return $this->vat;
    }

    function getDate() {
        return $this->date;
    }

    function getOrderStatus() {
        return $this->date;
    }

    function setPrice($price) {
        $this->price = $price;
    }
    function setVat($vat) {
        $this->vat = $vat;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }
    
    //para mostrar la tabla de pedidos, solicita a la BBDD los datos de la tabla
    Function orderStatus(){
        $sql = "SELECT pedidos.IdPedido, pedidos.Precio_sin_IVA, pedidos.Precio_IVA, pedidos.Estado_Pedido, clientes.DNI FROM (pedidos INNER JOIN linea_pedido ON pedidos.IdPedido = linea_pedido.IdPedido) INNER JOIN clientes ON clientes.IdCliente = linea_pedido.IdCliente WHERE clientes.IdCliente like linea_pedido.IdCliente";
        //$sql = "SELECT * FROM pedidos";
        $result = $this->db->query($sql);
        return $result;
    }

    //actualiza el estado de un pedido.
    function statusModification($id, $estado){
        $sql = "UPDATE pedidos SET Estado_Pedido = '".$estado."' WHERE IdPedido= '".$id."'";
        $result = $this->db->query($sql);
    }

    function searchOrders($filtro){
        if(isset($filtro['stateSearch'])) {
            $sql = "SELECT pedidos.IdPedido, pedidos.Precio_sin_IVA, pedidos.Precio_IVA, pedidos.Estado_Pedido, clientes.DNI FROM (pedidos INNER JOIN linea_pedido ON pedidos.IdPedido = linea_pedido.IdPedido) INNER JOIN clientes ON clientes.IdCliente = linea_pedido.IdCliente WHERE Estado_Pedido = '".$filtro['stateSearch']."'";
            $result = $this->db->query($sql);
            return $result;
        }
        else if(isset($filtro['userSearch'])) {
            $sql = "SELECT pedidos.IdPedido, pedidos.Precio_sin_IVA, pedidos.Precio_IVA, pedidos.Estado_Pedido, clientes.DNI FROM (pedidos INNER JOIN linea_pedido ON pedidos.IdPedido = linea_pedido.IdPedido) INNER JOIN clientes ON clientes.IdCliente = linea_pedido.IdCliente WHERE clientes.DNI LIKE '%".$filtro['userSearch']."%'";
            $result = $this->db->query($sql);
            return $result;
        }
        
    }
}

?>