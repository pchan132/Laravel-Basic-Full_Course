<?php

use Illuminate\Support\Facades\Route;

// Admin Controller
use App\Http\Controllers\AdminController;

// ตัวอย่างเส้นทางหลัก
Route::get('/', function () {
        return view('welcome'); // เข้า path resources/views เรียกดูหน้า welcome.blade.php
});

// เมื่อไม่เจอเส้นทางที่กำหนด ให้แสดงหน้า 404
Route::fallback(function () {
    return "404 Not Found - The requested resource could not be found.";
});


// เมื่อใช้งาน AdminController
// อธิบาย: Route::get('เส้นทาง', [Controller::class, 'method' หรือ function]) -> name('ชื่อเส้นทาง');
Route::get ('about', [AdminController::class, 'about']) -> name('about'); // แสดงหน้า About
Route::get ('blog', [AdminController::class, 'blogs']) -> name('blog'); // แสดงรายการบทความ
Route::get ('create', [AdminController::class, 'create']) -> name('create'); // แสดงฟอร์มสร้างบทความ
Route::post('insert', [AdminController::class, 'insert']) -> name('insert'); // รับข้อมูลจากฟอร์มแบบ POST

// ลบข้อมูลบทความ ตาม id
Route::get('delete/{id}', [AdminController::class, 'delete']) -> name('delete'); // ลบข้อมูลบทความตาม id  

// แก้ไขข้อมูลบทความ ตาม id
Route::get('edit/{id}', [AdminController::class, 'edit']) -> name('edit'); // แสดงฟอร์มแก้ไขข้อมูลบทความตาม id  
Route::post('update/{id}', [AdminController::class, 'update']) -> name('update'); // อัพเดทข้อมูลบทความตาม id
// ตัวอย่างการใช้งานแบบ Closure function
// Route::get('about', function () {
    // $name = "John Doe"; // การส่งข้อมูลไปยังมุมมอง (view)
    // $age = 30; // การส่งข้อมูลไปยังมุมมอง (view)

    // return view('/client/about', compact('name', 'age')); // เข้า path resources/views เรียกดูหน้า about.blade.php
// })->name('about');

// Route::get('blog', function () {
    // Controller: AdminController, Method: blogs

    // ส่งข้อมูลไปยังมุมมอง (view) แบบ Array
    // $blogs = [
    //     [
    //         'title' => 'บทความ Laravel สำหรับผู้เริ่มต้น',
    //         'content' => 'นี่คือเนื้อหาของบทความเกี่ยวกับ Laravel..',
    //         'status' => true
    //     ],
    //     [
    //         'title' => 'ทำความรู้จักกับ PHP 8',
    //         'content' => 'นี่คือเนื้อหาของบทความเกี่ยวกับ PHP 8..',
    //         'status' => false
    //     ],
    //     [
    //         'title' => 'บทความ Laravel สำหรับผู้เริ่มต้น // 2',
    //         'content' => 'นี่คือเนื้อหาของบทความเกี่ยวกับ PHP 8..',
    //         'status' => true
    //     ]
    // ];
    // return view('/client/blog', compact('blogs')); // เข้า path resources/views เรียกดูหน้า blog.blade.php
// })->name('blog');