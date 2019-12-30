<?php

if(!isset($_POST['producto'], $_POST['precio'])){
    exit("Hubo un error");
}

// Utilizamos el "namespace" para importar las clases
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;


require_once 'config.php';

$producto = htmlspecialchars($_POST['producto']);
$precio = htmlspecialchars($_POST['precio']);
$precio = (int) $precio;
$envio = 0;
$total = $precio + $envio;
// FORMA DE PAGO
$compra = new Payer();
$compra->setPaymentMethod('paypal');  // setPaymentMethod(): Insertar el metodo de pago
                                      // getPaymentMethod(): Obtener el metodo de pago
                                      
// DATOS DEL ARTICUCLO
$articulo = new Item();
$articulo->setName($producto) //setName():Insertar Nombre Articulo.
         ->setCurrency('USD') //setCurrency():Insertar Tipo de Moneda.   Codigos de Monedas: https://developer.paypal.com/docs/api/reference/currency-codes/
         ->setQuantity(1)     //setQuantity():Insertar Cantidad.
         ->setPrice($precio); //setPrice():Insertar Precio

// LISTA DE ARTICULOS
$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo)); //setItems(): Insertar Articulos a la List de Articulos

// DETALLE DEL ARTICULO
$detalle = new Details();     
$detalle->setShipping($envio)  //setShipping():Insertar Monto del Envio
        ->setSubtotal($precio);//setSubtotal():Insertar Monto del Articulo

// DATOS TRANSACCION
$cantidad = new Amount();
$cantidad->setCurrency('USD')   //setCurrency():Insertar Tipo de Moneda
         ->setTotal($precio)    //setTotal():Insertar Total de la transaccion
         ->setDetails($detalle);//setDetails():Insertar Detalle de la Operacion




