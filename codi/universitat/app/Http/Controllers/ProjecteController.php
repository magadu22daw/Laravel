<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Projecte;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class ProjecteController extends Controller
{
    public function index()
    {
        $projectes = Projecte::all();
        return view('projectes.index', compact('projectes'));
    }

    public function create()
    {
        return view('projectes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'CodiProj' => 'required|unique:projectes',
            'Nom' => 'required',
            'DataInici' => 'required',
            'Classificacio' => 'required',
            'HoresAssignades' => 'required',
            'PressupostAssignat' => 'required',
            'MaxInvestigadorsAssignables' => 'required',
            'Responsable' => 'required',
            'Investigacio' => 'required',
            'IdiomaTreball' => 'required',
        ]);
        $data['DataFinalitzacio'] = $request->input('DataFinalitzacio');
        $data['MaxInvestigadorsAssignables'] = $request->input('MaxInvestigadorsAssignables') ?? 0;

        $CodiProj = $request->input('CodiProj');
        $projecte = Projecte::where('CodiProj', $CodiProj)->first();

        if ($projecte) {
            Session::flash('error', 'No se ha podido crear el proyecto.');
            return redirect()->back()->withInput();
        } else {
            Projecte::create($data);
            Session::flash('error', 'Proyecto creado exitosamente.');
            return redirect()->back()->withInput();
        }
    }

    public function show(Request $request)
    {
        $CodiProj = $request->input('CodiProj');
        $projecte = Projecte::where('CodiProj', $CodiProj)->first();
        
        if ($projecte) {
            return view('mostrarProjecte', compact('projecte'));
        } else {
            Session::flash('error', 'No se encontró ningún proyecto con ese código.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $projecte = Projecte::findOrFail($id);
        return view('projectes.edit', compact('projecte'));
    }

    public function update(Request $request)
    {
        $CodiProj = $request->input('CodiProj');
        $projecte = Projecte::where('CodiProj', $CodiProj)->first();
    
        if ($projecte) {
    
            $atributo = $request->input('atributo');
            $nuevoValor = $request->input('nuevoValor');
     
            $projecte->$atributo = $nuevoValor;
    
            $projecte->save();
    
            Session::flash('error', 'Proyecto actualizado exitosamente.');
            return redirect()->back()->withInput();
        } else {
            Session::flash('error', 'No se encontró ningún proyecto con ese código.');
            return redirect()->back()->withInput();
        }
    }
    
    public function destroy(Request $request)
    {
        $CodiProj = $request->input('CodiProj');
        $projecte = Projecte::where('CodiProj', $CodiProj)->first();

        if ($projecte) {
            $projecte->delete();
            Session::flash('error', 'Proyecto eliminado.');
            return redirect()->back()->withInput();
        } else {
            Session::flash('error', 'No se encontró ningún proyecto con ese código.');
            return redirect()->back()->withInput();
        }
    }
    public function generarPDF(Request $request)
    {
        $CodiProj = $request->input('CodiProj');
        $projecte = Projecte::where('CodiProj', $CodiProj)->first();


        if ($projecte) {

            $dompdf = new Dompdf();

            $html = '<h1>Informació del Projecte</h1>';
            $html .= '<p>CodiProj: ' . $projecte->CodiProj . '</p>';
            $html .= '<p>Nom: ' . $projecte->Nom . '</p>';
            $html .= '<p>DataInici: ' . $projecte->DataInici . '</p>';
            $html .= '<p>Classificacio: ' . $projecte->Classificacio . '</p>';
            $html .= '<p>HoresAssignades: ' . $projecte->HoresAssignades . '</p>';
            $html .= '<p>PressupostAssignat: ' . $projecte->PressupostAssignat . '</p>';
            $html .= '<p>MaxInvestigadorsAssignables: ' . $projecte->MaxInvestigadorsAssignables . '</p>';
            $html .= '<p>Responsable: ' . $projecte->Responsable . '</p>';
            $html .= '<p>Investigacio: ' . $projecte->Investigacio . '</p>';
            $html .= '<p>IdiomaTreball: ' . $projecte->IdiomaTreball . '</p>';

            $dompdf->loadHtml($html);

            $dompdf->render();

            $dompdf->stream('projecte.pdf');
        } else {
            Session::flash('error', 'No se encontró ningún projecte con ese código.');
            return redirect()->back()->withInput();
        }
    }
}
