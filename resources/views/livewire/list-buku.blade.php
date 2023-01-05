@php
    $token = '';
    $idUser = 0;
    $value = session()->get('id_user');
    if(Session::has("token")) {
        $token = session()->get('token');
    }
@endphp
    <div x-data="books" x-init="books('{{$token}}')" class="w-full flex flex-wrap overflow-y-scroll pb-6 max-h-[525px]">
        <div class="mt-[20px] justify-center ml-[20px] gap-4 w-full flex flex-wrap ">

            <template x-for="buku, i in data" :key="buku.id">
                <div x-data="pinjam" x-init="statusPinjam(buku.id)" class="max-w-[230px] bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" x-bind:src="'https://fenyaperpus.fly.dev/storage/' + buku.image" alt="" />
                    </a>
                <div class="p-5">
                    <a href="#">
                        <h5 x-text="buku.judul" class="mb-2 text-[16px] font-bold tracking-tight text-gray-900 dark:text-white"></h5>
                    </a>
                <p x-text="buku.deskripsi" class="mb-3 font-normal text-[14px] text-gray-700 dark:text-gray-400"></p>
                    <a href="#">
                        <div x-data="{clicked: false,}" x-effect="clicked = !!localStorage.getItem(`stop-click/${buku.id}`)" x-init="clicked = !!localStorage.getItem(`stop-click/${buku.id}`)"  x-on:click="simpanLocal(buku.id)">
                            <template x-if="clicked">
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <button x-bind:disabled="clicked">Sudah dipinjam</button>
                                </a>
                            </template> 
                                
                            <template x-if="!clicked">
                                <a x-model="form.id_user = '{{$value}}', form.id_buku" href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <button x-data @click="submitPinjam('{{$token}}', buku.id)">Pinjam</button>
                                </a>
                            </template>  
                        </div>
                    </a>
            </template>

        </div>
    </div>
    
</div>
