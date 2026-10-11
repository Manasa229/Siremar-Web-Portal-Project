// events api
Route::post('/events', [eventController::class,'addEvent']);
Route::get('/events', [eventController::class,'getEvents']);
Route::get('/events/inspectors/{county_id}', [eventController::class,'getEventsForInspectors']);
Route::get('/events/residents', [eventController::class,'getEventsForResidents']);
Route::get('/events/{id}', [eventController::class,'getEventById']);
Route::get('/events/delete/{id}', [eventController::class,'deleteEventById']);