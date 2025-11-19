<x-app-web-layout>

    {{-- ใส่ title --}}
    {{-- x-slot name="title" --}}
    <x-slot:title>
        Client Index Page
    </x-slot:title>

    {{-- Alert components --}}
    @php
        $messageNew = 'Operation completed successfully!';
        $type = 'success';
    @endphp
    {{-- เหมือนส่งค่า ผ่าน props --}}
    {{-- ต้องไประบุว่ารับ ค่า props ที่ View(Components\AlertMessage.php)  เมื่อไม่มีหรือชื่อ props ไม่ตรง จะ error --}}
    <x-alert-message :type="$type" :messageNew="$messageNew" />

    {{-- --------------------------------------------------------- --}}
    @php
        $messageNew = 'This is a warning message!';
        $type = 'warning';
    @endphp
    <x-alert-message :type="$type" :messageNew="$messageNew" />
    {{-- --------------------------------------------------------- --}}

    {{-- เนื้อหา --}}
    <h4>
        Welcome to Client Index Page
    </h4>

    <hr>
    {{-- Slots in components --}}
    <x-form.label value="First Name in value" />
    <x-form.label>
        This is a label for the input field.
    </x-form.label>

    <x-slot:script>
        alert('Hello from Client Index Page');
    </x-slot:script>

</x-app-web-layout>
