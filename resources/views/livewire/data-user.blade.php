@php
    $token = '';
    $idUser = 0;
    if(Session::has("token")) {
        $token = session()->get('token');
    }
@endphp
        <div x-data="users" x-init="users('{{$token}}')" class="w-full flex flex-wrap overflow-y-scroll pb-6 max-h-[525px]">
        <div class="mt-[20px] justify-center ml-[20px] gap-4 w-full flex flex-wrap ">
        
    <div class="w-[949px]">
      <div class="pt-[20px]">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="w-full text-center text-[10px]">
              <thead class="text-[12px] bg-gray-50">
                  <tr>
                      <th scope="col" class="py-4">
                          No.
                      </th>
                      <th scope="col" class="py-4">
                          Nama
                      </th>
                      <th scope="col" class="py-4">
                          Email
                      </th>
                      <th scope="col" class="py-4">
                          Tanggal Lahir
                      </th>
                      <th scope="col" class="py-4">
                          No Telephone
                      </th>
                      <th scope="col" class="py-4">
                          Alamat
                      </th>
                      {{-- <th scope="col" class="py-4">
                          Status
                      </th> --}}
                      <th scope="col" class="py-4">
                          Action
                      </th>
                      <th scope="col" class="py-4">
                          Detail
                      </th>
                  </tr>
              </thead>
              <tbody class="text-[12px]">
                  <template x-for="user, i in data">
                    <template x-if="user.role == 1">
                        <tr class="bg-white border-b">
                            <th x-text="i + 1 - 1" scope="row" class="py-5 px-6 font-medium text-gray-900 whitespace-nowrap"></th>
                            <td x-text="user.name" class="py-5 px-6"></td>
                            <td class="py-5 px-6" x-text="user.email"></td>
                            <td class="py-5 px-6 text-center" x-text="user.tanggal_lahir"></td>
                            <td class="py-5 px-6 text-center" x-text="user.no_telephone"></td>
                            <td class="py-5 px-6 text-center" x-text="user.alamat"></td>
                            {{-- <td class="py-5 px-6">
                                <span x-text="lpr.status ? 'dikembalikan' : 'dipinjam'" x-bind:class="lpr.status ? 'text-center w-[120px] rounded-lg h-[22px] text-[#6FCF97] text-[15px] bg-[rgba(111,207,151,0.2)]' : 'text-[#f63434]'" class="text-center py-[7px] px-[15px] rounded-[20px] text-[#f63434] text-[15px] bg-[rgba(251,71,134,0.2)]"></span>
                            </td> --}}
                            <td class="py-5 px-6">
                                <div class="flex justify-center gap-2">
                                    {{-- <a href="#" class="font-medium text-blue-601 dark:text-blue-500 hover:underline">Edit</a> --}}
                                    <a href="#"><svg class="w-4 h-4" fill="none" stroke="blue" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                                    <a href="#"><svg class="w-4 h-4" fill="none" stroke="red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></a>
                                    {{-- <a href="#" class="font-medium text-blue-601 dark:text-blue-500 hover:underline">Delete</a> --}}
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <a href="#" class="font-medium text-blue-601 dark:text-blue-500 hover:underline">Detail</a>
                            </td>
                        </tr>
                    </template>
                    </template>
              </tbody>
          </table>
        </div>

      </div>
    </div>
        
        </div>
        </div>
        
    </div>
    
</div>