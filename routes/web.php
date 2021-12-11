<?php

use App\Examen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Emploi;
use App\Models\Salle;
use App\Models\Professeur;
use App\Models\Matiere;
use  App\Models\Cours;
use App\Periode;
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
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/welcome', 'ServivceController@welcome');

Route::get('/employes', function () {
    return view('services.employes');
});
Route::get('/retrait-diplomes', function () {
    $matieres = Matiere::all();
    return view('diplomes.retrait_diplomes', compact('matieres'));
});
Route::get('/gestionEmploi', function () {
    return view('admingeneral.gestionEmplois');
});

Route::get('/emplois', 'EmploiController@create');

Route::get('/updatecours', function (Request $request) {
    $salles = Salle::all();
    $profs= Professeur::all();
    $matieres= Matiere::all();
    $tasks = Emploi::paginate(5);
    $task = Emploi::find(2);


    return view('pages.emploi.update_cours', compact('tasks','salles','profs','matieres','task'));

});

Route::get('/createemploi', function () {
    $salles = Salle::all();
    $profs= Professeur::all();
    $matieres= Matiere::all();
    return view('pages/emploi/create_emploi',compact('salles','profs','matieres'));
});
Route::get('/editImage/{{id}}', 'EtudiantController@editImage');

Route::get('/test', function () {
    $tasks = Emploi::paginate(5);

    return view('test1', [
        'tasks' => $tasks
    ]);

});
Route::delete('/task/{id}', function ($id) {
    Emploi::findOrFail($id)->delete();

    return redirect('/test');
});

Route::get('/convocation', function ($id) {
    $matieres=DB::table('matieres')
        ->groupBy('nomMat')
        ->get();
    $salles = Salle::all();
    $examen=Examen::findOrFail($id);


    return view('examens.convocations.convocation',
        compact('examen','matieres','salles'));

});

//Auth::routes(['verify' => true]);
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getusersysteminfo', 'UserSystemInfoController@getusersysteminfo');
Route::get('userInfos', 'UserSystemInfoController@userInfos');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UsersController', ['except'=> ['show', 'create', 'store']]);
});
Route::resource('budgets', 'BudgetController');

Route::post('retraits', 'RetraitdiplomeController@index');

Route::resource('liste_retraits', 'RetraitdiplomeController');

Route::resource('etudiants', 'EtudiantController');
Route::resource('creneau', 'CreneauxController');
Route::resource('profs', 'ProfesseurController');
Route::resource('sessions', 'UserSystemInfoController');
Route::resource('convocations', 'ConvocationController');
Route::get('convocations/{id}', [
    'convocations.create' => 'ConvocationController@create'
]);

Route::resource('groupes', 'GroupesController');

Route::resource('examens', 'ExamenController');
Route::resource('salles', 'SalleController');
Route::resource('matieres', 'MatiereController');
Route::resource('creneaux', 'CreneauController');
Route::resource('emplois', 'TimetableController');
Route::get('administration', 'ServivceController@administration');
Route::get('admingeneral', 'ServivceController@admingeneral');
Route::get('finance', 'ServivceController@finance');
Route::get('secretariat', 'ServivceController@secretariat');
Route::get('accueil', 'ServivceController@accueil')->middleware('auth');
Route::get('accueilexamen', 'ExamenController@accueilexamen');


//Route::get('/creneau', 'CreneauxController@index');
Route::post('creneau/fetch', 'CreneauxController@fetch')->name('creneau.fetch');


Route::get('/mescreneaux', function () {

    $periodes = Periode::where('horaire_id',0)->get();

    return view('creneaux.create',["periodes" => $periodes]);

});

Route::get('/subcat', function (Request $request) {

    $horaire_id = $request->cat_id;

    $horaires= Periode::where('id',$horaire_id)
        ->with('horaires')
        ->get();

    return response()->json([
        'horaires' => $horaires
    ]);

})->name('subcat');
Route::post('examens/fetch', 'ExamenController@fetch')->name('examens.fetch');
Route::post('testcreneau/fetch', 'CreneauController@fetch')->name('testcreneau.fetch');
Route::post('emplois/fetch', 'TimetableController@fetch')->name('emplois.fetch');
Route::post('emplois/fetch1', 'TimetableController@fetch1')->name('emplois.fetch1');
Route::post('emplois/fetch2', 'TimetableController@fetch2')->name('emplois.fetch2');
Route::post('convocations/fetch', 'ConvocationController@fetch')->name('convocations.fetch');
Route::post('convocations/fetch12', 'ConvocationController@fetch12')->name('convocations.fetch12');
Route::post('etudiants/fetch', 'EtudiantController@fetch')->name('etudiants.fetch');

//Route::post('convocations/convocation', 'ConvocationController@convocation')->name('convocations.convocation');

Route::get('/index','ProfesseurController@index');
Route::get('/search','ProfesseurController@search');
Route::get('/searchSalle','SalleController@searchSalle');
Route::get('/searchEmploi','TimetableController@searchEmploi');
Route::get('/searchExamen','ExamenController@searchExamen');
Route::get('/searchProf','ProfesseurController@searchProf');
Route::get('/searchConvocation','ConvocationController@searchConvocation');
Route::get('/searchEtudiant','EtudiantController@searchEtudiant');


Route::get('edit/{id}', 'EmploiController@edit');
Route::get('update/{id}', 'EmploiController@update');



