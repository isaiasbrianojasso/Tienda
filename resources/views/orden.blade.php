@foreach ($Settings as $setting)
@endforeach
@foreach ($Equipo as $equipo)
@foreach ($Settings as $settings)
@foreach ($Usuario as $usuario)
@if($equipo->id==$id && $settings->id==1)
@php
$id=$equipo->id;
$id_captura=$equipo->id_captura;
$setting_direccion=$settings->setting_direccion;
$setting_nombre=$settings->setting_nombre;
$setting_rfc=$settings->setting_rfc;
$setting_contacto=$settings->setting_contacto;
$setting_telefono=$settings->setting_telefono;
$setting_logo=$settings->setting_logo;
$setting_abierto=$settings->setting_abierto;
$setting_moneda=$settings->setting_moneda;
$setting_email=$settings->setting_email;
$fecha_recibido=$equipo->fecha_recibido;
$fecha_entrega=$equipo->fecha_entrega;
$status=$equipo->status;
$id_cliente=$equipo->id_cliente;
$Tiene_Camara=$equipo->Tiene_Camara;
$Centro_Carga=$equipo->Centro_Carga;
$Señal=$equipo->Señal;
$LectorSD=$equipo->LectorSD;
$AltaVoz=$equipo->AltaVoz;
$BotonHome=$equipo->BotonHome;
$Microfono=$equipo->Microfono;
$Lector_SIM=$equipo->Lector_SIM;
$Volumenplus=$equipo->Volumenplus;
$Volumenless=$equipo->Volumenless;
$Encendido=$equipo->Encendido;
$Auricular=$equipo->Auricular;
$Touch=$equipo->Touch;
$Bateria=$equipo->Bateria;
$Enciende=$equipo->Enciende;
$Memoria=$equipo->Memoria;
$SIM=$equipo->SIM;
$Golpes=$equipo->Golpes;
$Bateria=$equipo->Bateria;
$modelo=$equipo->modelo;
$imei=$equipo->imei;
$serial=$equipo->serial;
$id_comentario=$equipo->id_comentario;
$pago=$equipo->pago;
$presupuesto=$equipo->presupuesto;
$moneda=$settings->moneda;
$pago=$equipo->pago;
@endphp
@else
@php echo header('HTTP/1.0 404 Not Found'); @endphp
@endif
@endforeach
@endforeach
@endforeach

<!DOCTYPE html>
<html lang="en" class="bg-white">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script type="text/javascript" src="../dist/js/jquery.smartCart.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<!--Floating WhatsApp css-->
<link rel="stylesheet"
    href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
<style>
    .container {
        position: relative;
        max-width: 800px;
        /* Maximum width */
        margin: 0 auto;
        /* Center it */
    }

    .container .content {
        position: absolute;
        /* Position the background text */
        bottom: 0;
        /* At the bottom. Use top:0 to append it to the top */
        background: rgb(0, 0, 0);
        /* Fallback color */
        background: rgba(0, 0, 0, 0.5);
        /* Black background with 0.5 opacity */
        color: #f1f1f1;
        /* Grey text */
        width: 100%;
        /* Full width */
        padding: 20px;
        /* Some padding */
    }
</style>
<script type="text/javascript"
    src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js">
</script>
<style>
    body:after {
        content: '{{$settings->setting_nombre}}';
        font-size: 2em;
        color: rgba(52, 166, 214, 0.4);
        z-index: 9999;

        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        -webkit-pointer-events: none;
        -moz-pointer-events: none;
        -ms-pointer-events: none;
        -o-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
</style>
<meta charset="UTF-8">
<title>ORDEN #{{$id}}</title>
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!--Floating WhatsApp css-->
<link rel="stylesheet"
    href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
<script type="text/javascript"
    src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js">
</script>
<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<style>
    /**THE SAME CSS IS USED IN ALL 3 DEMOS**/
    /**gallery margins**/
    ul.gallery {
        margin-left: 3vw;
        margin-right: 3vw;
    }

    .zoom {
        -webkit-transition: all 0.35s ease-in-out;
        -moz-transition: all 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        cursor: -webkit-zoom-in;
        cursor: -moz-zoom-in;
        cursor: zoom-in;
    }

    .zoom:hover,
    .zoom:active,
    .zoom:focus {
        /**adjust scale to desired size,
add browser prefixes**/
        -ms-transform: scale(2.5);
        -moz-transform: scale(2.5);
        -webkit-transform: scale(2.5);
        -o-transform: scale(2.5);
        transform: scale(2.5);
        position: relative;
        z-index: 100;
    }

    /**To keep upscaled images visible on mobile,
increase left & right margins a bit**/
    @media only screen and (max-width: 768px) {
        ul.gallery {
            margin-left: 15vw;
            margin-right: 15vw;
        }

        /**TIP: Easy escape for touch screens,
give gallery's parent container a cursor: pointer.**/
        .DivName {
            cursor: pointer
        }
    }
</style>
<style>
    @import url(http://fonts.googleapis.com/css?family=Bree+Serif);

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Bree Serif', serif;
    }
</style>

<head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- <img src="../fotos/{{$id_captura}}" alt="">-->
                <h5><a href=""><img alt="" />
                        <p>Nombre: {{$setting_nombre}}</p>
                        <p>Direccion: {{$setting_direccion}}</p>
                        <p>RFC: {{$setting_rfc}}</p>
                        <p>Email: {{$setting_contacto}}</p>
                        <p>Telefono: {{$setting_telefono}}</p>
                    </a>
                </h5>

            </div>
            <div class="col-md-1">
                @if($settings->setting_logo=="")
                <h6><a href=" "><img style="border-radius:70%;" width="100px;" height="20%" alt="{{$setting_logo}}"
                            src="{{$setting_logo}}" /></a></h6>
                @else
                <h6><a href=" "><img style="border-radius:70%;" width="100px;" height="20%" alt="{{$setting_logo}}"
                            src="{{$setting_logo}}" /></a></h6>
                @endif
            </div>
            <div class="col-xs-6 text-right">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>

            <hr />

            <h1 style="text-align: center;">Revision de Orden Nº :
                #{{$id}}
            </h1>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Fecha Alta Orden : {{$fecha_recibido}} </h4>
                            <h4>Fecha Posible Entrega Orden : {{$fecha_entrega}}</h4>
                            <h4>Status :
                                @if($status==0)
                                Recibido
                                @elseif($status==1)
                                En Revision
                                @elseif($status==2)
                                Cancelado
                                @elseif($status==3)
                                Espera
                                @elseif($status==4)
                                A espera de Cliente(Contactarse a Sucursal)
                                @elseif($status==5)
                                Listo(Para entregar)
                                @elseif($status==6)
                                Entregado
                                @endif</h4>

                        </div>
                        <div class="panel-body">

                            <h4>Cliente :
                                <a href="#">{{$id_cliente}}</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            </h4>
                            <h4>Tecnico :
                                <a href="#">@if($usuario->id == $equipo->id_user&&$usuario->rol =='Tecnico')
                                    {{$usuario->name}} @endif No
                                    disponible</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h4>
                        </div>
                    </div>
                </div>

            </div>

            <pre></pre>
            <table class="table table-bordered text-white">
                <thead>
                    <tr>
                        <th style="text-align: center; border-radius: 2em;">
                            <h4>Revision de componentes :</h4>
                        </th>
                        <th style="text-align: center; border-radius: 2em;">
                            <h4>Diagnostico Previo :</h4>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="3" style="text-align: center; border-radius: 2em;">
                            <div class="col-6-md">
                                <div class="form-group">
                                    <div class="card text-left">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Tiene_Camara"
                                                    name="Tiene_Camara" @if($Tiene_Camara !='' ) checked @endif
                                                    disabled>
                                                <label class="form-check-label" for="inlineCheckbox1">Camara</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Centro_Carga"
                                                    name="Centro_Carga" @if($Centro_Carga !='' ) checked @endif
                                                    disabled>
                                                <label class="form-check-label" for="inlineCheckbox2">Centro
                                                    Carga</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Señal" name="Señal"
                                                    @if($Señal !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Señal</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="LectorSD"
                                                    name="LectorSD" @if($LectorSD !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">LectorSD</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="AltaVoz"
                                                    name="AltaVoz" @if($AltaVoz !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">AltaVoz</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="BotonHome"
                                                    name="BotonHome" @if($BotonHome !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">BotonHome</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Microfono"
                                                    name="Microfono" @if($Microfono !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Microfono</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Lector_SIM"
                                                    name="Lector_SIM" @if($Lector_SIM !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Lector SIM</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Volumenplus"
                                                    name="Volumenplus" @if($Volumenplus !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Volumen +</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Volumenless"
                                                    name="Volumenless" @if($Volumenless !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Volumen -</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Encendido"
                                                    name="Encendido" @if($Encendido !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Encendido</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Auricular"
                                                    name="Auricular" @if($Auricular !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Auricular</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Touch" name="Touch"
                                                    @if($Touch !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Touch</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Bateria"
                                                    name="Bateria" @if($Bateria !='' ) checked @endif disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">Bateria</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td rowspan="3" style="text-align: center; border-radius: 2em;"><a href="#">
                                <div class="col-6-md">
                                    <div class="form-group">
                                        <div class="card text-left">
                                            <div class="card-body">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Enciende"
                                                        name="Enciende" @if($Enciende !='' ) checked @endif disabled>
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox3">Enciende?</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Memoria"
                                                        name="Memoria" @if($Memoria !='' ) checked @endif disabled>
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox3">Memoria?</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="SIM" name="SIM"
                                                        @if($SIM !='' ) checked @endif disabled>
                                                    <label class="form-check-label" for="inlineCheckbox3">SIM?</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Golpes"
                                                        name="Golpes" @if($Golpes !='' ) checked @endif disabled>
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox3">Golpes?</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Bateria"
                                                        name="Bateria" @if($Bateria !='' ) checked @endif disabled>
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox3">Bateria?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <pre></pre>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">
                            <h4>Modelo</h4>
                        </th>
                        <th style="text-align: center;">
                            <h4>SERIAL/IMEI</h4>
                        </th>
                        <th style="text-align: center;">
                            <h4>Concepto</h1>
                        </th>
                        <th style="text-align: center;">
                            <h4>Adelanto</h4>
                        </th>
                        <th style="text-align: center;">
                            <h4>Total</h4>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=" text-right "> {{$modelo}}</td>
                        <td style="text-align: center;">@if($imei==''){{$serial}}@else {{$imei}}
                            @endif</td>
                        <td><a href="#"> {{$id_comentario}} </a></td>
                        <td class=" text-right "> {{$pago}}</td>
                        <td class=" text-right "> {{$presupuesto}}</td>

                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;">Total {{$moneda}}</td>
                        <td style="text-align: right;"><a href="#"> @php $temporal= $presupuesto-$pago;
                                @endphp {{$temporal}}</a></td>

                    </tr>
                    <tr>
                        <td class="text-danger" colspan="4" style="text-align: right;">LA PRESENTE INFORMACION PUEDE
                            CAMBIAR DE UN MOMENTO A OTRO POR TANTO ESTA INFORMACION NO ES 100% FIABLE HASTA LA VERSION
                            FINAL</td>
                    </tr>
                </tbody>
            </table>
            <pre></pre>

            <div class="row">
                <div class="col-xs-4">
                    <h1><a href="../{{$id}}.png"><img alt="" src="../{{$id}}.png" /></a></h1>
                </div>
                <div class="col-xs-4">
                    <div class="panel panel-info" style="text-align: right;">
                        <h6> "Este documento no representa un documento legal ni administrativo y no conlleva ninguna
                            accion legal"</h6>
                    </div>
                    <div class="col-xs-4">
                        <a href="/" type="button" class="btn btn-primary btn-lg ml-5">Volver a la tienda </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </head>
    <div class="container mb-5">
        <div class="row">
            @foreach ($Captura as $captura)
            @if($captura->id_equipo==$id)
            @foreach ($Usuario as $usuario)
            @if($usuario->id==$captura->id_user)
            <div class="col-md-6 mb-1">
                <h3>Tecnico:{{$usuario->name}}</h3>
                @if($captura->captura=='')
                <img src="https://cocesna.org/repuestos/img/imgnofound.png" alt="" width="100%" height="100%">
                @elseif($captura->captura!='')
                <img src="../fotos/{{$captura->captura}}" alt="{{$captura->descripcion}}">
                <div class="content">
                    <h1>Tecnico:{{$usuario->name}}</h1>
                    <p>{{$captura->descripcion}}</p>
                </div>
                @endif
            </div>
            @endif
            @endforeach
            @endif
            @endforeach
        </div>
    </div>

    <div class="toast fixed-bottom ml-auto " role="alert" data-delay="986000" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img width="40px;" src="https://iunlock.store/unlock-2.png" class="rounded mr-2" alt="...">
            <strong class="mr-auto">Estimado @if($id_cliente==$usuario->id){{$usuario->name}}@endif</a></strong>
            <small class="text-muted">hace 11 minutos</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <h5>El status de su orden es: @if($status==0)
                Recibido
                @elseif($status==1)
                En Revision
                @elseif($status==2)
                Cancelado
                @elseif($status==3)
                Espera
                @elseif($status==4)
                A espera de Cliente(Contactarse a Sucursal)
                @elseif($status==5)
                Listo(Para entregar)
                @elseif($status==6)
                Entregado
                @endif </h5>
        </div>
    </div>
    <div id="WAButton"></div>
    <script>
        $('.toast').toast('show');
    </script>
    @extends('footer')
</body>

<!-- Modal -->
<div class="modal fade" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg> Atencion </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title">IMPORTANTE</h4>
                            <p class="card-text">Estimado:
                                @if($equipo->id_cliente==$usuario->id){{$usuario->name}}@endif LA PRESENTE PAGINA SOLO
                                REPRESENTA LA INFORMACION ACERCA DEL EQUIPO HASTA EL MOMENTO Y PUEDE SER CAMBIADA DE UN
                                MOMENTO A OTRO LE PEDIMOS DE LA MANERA MAS ATENTA QUE ESTA INFORMACION SOLO LA TOME PARA
                                CONSULTAR COMO VA SU EQUIPO Y CON NINGUN MOTIVO MAS SI REQUIERE MAS INFORMACION ACERCA
                                DE SU EQUIPO PUEDE CONTACTARSE A {{$setting_telefono}} en un horario de
                                {{$setting_abierto}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Acepto</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#modal_info').modal('show');
</script>

</html>
