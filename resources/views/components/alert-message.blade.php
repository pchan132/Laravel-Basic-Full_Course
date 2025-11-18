{{-- @props(['messageNew']) รับ props messageNew เมื่อไม่ได้ประกาศใน AlertMessage.php --}}
<div {{ $attributes->merge(['class' => 'alert alert-' . $type]) }}>
    <h4>{{ $messageNew }} {{-- แสดงผล message --}} </h4>
    <h4>type : {{ $type }} {{-- แสดงผล message --}} </h4>
</div>
