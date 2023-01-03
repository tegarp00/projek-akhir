@php
    $token = '';
    $idUser = 0;
    if(Session::has("token")) {
        $token = session()->get('token');
    }
@endphp
<div x-data="{title: 'laporan'}">

    <template x-if="title == 'laporan'">
        @livewire('empty-dashboard')
        @livewire('content-admin')
    </template>
    <template x-if="title == 'data-buku'">
        @livewire('empty-dashboard')
        @livewire('data-buku')
    </template>
    <template x-if="title == 'daftar-user'">
        @livewire('empty-dashboard')
        @livewire('data-user')
    </template>
</div>
