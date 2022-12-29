@extends('template')

@section('content')
  <div class="flex gap-[30px] bg-[#fbe7e7]">
    <div class="mt-[-38px] bg-[white] w-[315px] h-[561px] ml-[30px] rounded-lg">
      <div class="profil pt-[56px]">
        <div class="flex justify-center mb-[20px]">
          <img class="w-[35px] rounded-full" src="https://avatars.githubusercontent.com/u/51530301?v=4" alt="">
        </div>
        <p class="text-center mb-[8px] text-[20px] text-[#333333] font-[700]">Obito pranata</p>
        <div class="flex justify-center mb-[69px]">
          <p class="text-center w-[120px] rounded-lg h-[22px] text-[#6FCF97] text-[15px] bg-[rgba(111,207,151,0.2)]">Administrator</p>
        </div>
        
        <div class="ml-[35px]">
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="icons/dataBuku.svg" alt="">
            <p>Data Buku</p>
          </div>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="icons/daftarAnggota.svg" alt="">
            <p>Daftar User</p>
          </div>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="icons/transaksi.svg" alt="">
            <p>Transaksi</p>
          </div>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="icons/laporan.svg" alt="">
            <p>Laporan</p>
          </div>
        </div>

      </div>
    </div>
    <div class="w-[950px]">
      <div class="pt-[24px]">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="w-full text-center text-[11px]">
              <thead class="text-[13px] bg-gray-50">
                  <tr>
                      <th scope="col" class="py-3">
                          No.
                      </th>
                      <th scope="col" class="py-3">
                          ID Anggota
                      </th>
                      <th scope="col" class="py-3">
                          Nama Anggota
                      </th>
                      <th scope="col" class="py-3">
                          Tanggal Pinjam
                      </th>
                      <th scope="col" class="py-3">
                          Tanggal Kembali
                      </th>
                      <th scope="col" class="py-3">
                          Total Pinjam
                      </th>
                      <th scope="col" class="py-3">
                          Status
                      </th>
                      <th scope="col" class="py-3">
                          Action
                      </th>
                      <th scope="col" class="py-3">
                          Detail
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-white border-b">
                      <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                          1
                      </th>
                      <td class="py-4 px-6">
                          20221227
                      </td>
                      <td class="py-4 px-6">
                          Obito Pranata
                      </td>
                      <td class="py-4 px-6">
                          27/12/2022
                      </td>
                      <td class="py-4 px-6 text-center">
                          -
                      </td>
                      <td class="py-4 px-6 text-center">
                          2
                      </td>
                      <td class="py-4 px-6">
                          <span class="text-center py-[8px] px-[15px] rounded-[20px] text-[#f63434] text-[15px] bg-[rgba(251,71,134,0.2)]">pinjam</span>
                      </td>
                      <td class="py-4 px-6">
                          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                      </td>
                      <td class="py-4 px-6">
                          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                      </td>
                  </tr>
                  <tr class="bg-white border-b">
                      <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                          2
                      </th>
                      <td class="py-4 px-6">
                          20221227
                      </td>
                      <td class="py-4 px-6">
                          Tegar pratama
                      </td>
                      <td class="py-4 px-6">
                          27/12/2022
                      </td>
                      <td class="py-4 px-6 text-center">
                          -
                      </td>
                      <td class="py-4 px-6 text-center">
                          1
                      </td>
                      <td class="py-4 px-6">
                          <span class="text-center py-[8px] px-[15px] rounded-[20px] text-[#6FCF97] text-[15px] bg-[rgba(111,207,151,0.2)]">kembali</span>
                      </td>
                      <td class="py-4 px-6">
                          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                      </td>
                      <td class="py-4 px-6">
                          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
@endsection