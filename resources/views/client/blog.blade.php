@extends('layout')

@section('title', 'บทความทั้งหมด')

@section('content')
    {{-- แสดงข้อมูลบทความทั้งหมด ที่เป็น Array --}}
    {{-- {{ print_r($blogs ?? 'ไม่มีบทความในขณะนี้') }} --}}
    <h1 class="text text-center">รายการบทความ</h1>
    <p class="text-center">นี่คือหน้ารวมบทความทั้งหมดในบล็อกของเรา</p>
    <hr>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อบทความ</th>
                <th scope="col">เนื้อหา</th>
                <th scope="col">สถานะ</th>
                <th scope="col">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @if ($blogs->count() > 0)
                @foreach ($blogs as $index => $blog)
                    <tr>
                        <td scope="row">
                            {{ $index + 1 }}
                        </td>
                        <td>
                            {{ Str::limit($blog->title, 20) }}
                        </td>
                        <td>
                            {{ Str::limit($blog->content, 40) }}
                        </td>
                        {{-- แสดงแบบมีเงื่อนไข --}}
                        @if ($blog->status == 'published')
                            <td class="text-success">สถานะ: เผยแพร่</td>
                        @else
                            <td class="text-danger">สถานะ: ฉบับร่าง</td>
                        @endif

                        <td>
                            {{-- ปุ่มแก้ไข --}}
                            <a href="{{ route('edit', ['id' => $blog->id]) }}" class="btn btn-sm btn-warning"
                                onclick="{}">แก้ไข</a>

                            {{-- ปุ่มลบ --}}
                            <a href="{{ route('delete', ['id' => $blog->id]) }}" class="btn btn-sm btn-danger"
                                onclick="return confirm('คุณต้องการลบบทความ {{ $blog->title }} หรือไม่ ? ')">ลบ</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">ไม่มีบทความในขณะนี้</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{-- แสดงลิงก์เปลี่ยนหน้า --}}
    {{ $blogs->links() }}
@endsection
