<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPresupuestoEquipo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new \App\Models\PresupuestoEquipo();
        $equipo->id_user = $request->get('id_user');
        $equipo->id_cliente = $request->get('id_cliente');
        $equipo->id_servicio = $request->get('id_servicio');
        $equipo->id_sucursal = $request->get('id_sucursal');
        $equipo->serial = $request->get('serial');
        $equipo->imei = $request->get('imei');
        $equipo->pago = $request->get('pago');
        $equipo->id_captura = $request->get('id_captura');
        $equipo->id_comentario = $request->get('descripcion');
        $equipo->fecha_recibido = $request->get('fecha_recibido');
        $equipo->fecha_entrega = $request->get('fecha_entrega');
        $equipo->status = $request->get('status');
        $equipo->Tiene_Camara = $request->get('Tiene_Camara');
        $equipo->Centro_Carga = $request->get('Centro_Carga');
        $equipo->Señal = $request->get('Señal');
        $equipo->LectorSD = $request->get('LectorSD');
        $equipo->AltaVoz = $request->get('AltaVoz');
        $equipo->BotonHome = $request->get('BotonHome');
        $equipo->Microfono = $request->get('Microfono');
        $equipo->Lector_SIM = $request->get('Lector_SIM');
        $equipo->Volumenplus = $request->get('Volumenplus');
        $equipo->Volumenless = $request->get('Volumenless');
        $equipo->Encendido = $request->get('Encendido');
        $equipo->Auricular = $request->get('Auricular');
        $equipo->Touch = $request->get('Touch');
        $equipo->Bateria = $request->get('Bateria');
        $equipo->Enciende = $request->get('Enciende');
        $equipo->Memoria = $request->get('Memoria');
        $equipo->SIM = $request->get('SIM');
        $equipo->Golpes = $request->get('Golpes');
        $equipo->Tiene_Bateria = $request->get('Tiene_Bateria');
        $equipo->save();
        return back()->with('success', "Equipo agregado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipo = \App\Models\PresupuestoEquipo::find($id);
        $equipo->id_user = $request->get('id_user2');
       $equipo->id_cliente = $request->get('id_cliente2');
       $equipo->id_servicio = $request->get('id_servicio2');
       $equipo->serial = $request->get('serial2');
       $equipo->imei = $request->get('imei2');
       $equipo->pago = $request->get('pago2');
       //$equipo->id_captura=$request->get('id_captura2');
       $equipo->id_comentario = $request->get('descripcion2');
       $equipo->fecha_recibido = $request->get('fecha_recibido2');
       $equipo->fecha_entrega = $request->get('fecha_entrega2');
       $equipo->status = $request->get('status2');
       $equipo->Tiene_Camara = $request->get('Tiene_Camara2');
       $equipo->Centro_Carga = $request->get('Centro_Carga2');
       $equipo->Señal = $request->get('Señal2');
       $equipo->LectorSD = $request->get('LectorSD2');
       $equipo->AltaVoz = $request->get('AltaVoz2');
       $equipo->BotonHome = $request->get('BotonHome2');
       $equipo->Microfono = $request->get('Microfono2');
       $equipo->Lector_SIM = $request->get('Lector_SIM2');
       $equipo->Volumenplus = $request->get('Volumenplus2');
       $equipo->Volumenless = $request->get('Volumenless2');
       $equipo->Encendido = $request->get('Encendido2');
       $equipo->Auricular = $request->get('Auricular2');
       $equipo->Touch = $request->get('Touch2');
       $equipo->Bateria = $request->get('Bateria2');
       $equipo->Enciende = $request->get('Enciende2');
       $equipo->Memoria = $request->get('Memoria2');
       $equipo->SIM = $request->get('SIM2');
       $equipo->Golpes = $request->get('Golpes2');
       $equipo->Tiene_Bateria = $request->get('Tiene_Bateria2');
       $equipo->save();
        return back()->with('success', "Equipo Editado");
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cambio_servicio(Request $request, $id)
    {
        $equipo = \App\Models\PresupuestoEquipo::find($id);
        $equipo->id_servicio = $request->get('id_servicio5');
        $equipo->save();
        return back()->with('success', "Success Servicio Cambiado");
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $equipo = \App\Models\PresupuestoEquipo::find($id);
        if ($equipo != null) {
            $equipo->status = $request->get('status3');
            $equipo->save();
            return back()->with('success', "Status Cambiado");
        } else {
            return back()->with('warning', 'Status no se pudo Cambiar intente de nuevo ');
        }
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = \App\Models\PresupuestoEquipo::find($id);
        if ($equipo != null) {
            $equipo->delete();
            return back()->with('success', "Equipo Borrado");
        } else {
            return back()->with('warning', 'Equipo no se pudo Borrar ');
        }
    }
}
