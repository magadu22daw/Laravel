<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\Session;
use App\Models\Participa;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class ParticipaController extends Controller
{
    public function index()
    {
        $participas = Participa::all();
        return view('participas.index', compact('participas'));
    }

    public function create()
    {
        return view('participa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Passaport' => 'required',
            'CodiProj' => 'required',
            'DataInici' => 'required',
            'DataFinal' => 'required',
            'Retribucio' => 'required',
            'ParticipacioProrrogable' => 'required',
            'ParticipacioPublicacio' => 'required',
        ]);

        $passaport = $request->input('Passaport');
        $codiProj = $request->input('CodiProj');
        $participa = Participa::where('Passaport', $passaport)
            ->where('CodiProj', $codiProj)
            ->first();

        if ($participa) {
            Session::flash('error', 'No se ha podido crear la participacion.');
            return redirect()->back()->withInput();
        } else {
            Participa::create($data);
            Session::flash('error', 'Participacion creada exitosamente.');
            return redirect()->back()->withInput();
        }
    }

    public function show(Request $request)
    {
        $passaport = $request->input('Passaport');
        $codiProj = $request->input('CodiProj');
        $participa = Participa::where('Passaport', $passaport)
            ->where('CodiProj', $codiProj)
            ->first();

        if ($participa) {
            return view('mostrarParticipa', compact('participa'));
        } else {
            Session::flash('error', 'No se encontró ningúna participacion con ese código.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $participa = Participa::findOrFail($id);
        return view('participa.edit', compact('participa'));
    }

    public function update(Request $request)
    {
        $passaport = $request->input('Passaport');
        $codiProj = $request->input('CodiProj');
        $participa = Participa::where('Passaport', $passaport)
            ->where('CodiProj', $codiProj)
            ->first();

        if ($participa) {

            $atributo = $request->input('atributo');
            $nuevoValor = $request->input('nuevoValor');
            $participa->{$atributo} = $nuevoValor;
            $participa->save();

            Session::flash('error', 'Proyecto actualizado exitosamente.');
            return redirect()->back()->withInput();
        } else {
            Session::flash('error', 'No se encontró ningún proyecto con ese código.');
            return redirect()->back()->withInput();
        }
    }
    public function destroy(Request $request)
    {
        $passaport = $request->input('Passaport');
        $codiProj = $request->input('CodiProj');
        $participa = Participa::where('Passaport', $passaport)
            ->where('CodiProj', $codiProj)
            ->first();
    
        if ($participa) {
            $participa->setKeyName('Passaport'); // Establecer la clave primaria
            $participa->delete();
            Session::flash('error', 'Participación eliminada correctamente.');
        } else {
            Session::flash('error', 'No se encontró ninguna participación con ese código.');
        }
    
        return redirect()->back()->withInput();
    }
    public function generarPDF(Request $request)
    {
        $passaport = $request->input('Passaport');
        $codiProj = $request->input('CodiProj');
        $participa = Participa::where('Passaport', $passaport)
            ->where('CodiProj', $codiProj)
            ->first();


        if ($participa) {

            $dompdf = new Dompdf();

            $html = '<h1>Informació del Participa</h1>';
            $html .= '<p>Passaport: ' . $participa->Passaport . '</p>';
            $html .= '<p>CodiProj: ' . $participa->CodiProj . '</p>';
            $html .= '<p>DataInici: ' . $participa->DataInici . '</p>';
            $html .= '<p>DataFinal: ' . $participa->DataFinal . '</p>';
            $html .= '<p>Retribucio: ' . $participa->Retribucio . '</p>';
            $html .= '<p>ParticipacioProrrogable: ' . $participa->ParticipacioProrrogable . '</p>';
            $html .= '<p>ParticipacioPublicacio: ' . $participa->ParticipacioPublicacio . '</p>';

            $dompdf->loadHtml($html);

            $dompdf->render();

            $dompdf->stream('participa.pdf');
        } else {
            Session::flash('error', 'No se encontró ningún investigador con ese código.');
            return redirect()->back()->withInput();
        }
    }
}
