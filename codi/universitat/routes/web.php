<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjecteController;
use App\Http\Controllers\ParticipaController;
use App\Http\Controllers\InvestigadorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('menuPrincipal');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/menuPrincipal', function () {
    return view('menuPrincipal');
})->middleware(['auth'])->name('dashboard');


Route::get('/menuProjectes', function () {
    return view('menuProjectes');
})->middleware(['auth'])->name('menuProjectes');
Route::get('/crearProjecte', function () {
    return view('crearProjecte');
})->middleware(['auth'])->name('crearProjecte');

Route::get('/eliminarProjecte', function () {
    return view('eliminarProjecte');
})->middleware(['auth'])->name('eliminarProjecte');

Route::get('/modificarProjecte', function () {
    return view('modificarProjecte');
})->middleware(['auth'])->name('modificarProjecte');
Route::get('/mostrarProjecte', function () {
    return view('mostrarProjecte');
})->middleware(['auth'])->name('mostrarProjecte');
Route::get('/crearPDFProjecte', function () {
    return view('crearPDFProjecte');
})->middleware(['auth'])->name('crearPDFProjecte');




Route::get('/menuInvestigadors', function () {
    return view('menuInvestigadors');
})->middleware(['auth'])->name('menuInvestigadors');
Route::get('/crearInvestigador', function () {
    return view('crearInvestigador');
})->middleware(['auth'])->name('crearInvestigador');

Route::get('/eliminarInvestigador', function () {
    return view('eliminarInvestigador');
})->middleware(['auth'])->name('eliminarInvestigador');
Route::get('/eliminarInvestigadors', function () {
    return view('eliminarInvestigadors');
})->middleware(['auth'])->name('eliminarInvestigadors');
Route::get('/modificarInvestigador', function () {
    return view('modificarInvestigador');
})->middleware(['auth'])->name('modificarInvestigador');
Route::get('/mostrarInvestigador', function () {
    return view('mostrarInvestigador');
})->middleware(['auth'])->name('mostrarInvestigador');
Route::get('/crearPDFInvestigador', function () {
    return view('crearPDFInvestigador');
})->middleware(['auth'])->name('crearPDFInvestigador');




Route::get('/menuParticipacions', function () {
    return view('menuParticipacions');
})->middleware(['auth'])->name('menuParticipacions');
Route::get('/crearParticipa', function () {
    return view('crearParticipa');
})->middleware(['auth'])->name('crearParticipa');

Route::get('/eliminarParticipa', function () {
    return view('eliminarParticipa');
})->middleware(['auth'])->name('eliminarParticipa');

Route::get('/modificarParticipa', function () {
    return view('modificarParticipa');
})->middleware(['auth'])->name('modificarParticipa');
Route::get('/mostrarParticipa', function () {
    return view('mostrarParticipa');
})->middleware(['auth'])->name('mostrarParticipa');
Route::get('/crearPDFParticipa', function () {
    return view('crearPDFParticipa');
})->middleware(['auth'])->name('crearPDFParticipa');



Route::middleware(['auth'])->group(function () {
    Route::get('/projectes', [ProjecteController::class, 'index'])->name('projectes.index');
    Route::get('/projectes/create', [ProjecteController::class, 'create'])->name('projectes.create');
    Route::post('/projectes', [ProjecteController::class, 'store'])->name('projectes.store');
    Route::get('/projectes/show', [ProjecteController::class, 'show'])->name('projectes.show');
    Route::get('/projectes/{projecte}/edit', [ProjecteController::class, 'edit'])->name('projectes.edit');
    Route::put('/projectes/modificar', [ProjecteController::class, 'update'])->name('projectes.update');
    Route::delete('/projectes/delete', [ProjecteController::class, 'destroy'])->name('projectes.destroy');
    Route::post('/projectes/generarPDF', [ProjecteController::class, 'generarPDF'])->name('projectes.generarPDF');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/participa', [ParticipaController::class, 'index'])->name('participa.index');
    Route::get('/participa/create', [ParticipaController::class, 'create'])->name('participa.create');
    Route::post('/participa', [ParticipaController::class, 'store'])->name('participa.store');
    Route::get('/participa/show', [ParticipaController::class, 'show'])->name('participa.show');
    Route::get('/participa/{participa}/edit', [ParticipaController::class, 'edit'])->name('participa.edit');
    Route::put('/participa/modificar', [ParticipaController::class, 'update'])->name('participa.update');
    Route::delete('/participa/delete', [ParticipaController::class, 'destroy'])->name('participa.destroy');
    Route::post('/participa/generarPDF', [ParticipaController::class, 'generarPDF'])->name('participa.generarPDF');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/investigadors', [InvestigadorController::class, 'index'])->name('investigadors.index');
    Route::get('/investigadors/create', [InvestigadorController::class, 'create'])->name('investigadors.create');
    Route::post('/investigadors', [InvestigadorController::class, 'store'])->name('investigadors.store');
    Route::get('/investigadors/show', [InvestigadorController::class, 'show'])->name('investigadors.show');
    Route::get('/investigadors/{investigador}/edit', [InvestigadorController::class, 'edit'])->name('investigadors.edit');
    Route::put('/investigadors/modificar', [InvestigadorController::class, 'update'])->name('investigadors.update');
    Route::delete('/investigadors/delete', [InvestigadorController::class, 'destroy'])->name('investigadors.destroy');
    Route::delete('/investigadors/deleteAll', [InvestigadorController::class, 'destroyAll'])->name('investigadors.destroyAll');
    Route::post('/investigadors/generarPDF', [InvestigadorController::class, 'generarPDF'])->name('investigadors.generarPDF');
});



require __DIR__.'/auth.php';
