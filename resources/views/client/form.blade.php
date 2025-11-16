@extends('layout')
@section('title', 'เขียนบทความ')

@section('content')
    <h2 class="text-center">เขียนบทความใหม่</h2>
    <form method="POST" action="insert">
        @csrf {{-- เพิ่ม CSRF Token เพื่อความปลอดภัย --}}
        <div class="form-group">
            <label for="title" class="form-label">ชื่อบทความ:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="กรอกชื่อบทความ">
        </div>
        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="content" class="form-label">เนื้อหาบทความ:</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="กรอกเนื้อหาบทความ"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="status" class="form-label">สถานะบทความ:</label>
            <select class="form-select" id="status" name="status">
                <option value="draft">ฉบับร่าง</option>
                <option value="published">เผยแพร่</option>
            </select>
        </div>



        <button type="submit" class="btn btn-primary my-3">บันทึกบทความ</button>
        <a href="{{ route('blog') }}" class="btn btn-secondary">บทความทั้งหมด</a>
    </form>
@endsection
