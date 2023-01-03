    {{-- nav --}}
    <div class="w-full drop-shadow-xl bg-[#6477DB] border-[1px solid #000000]">
        <div class="container flex items-center h-[74px] justify-between">
            <div class="flex items-center gap-[15px] h-[74px]">
                <img class="w-[35px]" src="{{asset('icons/brand.svg')}}" alt="">
                <img class="h-[25px]" src="{{asset('icons/line.svg')}}" alt="">
                <p class="font-bold text-[24px] text-[white] ">Perpustakaan</p>
            </div>
            <div class="flex items-center gap-[10px]">
                <div class="flex flex-row">
                    <a href="#" data-popover-target="popover-bottom"><img class="h-[12px] rounded-full" src="{{asset('icons/down.svg')}}" alt=""></a>
                    <div class="flex flex-row">
                        <div data-popover id="popover-bottom" role="tooltip" class="absolute z-10 invisible inline-block w-54 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                  {{Session::get('name')}}
                                </h3>
                            </div>
                            <div class="px-3 py-2">
                                <ul>
                                    {{-- <li class="mb-[10px]">
                                        <a class="hover:text-[blue]" href="#">Profile</a>
                                    </li> --}}
                                    <li>
                                        <a class="hover:text-[red]" href="{{route('logout')}}">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>
            </div>
                <img class="w-[35px] rounded-full" src="https://avatars.githubusercontent.com/u/51530301?v=4" alt="">
        </div>
    </div>
    {{-- nav-end --}}
    <div class="w-full h-[74px] bg-[#6476da] flex justify-center items-center border-b-[1px] border-b-[#1E1E1E] shadow-[0px_4px_4px_rgba(0,0,0,0.25)] relative">
      <div class="bg-gradient-to-t from-black/0 to-black/10 w-full h-[20%] absolute top-0"></div>

        @if (session()->get('role') === 1)
        <p class="text-[32px] text-[white] font-normal text-[500]"
          x-text="pilihan =='list-buku' ? 'List Buku' : pilihan == 'list-pinjaman' ? 'Daftar Buku Pinjaman' : 'apalah'"
        >
        </p>
        @endif

        @if (session()->get('role') === 2)
        <p class="text-[32px] text-[white] font-normal text-[500]"
          x-text="title =='data-buku' ? 'Data Buku' : title == 'laporan' ? 'Laporan' : title == 'daftar-user' ? 'Daftar User' : ''"
        >
        </p>
        @endif

    </div>
  <div class="flex gap-[30px] bg-[#fbe7e7]">
    <div class="mt-[-38px] bg-[white] w-[315px] h-[561px] ml-[30px] rounded-lg relative z-50">
      <div class="profil pt-[56px] absolute w-full">
        <div class="flex justify-center mb-[20px]">
          <img class="w-[35px] rounded-full" src="https://avatars.githubusercontent.com/u/51530301?v=4" alt="">
        </div>
        <p class="text-center mb-[8px] text-[20px] text-[#333333] font-[700]">
          {{Session::get('name')}}
        </p>
        <div class="flex justify-center mb-[69px]">
          <p class="text-center w-[120px] rounded-lg h-[22px] text-[#6FCF97] text-[15px] bg-[rgba(111,207,151,0.2)]">
          @if (session()->get('role') === 2)
            Administrator
          @endif
          @if (session()->get('role') === 1)
            Pengguna
          @endif
          </p>
        </div>
        
          @if (session()->get('role') === 2)
          <a href="#" x-on:click="title = 'data-buku'">
            <div class="ml-[35px]">
              <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/dataBuku.svg')}}" alt="">
            <p>Data Buku</p>
          </div>
          </a>
          
          <a href="#" x-on:click="title = 'daftar-user'">
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/daftarAnggota.svg')}}" alt="">
            <p>Daftar User</p>
          </div>
          </a>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/transaksi.svg')}}" alt="">
            <p>Transaksi</p>
          </div>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/laporan.svg')}}" alt="">
            @if (session()->get('role') === 2)
            <a href="{{route('admin')}}">Laporan</a>
            @endif
          </div>
        </div>
        @endif

        {{-- user --}}
          @if (session()->get('role') === 1)
          <a href="#" x-on:click="pilihan = 'list-buku'">
            <div class="ml-[35px]">
                <div class="menu flex items-center">
              <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/dataBuku.svg')}}" alt="">
              <p>List Buku</p>
            </div>
          </a>
          <a href="#" x-on:click="pilihan = 'list-pinjaman'">
            <div class="menu flex items-center">
              <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/daftarAnggota.svg')}}" alt="">
              <p>List Buku Pinjaman</p>
            </div>
          </a>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/transaksi.svg')}}" alt="">
            <p>Transaksi</p>
          </div>
          <div class="menu flex items-center">
            <img class="w-[35px] mr-2 mb-[11px]" src="{{asset('icons/laporan.svg')}}" alt="">
            <a href="">Laporan</a>
          </div>
        </div>
          @endif

      </div>
    </div>
      {{-- @livewire('addbook') --}}
  {{-- </div> --}}