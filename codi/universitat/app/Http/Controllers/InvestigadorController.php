<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Investigador;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class InvestigadorController extends Controller
{
    public function index()
    {
        $investigadors = Investigador::all();
        return view('investigadors.index', compact('investigadors'));
    }

    public function create()
    {
        return view('investigadors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Passaport' => 'required|unique:investigadors',
            'CodiAsseguranca' => 'required',
            'NomCognoms' => 'required',
            'Especialitat' => 'required',
            'Telefon' => 'required',
            'Adreca' => 'required',
            'Ciutat' => 'required',
            'Pais' => 'required',
            'Email' => 'required|email',
            'Titulacio' => 'required',
        ]);

        $Passaport = $request->input('Passaport');
        $investigador = Investigador::where('Passaport', $Passaport)->first();

        if ($investigador) {
            Session::flash('error', 'No se ha podido crear el investigador.');
            return redirect()->back()->withInput();
        } else {
            Investigador::create($data);
            Session::flash('error', 'Investigador añadido exitosamente.');
            return redirect()->back()->withInput();
        }
    }

    public function show(Request $request)
    {
        $Passaport = $request->input('Passaport');
        $investigador = Investigador::where('Passaport', $Passaport)->first();

        if ($investigador) {
            return view('mostrarInvestigador', compact('investigador'));
        } else {
            Session::flash('error', 'No se encontró ningún investigador con ese pasaporte.');
            return redirect()->back()->withInput();
        }
    }

    public function edit(Investigador $investigador)
    {
        return view('investigadors.edit', compact('investigador'));
    }

    public function update(Request $request)
    {
        $Passaport = $request->input('Passaport');
        $investigador = Investigador::where('Passaport', $Passaport)->first();

        if ($investigador) {
            $atributo = $request->input('atributo');
            $nuevoValor = $request->input('nuevoValor');
            $investigador->$atributo = $nuevoValor;
            $investigador->save();
            Session::flash('error', 'Investigador actualizado exitosamente.');
            return redirect()->back()->withInput();
        } else {
            Session::flash('error', 'No se encontró ningún investigador con ese código.');
            return redirect()->back()->withInput();
        }
    }

    public function destroyAll()
    {
        $investigadores = Investigador::all();
    
        if ($investigadores->isNotEmpty()) {
            foreach ($investigadores as $investigador) {
                $investigador->delete();
            }
            
            Session::flash('error', 'Todos los investigadores han sido eliminados.');
            return redirect()->back()->withInput();
        } else {
            Session::flash('error', 'No se encontraron investigadores.');
            return redirect()->back()->withInput();
        }
    }
    public function generarPDF(Request $request)
    {

        $passaport = $request->input('Passaport');


        $investigador = Investigador::where('Passaport', $passaport)->first();


        if ($investigador) {

            $dompdf = new Dompdf();

            $html = '<h1>Informació del Investigador</h1>';
            $html .= '<p>Pasaporte: ' . $investigador->Passaport . '</p>';
            $html .= '<p>CodiAsseguranca: ' . $investigador->CodiAsseguranca . '</p>';
            $html .= '<p>NomCognoms: ' . $investigador->NomCognoms . '</p>';
            $html .= '<p>Especialitat: ' . $investigador->Especialitat . '</p>';
            $html .= '<p>Telefon: ' . $investigador->Telefon . '</p>';
            $html .= '<p>Adreça: ' . $investigador->Adreça . '</p>';
            $html .= '<p>Ciutat: ' . $investigador->Ciutat . '</p>';
            $html .= '<p>País: ' . $investigador->Pais . '</p>';
            $html .= '<p>Email: ' . $investigador->Email . '</p>';
            $html .= '<p>Titulacio: ' . $investigador->Titulacio . '</p>';

            $dompdf->loadHtml($html);

            $dompdf->render();

            $dompdf->stream('investigador.pdf');
        } else {
            Session::flash('error', 'No se encontró ningún investigador con ese código.');
            return redirect()->back()->withInput();
        }
    }
}
