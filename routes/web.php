<?php
use App\Image;
use App\Cours;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();


Route::resource('cours', 'CoursController');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('get-video/{video}', 'CoursController@getVideo')->name('getVideo');


Route::put('cours/{id}/addImage', 'CoursController@addImage')->name('addImage');





//généré l'image a afficher

Route::get('image_view/{id}', function ($id)
{
	$img = Image::findOrFail($id);

    $path = storage_path() . '/app/public/' . $img->url_image;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


//généré le fichier smil

Route::get('smil/{id}', function ($id){
    $type = "application/smil";

	  $cours = Cours::findOrFail($id);

	$file = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<timesheet xmlns=\"http://www.w3.org/ns/SMIL\">
  <excl timeAction=\"intrinsic\" dur=\" 10:00:00 \"        mediaSync=\"#talk\" controls=\"#timeController\" navigation=\"arrows; hash\">";


  $compteur = count($cours->image);

  for ($i=0; $i < $compteur; $i++) { 
  	$file .= "<item select=\"#".$cours->image[$i]->id."\" begin=\"".$cours->time[$i]->time."\"/>";
  }


  $file .= "</excl>
  <par timeAction=\"class:swapped\">
    <item select=\"body\" begin=\"swap.click\" end=\"swap.click\"/>
  </par>

</timesheet>
";



	$response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    $response->header("Content-Disposition:", 'attachment; filename="test.smil"');

    return $response;

});