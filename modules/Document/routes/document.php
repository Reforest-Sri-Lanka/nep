<?php

use Document\Http\Controllers\DocumentController;

Route::middleware(['auth'])->group(function () {
Route::get('/manage_documents', [DocumentController::class, 'manage_documents'])->name('manage-documents');
Route::get('/show_full_document/{id}', [DocumentController::class, 'show_full_document']);
Route::patch('/document/update/{id}', 'Modules\General\Document\Http\Controllers\DocumentController@update'); 
Route::get('/create_document', [DocumentController::class, 'create_document'])->name("create-document");
Route::post('/store', [DocumentController::class, 'store'])->name('store-document'); 
Route::get('/progressUpdate/{pid}', [DocumentController::class, 'progress_update']);
Route::get('/view_document_progress/{pid}', [DocumentController::class, 'view_environment_restoration_progress']);
Route::post('/progressSave', [DocumentController::class, 'progress_save'])->name('update.species');

Route::post('/ajax_upload/documentupload', [DocumentController::class, 'documentupload'])->name('ajaxmap.documentupload');

});