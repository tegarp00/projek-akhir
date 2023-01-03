@php
    $token = '';
    $idUser = 0;
    if(Session::has("token")) {
        $token = session()->get('token');
    }
@endphp
<div>
    <div class="flex gap-2">
        <div class="mt-2 w-[107px] text-[12px] justify-center text-[#F7FAFC] flex items-center h-[34px] bg-[#6477DB] rounded-[20px]">
            <a href="/addbook">Add New Book</a>
        </div>
        <div class="mt-2 w-[107px] text-[12px] justify-center text-[#F7FAFC] flex items-center h-[34px] bg-[#6477DB] rounded-[20px]">
            <a href="{{route('addCategori')}}">New Categori</a>
        </div>
    </div>
    <div class="w-[949px]">
      <div class="pt-[20px]">
        <div x-data="laporan" x-init="laporans('{{$token}}'), countslaporan('{{$token}}')" class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="w-full text-center text-[10px]">
              <thead class="text-[12px] bg-gray-50">
                  <tr>
                      <th scope="col" class="py-4">
                          No.
                      </th>
                      <th scope="col" class="py-4">
                          Nama Peminjam
                      </th>
                      <th scope="col" class="py-4">
                          Tanggal Pinjam
                      </th>
                      <th scope="col" class="py-4">
                          Tanggal Kembali
                      </th>
                      <th scope="col" class="py-4">
                          Total Pinjam
                      </th>
                      {{-- <th scope="col" class="py-4">
                          Status
                      </th> --}}
                      {{-- <th scope="col" class="py-4">
                          Action
                      </th> --}}
                      <th scope="col" class="py-4">
                          Detail
                      </th>
                  </tr>
              </thead>
              <tbody class="text-[12px]">
                  <template x-for="l in laporan">
                  <template x-for="lpr, i in data">
                    <template x-if="l.id_user === lpr.id_user">
                        <tr class="bg-white border-b">
                            <th x-text="i + 1" scope="row" class="py-5 px-6 font-medium text-gray-900 whitespace-nowrap"></th>
                            <td x-text="lpr.user.name" class="py-5 px-6"></td>
                            <td class="py-5 px-6" x-text="lpr.tanggal_peminjaman"></td>
                            <td class="py-5 px-6 text-center" x-text="lpr.tanggal_pengembalian"></td>
                            <td class="py-5 px-6 text-center" x-text="l.count"></td>
                            {{-- <td class="py-5 px-6">
                                <span x-text="lpr.status ? 'dikembalikan' : 'dipinjam'" x-bind:class="lpr.status ? 'text-center w-[120px] rounded-lg h-[22px] text-[#6FCF97] text-[15px] bg-[rgba(111,207,151,0.2)]' : 'text-[#f63434]'" class="text-center py-[7px] px-[15px] rounded-[20px] text-[#f63434] text-[15px] bg-[rgba(251,71,134,0.2)]"></span>
                            </td> --}}
                            {{-- <td class="py-5 px-6">
                                <a href="#" class="font-medium text-blue-601 dark:text-blue-500 hover:underline">Edit</a>
                            </td> --}}
                            <td class="py-5 px-6">
                                <a href="#" class="font-medium text-blue-601 dark:text-blue-500 hover:underline">Detail</a>
                            </td>
                        </tr>
                    </template>
                    </template>
                </template>
              </tbody>
          </table>
        </div>

      </div>
    </div>
</div>
