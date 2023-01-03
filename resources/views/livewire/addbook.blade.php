@livewire('empty-dashboard')
@php
    $token = '';
    $idUser = 0;
    if(Session::has("token")) {
        $token = session()->get('token');
    }
@endphp
<div x-data class="mt-2 mb-4">
    <h1 class="text-center text-[black]">Tambahkan Buku</h1>
    {{-- <form class="mt-[20px]" method="POST" enctype="multipart/form-data" @submit.prevent="$store.app.submitData()"> --}}
        <div class="flex gap-2">
            <div>
                <div class="">
                    <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Judul</label>
                <input x-model="$store.app.form.judul" type="text" id="success" class="bg-green-50 border" placeholder="" name="judul">
            </div>
            <div class="mb-2">
            <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Jumlah halaman</label>
            <input x-model="$store.app.form.jumlah_halaman"  type="number" id="success" class="bg-green-50 border" placeholder="" name="jumlah_halaman">
            </div>
            <div x-data="kategori" x-init="kategoris('{{$token}}')">
                <label for="countries" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Kategori</label>
                <select id="countries" name="id_kategori" x-model="$store.app.selectedKategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih kategori</option>
                    <template x-for="kate in data">
                        <option :value="kate.id" x-text="kate.nama_kategori"></option>
                    </template>
                </select>
                {{-- <p x-text="$store.app.selectedKategori"></p>  --}}
            </div>
          <div class="mb-2">
            <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Kuota</label>
            <input x-model="$store.app.form.kuota" type="number" id="success" class="bg-green-50 border" placeholder="
            " name="kuota">
          </div>
          <div class="mb-2">
              <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Pengarang</label>
            <input x-model="$store.app.form.pengarang" type="text" id="success" class="bg-green-50 border" placeholder="" name="pengarang">
        </div>
          <div class="mb-2">
            <label for="success" class="block text-sm font-medium text-green-700 dark:text-green-500">Penerbit</label>
            <input x-model="$store.app.form.penerbit" type="text" id="success" class="bg-green-50 border" placeholder="" name="penerbit">
        </div>
    </div>

          <div>

              <div class="mb-2">
                  <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Deskripsi</label>
                  <input x-model="$store.app.form.deskripsi" type="text" id="success" class="bg-green-50 border" placeholder="" name="tahun_terbit">
                </div>
              <div class="mb-2">
                  <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Tahun Terbit</label>
                  <input x-model="$store.app.form.tahun_terbit" type="date" id="success" class="bg-green-50 border" placeholder="" name="tahun_terbit">
                </div>
                <div class="mb-2">
                    <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">Author</label>
                    <input x-model="$store.app.form.author" type="text" id="success" class="bg-green-50 border" placeholder="" name="author">
                </div>
                <div class="mb-2">
            <label for="success" class="block mb-1 text-sm font-medium text-green-700 dark:text-green-500">ISBN</label>
            <input x-model="$store.app.form.isbn" type="number" id="success" class="bg-green-50 border" placeholder="" name="isbn">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input id="inputFile" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="file" aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, CSV, EXCEL, DOCS.</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Image</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" aria-describedby="file_input_help" id="inputImage" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
        </div>

        </div>
    </div>
    <button x-data  @click="$store.app.submitData('{{$token}}')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
{{-- </form> --}}
</div>
</div>