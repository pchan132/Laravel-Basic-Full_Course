<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // แสดงผลข้อมูลบทความทั้งหมด
    function blogs() {
        // ส่งข้อมูลไปยังมุมมอง (view) แบบ Array
        // เรียกผ่าน ตัวแปร $blogs ในมุมมอง (view)
        //  $blogs = DB::table('blogs')->get();

        // ส่งข้อมูลไปยังมุมมอง (view) แบบ เป็นหน้าๆ ละ 5 รายการ
        $blogs = DB::table('blogs')->paginate(5);
    return view('/client/blog', compact('blogs')); // เข้า path resources/views เรียกดูหน้า blog.blade.php
    }

    // ฟงก์ชั่นแสดงข้อมูล About
    function about() {
        $name = "John Doe"; // การส่งข้อมูลไปยังมุมมอง (view)
        $age = 30; // การส่งข้อมูลไปยังมุมมอง (view)

    return view('/client/about', compact('name', 'age')); // เข้า path resources/views เรียกดูหน้า about.blade.php
    }

    // ฟงก์ชั่นแสดงฟอร์มสร้างบทความ
    function create()
    {
        return view('/client/form'); // เข้า path resources/views เรียกดูหน้า form.blade.php
    }

    // ฟังก์ชั่นบันทึกข้อมูลบทความ
    function insert (Request $request){
        // ตรวจสอบข้อมูลที่ส่งมา
        // การตรวจสอบข้อมูล (Validation)
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ], [
            'title.required' => 'กรุณากรอกหัวข้อบทความ',
            'title.min' => 'หัวข้อบทความต้องมีความยาวอย่างน้อย 5 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'content.min' => 'เนื้อหาบทความต้องมีความยาวอย่างน้อย 10 ตัวอักษร',
        ]);

        // สร้างตัวแปรเก็บข้อมูล ที่มาจากฟอร์ม view('client/form.blade.php')
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // dd($data); // แสดงข้อมูลที่ส่งมา debug
        DB::table('blogs')-> insert($data); // บันทึกข้อมูลลงตาราง blogs
        return redirect() -> route('blog'); // กลับไปยังหน้า blog
    }

    // ฟังก์ชั่นลบข้อมูลบทความตาม id
    function delete($id){
        // dd($id); // แสดงค่า id ที่ส่งมา debug
        // dd(DB::table('blogs')->where('id', $id)-> get() ); // แสดงข้อมูลบทความตาม id ที่ส่งมา debug

        // ลบข้อมูลบทความตาม id
        DB::table('blogs')-> where ('id', $id) -> delete();
        return redirect() -> route('blog'); // กลับไปยังหน้า blog
    }

    // ฟังก์ชั่นแสดงฟอร์มแก้ไขข้อมูลบทความตาม id (แสดงข้อมูลเดิมในฟอร์ม)
    function edit($id){
        // ดึงข้อมูลบทความตาม id ที่ส่งมา เก็บไว้ในตัวแปร $blog
        $blog = DB::table('blogs')-> where ('id', $id) -> first();
        // dd($blog); // แสดงข้อมูลบทความตาม id ที่ส่งมา debug
        // ส่งข้อมูลบทความไปยังมุมมอง (view) ผ่านตัวแปร $blog
        return view('/client/edit', compact('blog')); // เข้า path resources/views เรียกดูหน้า edit.blade.php
    }

    // ฟังก์ชั่นอัพเดทข้อมูลบทความตาม id
    function update(Request $request, $id){
        // ตรวจสอบข้อมูลที่ส่งมา
        // การตรวจสอบข้อมูล (Validation)
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ], [
            'title.required' => 'กรุณากรอกหัวข้อบทความ',
            'title.min' => 'หัวข้อบทความต้องมีความยาวอย่างน้อย 5 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'content.min' => 'เนื้อหาบทความต้องมีความยาวอย่างน้อย 10 ตัวอักษร',
        ]);

        // สร้างตัวแปรเก็บข้อมูล ที่มาจากฟอร์ม view('client/edit.blade.php')
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'updated_at' => now(),
        ];
        DB::table('blogs') -> where ('id', $id) -> update($data); // อัพเดทข้อมูลบทความตาม id
        return redirect() -> route('blog'); // กลับไปยังหน้า blog
    }   
}