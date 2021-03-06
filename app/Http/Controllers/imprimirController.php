<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

include(app_path() . '/fpdf.php');
//include(app_path() . '/qrlib.php');
include(app_path() . '/phpqrcode.php');

//function hex2dec
//returns an associative array (keys: R,G,B) from hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000")
{
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R'] = $rouge;
    $tbl_couleur['V'] = $vert;
    $tbl_couleur['B'] = $bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px)
{
    return $px * 25.4 / 72;
}

function txtentities($html)
{
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}
////////////////////////////////////

class PDF_HTML extends \FPDF
{
    //variables of html parser
    protected $B;
    protected $I;
    protected $U;
    protected $HREF;
    protected $fontList;
    protected $issetfont;
    protected $issetcolor;

    function __construct($orientation = 'P', $unit = 'mm', $format = 'A4')
    {
        //Call parent constructor
        parent::__construct($orientation, $unit, $format);
        //Initialization
        $this->B = 0;
        $this->I = 0;
        $this->U = 0;
        $this->HREF = '';
        $this->fontlist = array('arial', 'times', 'courier', 'helvetica', 'symbol');
        $this->issetfont = false;
        $this->issetcolor = false;
    }

    function WriteHTML($html)
    {
        //HTML parser
        $html = strip_tags($html, "<b><u><i><a><img><p><br><strong><em><font><tr><blockquote>"); //supprime tous les tags sauf ceux reconnus
        $html = str_replace("\n", ' ', $html); //remplace retour à la ligne par un espace
        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE); //éclate la chaîne avec les balises
        foreach ($a as $i => $e) {
            if ($i % 2 == 0) {
                //Text
                if ($this->HREF)
                    $this->PutLink($this->HREF, $e);
                else
                    $this->Write(5, stripslashes(txtentities($e)));
            } else {
                //Tag
                if ($e[0] == '/')
                    $this->CloseTag(strtoupper(substr($e, 1)));
                else {
                    //Extract attributes
                    $a2 = explode(' ', $e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach ($a2 as $v) {
                        if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag, $attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        //Opening tag
        switch ($tag) {
            case 'STRONG':
                $this->SetStyle('B', true);
                break;
            case 'EM':
                $this->SetStyle('I', true);
                break;
            case 'B':
            case 'I':
            case 'U':
                $this->SetStyle($tag, true);
                break;
            case 'A':
                $this->HREF = $attr['HREF'];
                break;
            case 'IMG':
                if (isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                    if (!isset($attr['WIDTH']))
                        $attr['WIDTH'] = 0;
                    if (!isset($attr['HEIGHT']))
                        $attr['HEIGHT'] = 0;
                    $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
                }
                break;
            case 'TR':
            case 'BLOCKQUOTE':
            case 'BR':
                $this->Ln(5);
                break;
            case 'P':
                $this->Ln(10);
                break;
            case 'FONT':
                if (isset($attr['COLOR']) && $attr['COLOR'] != '') {
                    $coul = hex2dec($attr['COLOR']);
                    $this->SetTextColor($coul['R'], $coul['V'], $coul['B']);
                    $this->issetcolor = true;
                }
                if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                    $this->SetFont(strtolower($attr['FACE']));
                    $this->issetfont = true;
                }
                break;
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if ($tag == 'STRONG')
            $tag = 'B';
        if ($tag == 'EM')
            $tag = 'I';
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, false);
        if ($tag == 'A')
            $this->HREF = '';
        if ($tag == 'FONT') {
            if ($this->issetcolor == true) {
                $this->SetTextColor(0);
            }
            if ($this->issetfont) {
                $this->SetFont('arial');
                $this->issetfont = false;
            }
        }
    }

    function SetStyle($tag, $enable)
    {
        //Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach (array('B', 'I', 'U') as $s) {
            if ($this->$s > 0)
                $style .= $s;
        }
        $this->SetFont('', $style);
    }

    function PutLink($URL, $txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0, 0, 255);
        $this->SetStyle('U', true);
        $this->Write(5, $txt, $URL);
        $this->SetStyle('U', false);
        $this->SetTextColor(0);
    }
} //end of class
class imprimirController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $equipo = \App\Models\Equipo::find($id); //id 10
        $busquedapago = \App\Models\Pago_Equipo::all();
        //$pago = \App\Models\Pago_Equipo::find($id); // 9 null
        //ID es id de equipo entonces buscamos el id del pago con id_equipo dentro de pago_equipo
        foreach ($busquedapago as $pago) {
            if ($pago->id_equipo == $id) {
                $usuario = \App\Models\User::find($equipo->id_cliente);
                $tecnico = \App\Models\User::find($equipo->id_user);
                $precio = \App\Models\Equipo::find($id);
                $setting = \App\Models\Settings::find(1);
                if ($setting->setting_logo == '') {
                    return back()->with('warning', 'No se puede generar un ticket si no tienes un logo de empresa asignado,configuralo en tu empresa antes de tratar de generar un Ticket');
                }
                if ($equipo->imei != '') {
                    $datoequipo = $equipo->imei;
                } else {
                    $datoequipo = $equipo->serial;
                }
                $adelanto = $tecnico->monto;
                $final = $precio->presupuesto - $adelanto;

                $tamaño = getimagesize($setting->setting_logo);


                //dd($tamaño);
                if ($setting->setting_logo == "") {
                    $setting->setting_logo = "https://www.creativefabrica.com/wp-content/uploads/2018/09/Phone-repair-Logo-Designs-by-yahyaanasatokillah-580x387.jpg";
                }
                $date1 = new \DateTime("now");

                $dia1 = $equipo->created_at->format("d");
                $mes = $equipo->created_at->format("m");
                $ano = $equipo->created_at->format("Y");
                if ($mes == 1) {
                    $mes1 = 'Enero';
                } elseif ($mes == 2) {
                    $mes1 = 'Febrero';
                } elseif ($mes == 3) {
                    $mes1 = 'Marzo';
                } elseif ($mes == 4) {
                    $mes1 = 'Abril';
                } elseif ($mes == 5) {
                    $mes1 = 'Mayo';
                } elseif ($mes == 6) {
                    $mes1 = 'Junio';
                } elseif ($mes == 7) {
                    $mes1 = 'Julio';
                } elseif ($mes == 8) {
                    $mes1 = 'Agosto';
                } elseif ($mes == 9) {
                    $mes1 = 'Septiembre';
                } elseif ($mes == 10) {
                    $mes1 = 'Octubre';
                } elseif ($mes == 11) {
                    $mes1 = 'Noviembre';
                } elseif ($mes == 12) {
                    $mes1 = 'Diciembre';
                }


                $data = isset($_GET['data']) ? $_GET['data'] : $setting->setting_url . '/orden/' . $id;
                $size = isset($_GET['size']) ? $_GET['size'] : '400x400';
                $logo = isset($_GET['logo']) ? $_GET['logo'] : $setting->setting_logo;

                header('Content-type: image/png');
                // Get QR Code image from Google Chart API
                // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
                $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));

                if ($logo !== FALSE) {
                    $logo = imagecreatefromstring(file_get_contents($logo));
                    $QR_width = imagesx($QR);
                    $QR_height = imagesy($QR);
                    $logo_width = imagesx($logo);
                    $logo_height = imagesy($logo);
                    // Scale logo to fit in the QR Code
                    $logo_qr_width = $QR_width / 3;
                    $scale = $logo_width / $logo_qr_width;
                    $logo_qr_height = $logo_height / $scale;
                    imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
                }
                if ($equipo->pago == 0) {
                    $temporal = 0;
                } else {
                    $temporal = $equipo->pago;
                };
                if ($equipo->presupuesto == 0) {
                    $temporal1 = 0;
                } else {
                    $temporal1 = $equipo->presupuesto;
                };

                if ($equipo->serial == '') {
                    $temporal3 = $equipo->imei;
                } else {
                    $temporal3 = $equipo->serial;
                };

                imagepng($QR, "$id.png");
                // $data = isset($_GET['data']) ? $_GET['data'] : $setting->setting_url . '/orden/' . $id;
                //\QRcode::png($data, "$id.png");

                $pdf = new \FPDF($orientation = 'P', $unit = 'mm', array(45, 350));
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 4);    //Letra Arial, negrita (Bold), tam. 20
                $textypos = 5;
                $pdf->Image($setting->setting_logo, 10, 1, -800);
                $textypos += 20;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '=======================================');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->SetFont('Arial', '', 9);    //Titulo
                $pdf->Cell(5, $textypos, utf8_decode($setting->setting_nombre));
                $pdf->SetFont('Arial', '', 4);    //Letra Arial, negrita (Bold), tam. 20
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Direccion: ' . utf8_decode($setting->setting_direccion));
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Telefono: ' . $setting->setting_telefono);

                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Horario: ' . $setting->setting_abierto);
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(8, $textypos, 'Fecha: ' . $dia1 . '-' . $mes1 . '-' . $ano);

                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '=======================================');


                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Orden: # ' . $equipo->id);
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Cliente: ' . utf8_decode($equipo->id_cliente));
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Tecnico: ' . utf8_decode($tecnico->name));
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Equipo: ' . utf8_decode($datoequipo));
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Diagnostico: ' . utf8_decode($equipo->id_comentario));
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Adelanto: ' . $temporal . ' - ' . ' Cotizado: ' . $temporal1);
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '=======================================');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'MODELO                        SERIAL/IMEI ');
                $precio->modelo;
                $off = $textypos + 6;
                $producto = array(
                    "modelo" => utf8_decode($precio->modelo),
                    "SERIAL/IMEI" => utf8_decode($temporal3),
                );
                $productos = array($producto);
                foreach ($productos as $pro) {

                    $pdf->setX(2);
                    $pdf->Cell(35, $off,  strtoupper(substr($pro["modelo"], 0, 12)));
                    $pdf->setX(16);
                    $pdf->Cell(35, $off,  strtoupper(substr($pro["SERIAL/IMEI"], 0, 12)));
                    $pdf->setX(16);
                    $off += 6;
                }
                $textypos = $off + 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '=======================================');
                $pdf->Cell(5, $textypos + 6, 'Gracias por su preferencia');
                $textypos += 6;
                $pdf->setX(2);
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '1.-Despues de 30 dias de cualquier reparacion');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'no nos hacemos responsables de los equipos.');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '2.- No se responde por danos ocasionados por alto');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'voltaje, golpes, humedad y otras causas de un ');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'mal manejo del equipo.');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '3.- El departamento tecnico no se hace responsable');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'por la perdida de informacion o datos, para tal fin');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'el usuario debe realizar sus propias copias de seguridad');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '4.- No se responde por un sim card y memorias');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'dejadas en los equipos.');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '5.- No hay garantia en equipos mojados.');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '=== Acepto clausula de danos: ===');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '_______________________________________');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '        Nombre y Firma de conformidad');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, '=======================================');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Escanea con tu telefono este codigo y sigue tu orden por internet');
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Cell(5, $textypos, 'Entra aqui: ' . $setting->setting_url . '/orden/' . $id);
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Image("$id.png", 10, 130, 20, 20, "png");
                $textypos += 6;
                $pdf->setX(2);
                $pdf->Output();
                //$pdf->AddPage();
                //$pdf->Image(imagepng($QR), 10, 10, 20, 20, "png");
                //imagepng($QR);
                //imagedestroy($QR);
                //$pdf->Output();
                //  header('Content-Disposition: Attachment;filename=image.png');

                return back()->with('success', 'Archivo a Imprimir generado');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function QR(Request $request, $id)
    {
        /*
        $setting = \App\Models\Settings::find(1);
        if ($setting->setting_logo == "") {
            $setting->setting_logo = "https://iunlock.store/unlock-2.png";
        }
        $data = isset($_GET['data']) ? $_GET['data'] : $setting->setting_url . '/orden/' . $id;
        $size = isset($_GET['size']) ? $_GET['size'] : '200x200';
        $logo = isset($_GET['logo']) ? $_GET['logo'] : $setting->setting_logo;

        header('Content-type: image/png');
        // Get QR Code image from Google Chart API
        // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
        $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));
        if ($logo !== FALSE) {
            $logo = imagecreatefromstring(file_get_contents($logo));

            $QR_width = imagesx($QR);
            $QR_height = imagesy($QR);

            $logo_width = imagesx($logo);
            $logo_height = imagesy($logo);

            // Scale logo to fit in the QR Code
            $logo_qr_width = $QR_width / 3;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;

            imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        }

        dd(imagepng($QR));
        // imagedestroy($QR);


        return back()->with('success', 'Archivo a Imprimir generado');*/

        $equipo = \App\Models\Equipo::find($id); //id 10
        $busquedapago = \App\Models\Pago_Equipo::all();
        //$pago = \App\Models\Pago_Equipo::find($id); // 9 null
        //ID es id de equipo entonces buscamos el id del pago con id_equipo dentro de pago_equipo
        foreach ($busquedapago as $pago) {
            if ($pago->id_equipo == $id) {
                $usuario = \App\Models\User::find($equipo->id_cliente);
                $tecnico = \App\Models\User::find($equipo->id_user);
                $precio = \App\Models\Equipo::find($id);
                $setting = \App\Models\Settings::find(1);
                if ($setting->setting_logo == '') {
                    return back()->with('warning', 'No se puede generar un ticket si no tienes un logo de empresa asignado,configuralo en tu empresa antes de tratar de generar un Ticket');
                }
                if ($equipo->imei != '') {
                    $datoequipo = $equipo->imei;
                } else {
                    $datoequipo = $equipo->serial;
                }
                $adelanto = $tecnico->monto;
                $final = $precio->presupuesto - $adelanto;

                $tamaño = getimagesize($setting->setting_logo);


                //dd($tamaño);
                if ($setting->setting_logo == "") {
                    $setting->setting_logo = "https://www.creativefabrica.com/wp-content/uploads/2018/09/Phone-repair-Logo-Designs-by-yahyaanasatokillah-580x387.jpg";
                }
                $date1 = new \DateTime("now");

                $dia1 = $equipo->created_at->format("d");
                $mes = $equipo->created_at->format("m");
                $ano = $equipo->created_at->format("Y");
                if ($mes == 1) {
                    $mes1 = 'Enero';
                } elseif ($mes == 2) {
                    $mes1 = 'Febrero';
                } elseif ($mes == 3) {
                    $mes1 = 'Marzo';
                } elseif ($mes == 4) {
                    $mes1 = 'Abril';
                } elseif ($mes == 5) {
                    $mes1 = 'Mayo';
                } elseif ($mes == 6) {
                    $mes1 = 'Junio';
                } elseif ($mes == 7) {
                    $mes1 = 'Julio';
                } elseif ($mes == 8) {
                    $mes1 = 'Agosto';
                } elseif ($mes == 9) {
                    $mes1 = 'Septiembre';
                } elseif ($mes == 10) {
                    $mes1 = 'Octubre';
                } elseif ($mes == 11) {
                    $mes1 = 'Noviembre';
                } elseif ($mes == 12) {
                    $mes1 = 'Diciembre';
                }


                $data = isset($_GET['data']) ? $_GET['data'] : $setting->setting_url . '/orden/' . $id;
                $size = isset($_GET['size']) ? $_GET['size'] : '400x400';
                $logo = isset($_GET['logo']) ? $_GET['logo'] : $setting->setting_logo;

                header('Content-type: image/png');
                // Get QR Code image from Google Chart API
                // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
                $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));

                if ($logo !== FALSE) {
                    $logo = imagecreatefromstring(file_get_contents($logo));
                    $QR_width = imagesx($QR);
                    $QR_height = imagesy($QR);
                    $logo_width = imagesx($logo);
                    $logo_height = imagesy($logo);
                    // Scale logo to fit in the QR Code
                    $logo_qr_width = $QR_width / 3;
                    $scale = $logo_width / $logo_qr_width;
                    $logo_qr_height = $logo_height / $scale;
                    imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
                }
                if ($equipo->pago == 0) {
                    $temporal = 0;
                } else {
                    $temporal = $equipo->pago;
                };
                if ($equipo->presupuesto == 0) {
                    $temporal1 = 0;
                } else {
                    $temporal1 = $equipo->presupuesto;
                };

                if ($equipo->serial == '') {
                    $temporal3 = $equipo->imei;
                } else {
                    $temporal3 = $equipo->serial;
                };

                imagepng($QR, "$id.png");
                // $data = isset($_GET['data']) ? $_GET['data'] : $setting->setting_url . '/orden/' . $id;
                //\QRcode::png($data, "$id.png");

                $pdf = new \FPDF($orientation = 'L', $unit = 'mm', array(45, 200));
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 4);    //Letra Arial, negrita (Bold), tam. 20
                $textypos = 2;
                $pdf->Image("$id.png", 4, 1, -300);
                //$pdf->Image($setting->setting_logo, 4, 1, -800);
                $pdf->SetFont('Times', 'B', 3);    //Letra Arial, negrita (Bold), tam. 20
                $pdf->setX(36);
                $pdf->Cell(2, $textypos, 'Nombre: ' . utf8_decode($equipo->id_cliente));
                $pdf->SetFont('Times', '', 4);    //Letra Arial, negrita (Bold), tam. 20

                $textypos += 3;
                $pdf->setX(36);
                $pdf->Cell(5, $textypos, 'Telefono: ' . utf8_decode($equipo->telefono));
                $textypos += 3;
                $pdf->setX(36);
                $pdf->Cell(5, $textypos, 'Modelo: ' . utf8_decode($equipo->modelo));
                $textypos += 3;
                $pdf->setX(36);
                if ($equipo->serial != '') {
                    $pdf->Cell(5, $textypos, 'Serial: ' . utf8_decode($equipo->serial));
                } else if($equipo->imei != '')
                {
                    $pdf->Cell(5, $textypos, 'IMEI: ' . utf8_decode($equipo->imei));
                }else if($equipo->imei == ''){
                    $pdf->Cell(5, $textypos, 'Sin SN ni IMEI');

                }
                $textypos += 3;
                $pdf->setX(36);
                $pdf->SetFont('Times', 'B', 6);    //Letra Arial, negrita (Bold), tam. 20
                $pdf->Cell(5, $textypos, 'Orden: # ' . utf8_decode($equipo->id));
                $textypos -= 6;
                $pdf->setX(60);
                $pdf->SetFont('Times', '', 3);    //Letra Arial, negrita (Bold), tam. 20
                $pdf->Cell(5, $textypos, 'Diagnostico: ' . utf8_decode($equipo->id_comentario));
                $textypos -= 6;
                $pdf->setX(60);
                $pdf->SetFont('Times', 'B', 3);    //Letra Arial, negrita (Bold), tam. 20
                $pdf->Cell(5, $textypos, 'Tecnico: ' . utf8_decode($tecnico->name));
                $pdf->Output();
                //$pdf->AddPage();
                //$pdf->Image(imagepng($QR), 10, 10, 20, 20, "png");
                //imagepng($QR);
                //imagedestroy($QR);
                //$pdf->Output();
                //  header('Content-Disposition: Attachment;filename=image.png');

                return back()->with('success', 'Archivo a Imprimir generado');
            }
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function QRNEGOCIO(Request $request, $id)
    {

        $setting = \App\Models\Settings::find(1);
        if ($setting->setting_logo == "") {
            $setting->setting_logo = "https://iunlock.store/unlock-2.png";
        }
        $data = isset($_GET['data']) ? $_GET['data'] : $setting->setting_url . '/orden/' . $id;
        $size = isset($_GET['size']) ? $_GET['size'] : '200x200';
        $logo = isset($_GET['logo']) ? $_GET['logo'] : $setting->setting_logo;

        header('Content-type: image/png');
        // Get QR Code image from Google Chart API
        // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
        $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));
        if ($logo !== FALSE) {
            $logo = imagecreatefromstring(file_get_contents($logo));

            $QR_width = imagesx($QR);
            $QR_height = imagesy($QR);

            $logo_width = imagesx($logo);
            $logo_height = imagesy($logo);

            // Scale logo to fit in the QR Code
            $logo_qr_width = $QR_width / 3;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;

            imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        }

        dd(imagepng($QR));
        imagedestroy($QR);
        return back()->with('success', 'Archivo a Imprimir generado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orden(Request $request, $id)
    {

        $equipo = \App\Models\Equipo::all();
        $usuario = \App\Models\User::all();
        $settings = \App\Models\Settings::all();
        $captura = \App\Models\Captura::all();

        return view('/orden')->with('id', $id)->with('Equipo', $equipo)->with('Usuario', $usuario)->with('Settings', $settings, $usuario)->with('Captura', $captura);
        //return back('/galleria')->with('id',$id)->with('Captura',$captura);
    }
}
