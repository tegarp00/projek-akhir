@livewire('empty-dashboard')
@php
    $token = '';
    $idUser = 0;
    if(Session::has("token")) {
        $token = session()->get('token');
    }
@endphp
    <div x-data class="mt-4 mb-4">
        <h1 class="text-center text-[black]">Tambahkan Kategori</h1>
    {{-- <form class="mt-[20px]" method="POST" enctype="multipart/form-data" @submit.prevent="$store.app.submitData()"> --}}
            <div class="flex gap-2">
                <div>
                    <div class="mb-2">
                        <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Nama Kategori</label>
                        <input x-model="$store.addCategori.form.nama_kategori" type="text" id="success" class="bg-green-50 border" placeholder="" name="">
                    </div>
                </div>
            </div>
        <button x-data  @click="$store.addCategori.submitData('{{$token}}')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    {{-- </form> --}}
    </div>
{{-- livewire --}}
</div>
{{-- livewire-end --}}