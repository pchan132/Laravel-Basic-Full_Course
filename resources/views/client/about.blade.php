@extends('layout')

@section('title', 'เกี่ยวกับเรา')

@section('content')
    <h1>เกี่ยวกับเรา</h1>
    <p>นี่คือหน้าข้อมูลเกี่ยวกับเรา</p>
    <p>ชื่อ: {{ $name }}</p>
    <p>อายุ: {{ $age }} ปี</p>
@endsection
