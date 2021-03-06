<table class="table" id="tabletaller">
    <thead class="text-primary">
        <th><small>Opciones</small></th>
        <th><small class="text-muted">Modelo/Serial o IMEI</small></th>
        <th><small>Cliente</small> </th>
        <th><small>Fecha Recibido</small></th>
        <th><small>Fecha Entrega</small></th>
        <th><small>Cambiar Status</small></th>
        <th><small>Imprimir</small></th>
    </thead>
    <tbody>
        @foreach($Equipo->sortByDesc('id') as $equipo)
        @if($equipo->id_sucursal==Auth::user()->id_sucursal&&$equipo->status==2)
        <tr>
            <td>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item text-white">
                        <button class="bg-white text-white accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{$equipo->id}}" aria-expanded="true"
                            aria-controls="collapseOne">
                        </button>
                        <div id="collapseOne{{$equipo->id}}" class="accordion-collapse collapse text-white "
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="width: 200px;">
                                <a href="" class=" d-inline " data-toggle="modal" data-target="#modaledittaller"
                                    data-id="{{$equipo->id}}" data-pago="{{$equipo->pago}}"
                                    data-email="{{$equipo->email}}"
                                    data-telefono="{{$equipo->telefono}}"
                                    data-presupuesto="{{$equipo->presupuesto}}" data-inversion="{{$equipo->inversion}}"
                                    data-id_servicio="{{$equipo->id_servicio}}" data-precio="{{$equipo->precio}}"
                                    data-id_sucursal="{{Auth::user()->id_sucursal}}" data-id_user="{{$equipo->id_user}}"
                                    data-id_cliente="{{$equipo->id_cliente}}" data-serial="{{$equipo->serial}}"
                                    data-imei="{{$equipo->imei}}" data-id_captura="{{$equipo->id_captura}}"
                                    data-modelo="{{$equipo->modelo}}" data-uniqueid="{{$equipo->uniqueid}}"
                                    data-id_comentario="{{$equipo->id_comentario}}"
                                    data-fecha_recibido="{{$equipo->fecha_recibido}}"
                                    data-fecha_entrega="{{$equipo->fecha_entrega}}" data-status="{{$equipo->status}}"
                                    data-tiene_camara="{{$equipo->Tiene_Camara}}"
                                    data-centro_carga="{{$equipo->Centro_Carga}}" data-señal="{{$equipo->Señal}}"
                                    data-lectorsd="{{$equipo->LectorSD}}" data-altavoz="{{$equipo->AltaVoz}}"
                                    data-botonhome="{{$equipo->BotonHome}}" data-microfono="{{$equipo->Microfono}}"
                                    data-lector_sim="{{$equipo->Lector_SIM}}"
                                    data-volumenplus="{{$equipo->Volumenplus}}"
                                    data-volumenless="{{$equipo->Volumenless}}" data-encendido="{{$equipo->Encendido}}"
                                    data-auricular="{{$equipo->Auricular}}" data-touch="{{$equipo->Touch}}"
                                    data-bateria="{{$equipo->Bateria}}" data-enciende="{{$equipo->Enciende}}"
                                    data-memoria="{{$equipo->Memoria}}" data-sim="{{$equipo->SIM}}"
                                    data-golpes="{{$equipo->Golpes}}"
                                    data-tiene_bateria="{{$equipo->Tiene_Bateria}}"><svg width="2em" height="2em"
                                        viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>
                                <a class=" d-inline " href="/deleteequipo/{{$equipo->id}}"><svg width="2em" height="2em"
                                        viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></a>
                                <a class=" d-inline " href="" data-toggle="modal" data-target="#modal_foto"
                                    data-id="{{$equipo->id}}"      data-email="{{$equipo->email}}"
                                    data-telefono="{{$equipo->telefono}}" data-presupuesto="{{$equipo->presupuesto}}"
                                    data-inversion="{{$equipo->inversion}}" data-id_user="{{$equipo->id_user}}"
                                    data-servicio="{{$equipo->id_servicio}}" data-id_cliente="{{$equipo->id_cliente}}"
                                    data-serial="{{$equipo->serial}}" data-imei="{{$equipo->imei}}"
                                    data-id_captura="{{$equipo->id_captura}}"
                                    data-id_comentario="{{$equipo->id_comentario}}"
                                    data-fecha_recibido="{{$equipo->fecha_recibido}}"
                                    data-fecha_entrega="{{$equipo->fecha_entrega}}" data-status="{{$equipo->status}}"
                                    data-Tiene_Camara="{{$equipo->Tiene_Camara}}"
                                    data-Centro_Carga="{{$equipo->Centro_Carga}}" data-Señal="{{$equipo->Señal}}"
                                    data-LectorSD="{{$equipo->LectorSD}}" data-AltaVoz="{{$equipo->AltaVoz}}"
                                    data-BotonHome="{{$equipo->BotonHome}}" data-Microfono="{{$equipo->Microfono}}"
                                    data-Lector_SIM="{{$equipo->Lector_SIM}}"
                                    data-Volumenplus="{{$equipo->Volumenplus}}"
                                    data-Volumenless="{{$equipo->Volumenless}}" data-Encendido="{{$equipo->Encendido}}"
                                    data-Auricular="{{$equipo->Auricular}}" data-Touch="{{$equipo->Touch}}"
                                    data-Bateria="{{$equipo->Bateria}}" data-Enciende="{{$equipo->Enciende}}"
                                    data-Memoria="{{$equipo->Memoria}}" data-SIM="{{$equipo->SIM}}"
                                    data-Golpes="{{$equipo->Golpes}}" data-modelo="{{$equipo->modelo}}"
                                    data-Tiene_Bateria="{{$equipo->Tiene_Bateria}}"><svg width="2em" height="2em"
                                        viewBox="0 0 16 16" class="bi bi-camera text-success" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15 12V6a1 1 0 0 0-1-1h-1.172a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 9.173 3H6.828a1 1 0 0 0-.707.293l-.828.828A3 3 0 0 1 3.172 5H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                        <path fill-rule="evenodd"
                                            d="M8 11a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        <path d="M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                    </svg></a>

                                <a class=" d-inline " href="/galleria/{{$equipo->id}} " target="_blank"
                                    data-id="{{$equipo->id}}"      data-email="{{$equipo->email}}"
                                    data-telefono="{{$equipo->telefono}}" data-presupuesto="{{$equipo->presupuesto}}"
                                    data-inversion="{{$equipo->inversion}}" data-id_user="{{$equipo->id_user}}"
                                    data-id_cliente="{{$equipo->id_cliente}}" data-serial="{{$equipo->serial}}"
                                    data-imei="{{$equipo->imei}}" data-id_captura="{{$equipo->id_captura}}"
                                    data-id_comentario="{{$equipo->id_comentario}}"
                                    data-fecha_recibido="{{$equipo->fecha_recibido}}"
                                    data-fecha_entrega="{{$equipo->fecha_entrega}}" data-status="{{$equipo->status}}"
                                    data-Tiene_Camara="{{$equipo->Tiene_Camara}}"
                                    data-Centro_Carga="{{$equipo->Centro_Carga}}" data-Señal="{{$equipo->Señal}}"
                                    data-LectorSD="{{$equipo->LectorSD}}" data-AltaVoz="{{$equipo->AltaVoz}}"
                                    data-BotonHome="{{$equipo->BotonHome}}" data-Microfono="{{$equipo->Microfono}}"
                                    data-Lector_SIM="{{$equipo->Lector_SIM}}"
                                    data-Volumenplus="{{$equipo->Volumenplus}}"
                                    data-Volumenless="{{$equipo->Volumenless}}" data-Encendido="{{$equipo->Encendido}}"
                                    data-Auricular="{{$equipo->Auricular}}" data-Touch="{{$equipo->Touch}}"
                                    data-Bateria="{{$equipo->Bateria}}" data-Enciende="{{$equipo->Enciende}}"
                                    data-Memoria="{{$equipo->Memoria}}" data-SIM="{{$equipo->SIM}}"
                                    data-Golpes="{{$equipo->Golpes}}" data-modelo="{{$equipo->modelo}}"
                                    data-Tiene_Bateria="{{$equipo->Tiene_Bateria}}"><svg width="2em" height="2em"
                                        viewBox="0 0 16 16" class="bi bi-film text-warning" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z" />
                                    </svg></a>

                                <a class=" d-inline " href="" data-toggle="modal" data-target="#modal_pago"
                                    data-id="{{$equipo->id}}"      data-email="{{$equipo->email}}"
                                    data-telefono="{{$equipo->telefono}}" data-presupuesto="{{$equipo->presupuesto}}"
                                    data-inversion="{{$equipo->inversion}}" data-pago="{{$equipo->pago}}"
                                    data-adelanto="{{$equipo->adelanto}}" data-modelo="{{$equipo->modelo}}"
                                    data-id_servicio="{{$equipo->id_servicio}}" data-id_user="{{$equipo->id_user}}"
                                    data-id_cliente="{{$equipo->id_cliente}}" data-serial="{{$equipo->serial}}"
                                    data-imei="{{$equipo->imei}}" data-id_sucursal="{{$equipo->id_sucursal}}"><svg
                                        width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cash text-info"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" />
                                        <path
                                            d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                                    </svg>
                                </a>
                                <a type="button" class="btn btn-outline-dark" href="" data-toggle="modal"
                                    data-target="#modal_info" data-id="{{$equipo->id}}" data-pago="{{$equipo->pago}}"
                                    data-presupuesto="{{$equipo->presupuesto}}"      data-email="{{$equipo->email}}"
                                    data-telefono="{{$equipo->telefono}}" data-inversion="{{$equipo->inversion}}"
                                    data-id_servicio="{{$equipo->id_servicio}}" data-precio="{{$equipo->precio}}"
                                    data-id_sucursal="{{Auth::user()->id_sucursal}}" data-id_user="{{$equipo->id_user}}"
                                    data-id_cliente="{{$equipo->id_cliente}}" data-serial="{{$equipo->serial}}"
                                    data-imei="{{$equipo->imei}}" data-id_captura="{{$equipo->id_captura}}"
                                    data-id_comentario="{{$equipo->id_comentario}}" data-modelo="{{$equipo->modelo}}"
                                    data-uniqueid="{{$equipo->uniqueid}}"
                                    data-fecha_recibido="{{$equipo->fecha_recibido}}"
                                    data-fecha_entrega="{{$equipo->fecha_entrega}}"
                                    data-status="{{$equipo->status}}">Mas
                                    info de {{$equipo->modelo}}</a>
                            </div>
                        </div>
                    </div>

                </div>

            </td>
            <td><small>Orden #
                    {{$equipo->id}}</small><br><small>{{$equipo->modelo}}</small><br>
                <small
                    class="text-muted">@if($equipo->serial==''){{$equipo->imei}}@else{{$equipo->serial}}@endif</small>
            </td>
            <!--
                    @foreach ($Usuario as $user)
                    @if($user->id==$equipo->id_user)
                    <td><small>
                            {{$user->name}}</small></td>
                    @endif
                    @endforeach-->
            <td><small>{{$equipo->id_cliente }}</small></td>
            <td><input class="text-secondary form-control" type="date" value="{{$equipo->fecha_recibido}}"></td>
            <td>
                @php
                $date1 = new DateTime("now");
                $date2 = new DateTime($equipo->fecha_entrega);
                $diff = $date1->diff($date2);
                @endphp

                @if($equipo->status==1 || $equipo->status==3 || $equipo->status==4
                ||
                $equipo->status==5|| $equipo->status==0)
                @if($date1->format("Y-m-d") == $equipo->fecha_entrega )
                @php $contador++; @endphp
                <div class="input-group-prepend ">
                    <span class="input-group-text text-danger" id="basic-addon1"><svg width="1em" height="1em"
                            viewBox="0 0 16 16" class="bi bi-alarm" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                        </svg>
                        <input class="text-danger" type="date" value="{{$equipo->fecha_entrega}}">
                    </span>

                </div>
                @elseif($date1->format("Y-m-d") >= $equipo->fecha_entrega )
                <input class="text-danger form-control" type="date" value="{{$equipo->fecha_entrega}}">
                <small class="text-danger card-footer">Exceso de tiempo por:
                    @if($diff->days>=1)
                    {{$diff->days .' dias'}} @else
                    {{$diff->days .' dia'}}@endif</small>
                @else
                <input class="text-info form-control" type="date" value="{{$equipo->fecha_entrega}}">
                <small class="text-success card-footer">faltan: @if($diff->days>=1)
                    {{$diff->days .' dias'}} @else
                    {{$diff->days .' dia'}}@endif</small>
                @endif
                @elseif($equipo->status==6)
                <div class="card text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-patch-check-fill text-success ml-auto mr-auto" viewBox="0 0 16 16">
                        <path
                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                    </svg>
                    <h4 class="card-title text-info ml-auto mr-auto">Entregado</h4>
                    <p class="card-text ml-auto mr-auto">{{$equipo->fecha_entrega}}
                    </p>
                </div>
                </div>
                @elseif($equipo->status==2)
                <small>
                    <div class="card text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-patch-exclamation-fill text-danger ml-auto mr-auto" viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <h4 class="card-title text-warning ml-auto mr-auto">Cancelado</h4>
                        <p class="card-text ml-auto mr-auto">{{$equipo->fecha_entrega}}</p>
                    </div>
                    </div>
                    @endif
            </td>
            <td>
                <a href="" @if($equipo->status==2) class="btn btn-danger"
                    @endif
                    @if($equipo->status==6)
                    class="btn btn-secondary" @endif class="btn btn-dark"
                    data-id="{{$equipo->id}}"
                    data-status="{{$equipo->status}}"
                    data-pago="{{$equipo->pago}}"
                    data-toggle="modal" data-target="#modal_status">
                    @if($equipo->status==0)
                    Recibido
                    @elseif($equipo->status==1)
                    En Revision
                    @elseif($equipo->status==2)
                    Cancelado
                    @elseif($equipo->status==3)
                    Espera
                    @elseif($equipo->status==4)
                    A espera de Cliente(Contactarse a Sucursal)
                    @elseif($equipo->status==5)
                    Listo(Para entregar)
                    @elseif($equipo->status==6)
                    Entregado
                    @endif
                    <i class="far fa-clone"></i>
                </a></td>

            <td>
                <a class="custom-control-inline" href="/imprimir/id={{$equipo->id}}&csrf={{ csrf_token() }}"
                    target="_blank" data-id="{{$equipo->id}}" data-pago="{{$equipo->pago}}"
                    data-id_servicio="{{$equipo->id_servicio}}" data-presupuesto="{{$equipo->presupuesto}}"
                    data-inversion="{{$equipo->inversion}}" data-precio="{{$equipo->precio}}"
                    data-id_sucursal="{{Auth::user()->id_sucursal}}" data-id_user="{{$equipo->id_user}}"
                    data-id_cliente="{{$equipo->id_cliente}}" data-serial="{{$equipo->serial}}"
                    data-imei="{{$equipo->imei}}" data-id_captura="{{$equipo->id_captura}}"
                    data-id_comentario="{{$equipo->id_comentario}}"       data-email="{{$equipo->email}}"
                    data-telefono="{{$equipo->telefono}}" data-fecha_recibido="{{$equipo->fecha_recibido}}"
                    data-fecha_entrega="{{$equipo->fecha_entrega}}" data-status="{{$equipo->status}}"
                    data-Tiene_Camara="{{$equipo->Tiene_Camara}}" data-Centro_Carga="{{$equipo->Centro_Carga}}"
                    data-Señal="{{$equipo->Señal}}" data-LectorSD="{{$equipo->LectorSD}}"
                    data-AltaVoz="{{$equipo->AltaVoz}}" data-BotonHome="{{$equipo->BotonHome}}"
                    data-Microfono="{{$equipo->Microfono}}" data-Lector_SIM="{{$equipo->Lector_SIM}}"
                    data-Volumenplus="{{$equipo->Volumenplus}}" data-Volumenless="{{$equipo->Volumenless}}"
                    data-Encendido="{{$equipo->Encendido}}" data-Auricular="{{$equipo->Auricular}}"
                    data-Touch="{{$equipo->Touch}}" data-Bateria="{{$equipo->Bateria}}"
                    data-Enciende="{{$equipo->Enciende}}" data-Memoria="{{$equipo->Memoria}}"
                    data-SIM="{{$equipo->SIM}}" data-Golpes="{{$equipo->Golpes}}"
                    data-Tiene_Bateria="{{$equipo->Tiene_Bateria}}"><i class="far fa-file-pdf text-warning h5 face"
                        alt="Imprime archivo PDF"></i></a>
                <a href="/QR/{{$equipo->id}}" target="_blank">
                    <h5><i class="fas fa-qrcode face" alt="Imprime QR"></i>
                    </h5>
                </a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
