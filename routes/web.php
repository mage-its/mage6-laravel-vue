<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('comingsoon');
// });

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/dashboarduser', function(){
//     return view('user.dashboarduser');
// });

// ROUTE ADMIN
Route::get('/admin', function() { return view('admin.admin'); })->middleware('auth','admin');
//list peserta
Route::get('/list', 'UserController@getVerified')->middleware('auth','admin');
Route::get('/list/download', 'UserController@adminDownload')->middleware('auth','admin');
//List Pengumuman
Route::get('/announce', 'AnnounceController@index')->middleware('auth','admin');
Route::get('/announce/download', 'AnnounceController@download')->middleware('auth','admin');
// Medium
Route::get('/mediumadmin', 'MediumController@index')->middleware('auth','admin');
Route::post('/mediumadmin/create', 'MediumController@create')->middleware('auth','admin');
Route::post('/mediumadmin/delete', 'MediumController@delete')->middleware('auth','admin');
Route::post('/mediumadmin/update', 'MediumController@update')->middleware('auth','admin');

// ROUTE ADMIN DEVCOM
Route::get('/daftardevcom', 'DevcomController@adminIndex')->middleware('auth','admin');
Route::post('/daftardevcom/hapus', 'DevcomController@adminHapus')->middleware('auth','admin');
Route::post('/daftardevcom/verif', 'DevcomController@adminVerif')->middleware('auth','admin');
Route::post('/daftardevcom/update', 'DevcomController@adminUpdate')->middleware('auth','admin');
Route::get('/daftardevcom/download', 'DevcomController@adminDownload')->middleware('auth','admin');
// Route::post('/daftardevcom/verifk', 'DevcomController@adminToggleVerifKestari')->middleware('auth','admin');
// Route::post('/daftardevcom/verifa', 'DevcomController@adminToggleVerifAcara')->middleware('auth','admin');
Route::post('/daftardevcom/lolos', 'DevcomController@adminLolos')->middleware('auth','admin');


//Route Admin Esports
Route::get("/daftaresport", 'EsportController@index')->middleware('auth','admin');
Route::post('/daftaresport/hapus', 'EsportController@hapus')->middleware('auth','admin');
Route::post('/daftaresport/verif', 'EsportController@toggleVerif')->middleware('auth','admin');
Route::post('/daftaresport/update', 'EsportController@update')->middleware('auth','admin');
Route::get('/daftaresport/download', 'EsportController@adminDownload')->middleware('auth','admin');

//Route Admin Olimpiade
Route::get('/daftarolim', 'OlimController@index')->middleware('auth','admin');
Route::post('/daftarolim/hapus', 'OlimController@hapus')->middleware('auth','admin');
Route::post('/daftarolim/verif', 'OlimController@toggleVerif')->middleware('auth','admin');
Route::post('/daftarolim/update', 'OlimController@update')->middleware('auth','admin');
Route::get('/daftarolim/download', 'OlimController@adminDownload')->middleware('auth','admin');


// ROUTE USER
// Route::get('/fillformesport', 'EsportController@fillForm');
Route::get('/bayar', 'DashboardController@bayar')->middleware('auth');
Route::get('/bayar/group', 'DashboardController@bayargroup')->middleware('auth');
// chek bayar group
Route::post('/checktim/bayar/group', 'HomeController@checktimGroup')->middleware('auth');
Route::post('/checkpromo/group', 'HomeController@checkpromoGroup')->middleware('auth');

Route::get('/file', 'DashboardController@file')->middleware('auth');
Route::get('/data', 'DashboardController@rekap')->middleware('auth');
Route::get('/submission', 'DashboardController@submisi')->middleware('auth');


// USER DAFTAR DEVCOM
Route::get('/fillformdevcom', 'DevcomController@userIndex')->middleware('auth','sudahisi', 'verified');
Route::post('/submitdevcom', 'DevcomController@submit')->middleware('auth','sudahisi', 'verified');
Route::post('/uploaddev', 'DevcomController@uploadDev')->middleware('auth', 'verified');
Route::post('/uploaddev2', 'DevcomController@uploadDev2')->middleware('auth', 'verified');

// USER DAFTAR ESPORT
Route::get('/fillformesport', 'EsportController@userIndex')->middleware('auth','sudahisi', 'verified');
Route::post('/submitesport', 'EsportController@submit')->middleware('auth','sudahisi', 'verified');

// USER DAFTAR OLIM
Route::get('/fillformolim', 'OlimController@userIndex')->middleware('auth','sudahisi', 'verified');
Route::post('/submitolim', 'OlimController@finalSubmit')->middleware('auth','sudahisi', 'verified');

// UPLOAD BUKTI BAYAR
Route::post('/uploadbb', 'HomeController@upload');
// CHECK PROMO KODE
Route::post('/checkpromo', 'HomeController@checkpromo');


// ROUTE FILE
//FILES ROUTE
Route::get('/guidebook-olim',function() {return response()->file('pdf/Guidebook Olimpiade MAGE 6.pdf');});
Route::get('/guidebook-esport',function() {return response()->file('pdf/Guidebook E-Sport MAGE 6.pdf');});
Route::get('/guidebook-devcomp',function() {return response()->file('pdf/GuideBook DevCom MAGE 6.pdf');});
Route::get('/logomage6',function() {return response()->file('poster/logomage6.png');});

Route::get('/posterolim',function() {return response()->file('poster/posterolim.png');});
Route::get('/posteresport',function() {return response()->file('poster/posteresport.png');});
Route::get('/posterdevcom',function() {return response()->file('poster/posterdevcom.png');});

Route::get('/soalmage5',function() {return response()->file('pdf/Soal MAGE 5.pdf');});

Route::get('/proposal-game',function() {return response()->file('pdf/Contoh Template Proposal GameDev.pdf');});
Route::get('/proposal-app',function() {return response()->file('pdf/Contoh Template Proposal App.pdf');});
Route::get('/proposal-iot',function() {return response()->file('pdf/Contoh Template Proposal IoT.pdf');});
Route::get('/guGame',function() {return response()->download('files/Contoh Gambaran Umum Game.docx');});

Route::get('/guAppsnIot',function() {return response()->download('files/Contoh Gambaran Umum IOT dan Apps.docx');});
Route::get('/template',function() {return response()->download('files/Template Mage.docx');});
Route::get('/logoMage',function() {return response()->download('files/LOGO MAGE 5.zip');});

Route::get('/suratOrisinal',function() {return response()->download('files/SURAT KETERANGAN ORISINALITAS.docx');});
Route::get('/suratKesanggupan',function() {return response()->download('files/SURAT PERNYATAAN KESEDIAAN MENGIKUTI KEGIATAN FINAL.docx');});

Route::get('/lolosTahap1', function () { return response()->file('files/lolos.pdf'); });
Route::get('/progressGame',function() {return response()->download('files/Deskripsi Progress Game Compt.docx');});
Route::get('/progressApps',function() {return response()->download('files/Deskripsi Progress App Iot.docx');});


// ROUTE VUE
Route::get('/', function(){
    return view('vue');
});

Route::get('/about', function(){
    return view('vue');
});

Route::get('/devcom', function(){
    return view('vue');
});

Route::get('/olimpiade', function(){
    return view('vue');
});
Route::get('/esport', function(){
    return view('vue');
});
Route::get('/blog', function(){
    return view('vue');
});
Route::get('/timer', function(){
    return view('vue');
});

// Testing Soal
Route::get('/createsoal', function(){
    return view('vue');
});
Route::post('/submitsoal', 'OlimController@submitSoal');

Route::get('/showsoal', function(){
    return view('vue');
})->middleware('pesertaolim', 'auth');

Route::get('/gamenetwork', function(){
    return view('vue');
})->middleware('pesertaolim', 'auth');

Route::get('/gamenetwork2', function(){
    return view('vue');
});

Route::get('/blog/detail', function(){
    return view('vue');
});
Route::get('/getarticle/{judul}', 'MediumController@getArticle');
Route::get('/getdatamedium', 'MediumController@getDataAll');

Route::get('/blog/{any}', function(){
    return view('vue');
})->where('any', '.*');

Route::get('/showsoal/{nodeid}/{hash_connecting}', function(){
    return view('vue');
})->where(['nodeid' => '[0-9]+',
            'hash_connecting' => '^(?:[A-Za-z0-9+/]{4})*(?:[A-Za-z0-9+/]{2}==|[A-Za-z0-9+/]{3}=)?$'
        ])->middleware('pesertaolim', 'auth');

// // OLIM
Route::get('/mainmenu', function(){
    return view('vue');
})->middleware('pesertaolim', 'auth');

Route::get('/gamestart', function(){
    return view('vue');
})->middleware('pesertaolim', 'auth');
// get all soals
Route::get('/getallsoals', 'UserAnswersController@getAllSoals')->middleware('auth', 'verified');
// get one soal
Route::get('/getsoal/{soalnumber}', 'UserAnswersController@getOneSoal')->middleware('auth', 'verified');
// submit answer
Route::put('/submitanswer', 'UserAnswersController@submitAnswer')->middleware('auth', 'verified');
// Unlock Node
Route::put('/unlocknode', 'UserAnswersController@unlockNode')->middleware('auth', 'verified');

// Soals
Route::get('/soals', 'SoalsController@adminIndex')->middleware('auth','admin');
Route::post('/soals/storesoal', 'SoalsController@storeSoal')->middleware('auth','admin');
Route::post('/soals/editsoal', 'SoalsController@editSoal')->middleware('auth','admin');
Route::post('/soals/deletesoal', 'SoalsController@deleteSoal')->middleware('auth','admin');
Route::get('/soals/previewsoal/{id}', 'SoalsController@previewSoal')->middleware('auth','admin');


// closed
Route::get('/closed', function(){
    return view('user.closed');
});

// test
Route::get('test', 'UserAnswersController@test')->middleware('pesertaolim', 'auth');

// route usersoal
Route::get('/useranswer/generateallsoals', 'UserAnswersController@generateAllSoals')->middleware('admin');
Route::get('/score/generateallscore', 'ScoreController@generateAllScore')->middleware('admin');
Route::get('/score/getlivescore', 'ScoreController@getLivescore')->middleware('admin');
Route::get('/useranswer/generatesoalbyid/{tim_id}', 'UserAnswersController@generateSoalById')->middleware('admin');
Route::get('/score/generatescorebyid/{tim_id}', 'ScoreController@generateScoreById')->middleware('admin');
Route::get('/score/livescore', function(){
    return view('vue');
})->middleware('admin');

Route::get('/testonline', 'OlimController@testOnline')->middleware('pesertaolim', 'auth');


// Route::get('/registermage', function(){
//     return view('auth.registermage');
// })->name('registermage');

// Route::get('/loginmage', function(){
//     return view('auth.loginmage');
// })->name('loginmage');
