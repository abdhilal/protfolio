<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectFeatureController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\ProjectLinkController;
use App\Http\Controllers\ProjectTechnologyController;
use App\Models\ProjectFeature;
use App\Models\ProjectLink;
use App\Models\ProjectTechnology;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProjectController::class, 'index'])->name('portfolio.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.show');


Route::get('/c990/',[ProjectController::class, 'create'])->name('project.create');
Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
Route::get('/e990/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/update/{projectId}', [ProjectController::class, 'update'])->name('project.update');


Route::put('/projects/{project}/technologies', [ProjectTechnologyController::class, 'update'])->name('project.technologies.update');
Route::put('/projects/{project}/links', [ProjectLinkController::class, 'update'])->name('project.links.update');
Route::post('/projects/{project}/images', [ProjectImageController::class, 'update'])->name('project.images.update');
Route::put('/projects/{project}/features', [ProjectFeatureController::class, 'update'])->name('project.features.update');



