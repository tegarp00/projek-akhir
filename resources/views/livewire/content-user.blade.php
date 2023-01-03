<div x-data="{pilihan : 'list-buku'}">

    @livewire('empty-dashboard')
    
    <template x-if="pilihan == 'list-buku'">
        @livewire('list-buku')
    </template>
    <template x-if="pilihan == 'list-pinjaman'">
        @livewire('list-pinjam')
    </template>

</div>
