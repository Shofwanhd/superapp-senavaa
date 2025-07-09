<x-filament::page>
<!-- Di layout utama -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>


    {{-- Script untuk membuka modal Flowbite --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalElement = document.getElementById('flowbiteModal');

            if (modalElement) {
                const modal = new Modal(modalElement);
                modal.show();
            }
        });
    </script>

    {{-- Flowbite Modal --}}
    <div id="flowbiteModal" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold">
                    PERHATIAN
                </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                        rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600
                        dark:hover:text-white" data-modal-hide="flowbiteModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1
                                     1 0 111.414 1.414L11.414 10l4.293
                                     4.293a1 1 0 01-1.414 1.414L10
                                     11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586
                                     10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>

                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Aplikasi ini didevelop untuk kebutuhan dan penggunaan pribadi developer. Backup selalu data pribadi untuk mencegah hilangnya data. Developer tidak bertanggung jawab
                        apabila data hilang!
                    </p>
                </div>


            </div>
        </div>
    </div>

    {{-- Konten halaman --}}
    <div class="mt-4 ">
        <div class="flex flex-row justify-center items-center">

        <!-- Card -->
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="flex flex-col items-center pb-10">
                <img class="w-24 mt-5 h-24 mb-3 rounded-full shadow-lg" src="{{asset('images/noFilter.webp')}}" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium">Shd</h5>
                <span class="text-sm ">Developer</span>
                <div class="flex mt-4 md:mt-6">
                    <a href="https://www.roblox.com/share?code=2eb9bd57a1eb3b4d81abe24fbf623a12&type=Profile&source=ProfileShare&stamp=1751206603220" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add friend</a>
                </div>
                <span class="text-sm mt-5 ">Current Version</span>
                <span class="text-sm font-bold ">3.0</span>
            </div>    
        </div>
    </div>

    <hr class="h-px my-8 mt-5 mb-5">

<h1 class="text-5xl mb-5 font-extrabold">Version History</h1>
<div class="flex flex-row max-w-1 items-center">
    <ol class="relative border-s border-gray-200 dark:border-gray-700"> 
        
        <li class="mb-10 ms-6"> 
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">9 July 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V3.0 - Current</h5> 
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">New</span>
                <li>Penambahan fitur list Activity Log</li>
                <li>Penambahan fitur export Activity Log</li>
                <li>perubahan form inputan Daily Task integrasi dengan Activity Log</li>

                <br>
                <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">Improvement</span>
                <li>Perubahan format date export daily task menjadi d-M-y </li>
                <li>Penambahan redirect to index after edit Daily Task </li>
                <li>Penambahan redirect to index after edit Task User </li>
                <li>Penambahan redirect to index after edit User (Administrator) </li>
                <li>Penambahan redirect to index after edit List Office (Administrator) </li>
                <li>Penambahan redirect to index after edit User Role (Administrator) </li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

    <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">1 July 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V2.2</h5> 
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Penambahan redirect to index after create Daily Task </li>
                <li>Penambahan redirect to index after create Task User </li>
                <li>Penambahan redirect to index after create User (Administrator) </li>
                <li>Penambahan redirect to index after create List Office (Administrator) </li>
                <li>Penambahan redirect to index after create User Role (Administrator) </li>
                <li>Fix bug foto profile tidak muncul </li>
                </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

        <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">30 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V2.1</h5> 
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Perubahan option Office pada dailytask menjadi dinamis</li>
                <li>Perubahan input pada List user otomatis menarik user id</li>
                <li>Penghilangan button export all pada dailytask</li>
                <li>Perubahan color theme menjadi biru</li>
                <li>Redesign page changelog</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

    <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">29 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V2.0</h5> 
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Penambahan menu edit profile</li>
                <li>Penambahan settingan role user</li>
                <li>Penambahan menu client dinamis</li>
                <li>Update foto profile user</li>
                <li>Pengaturan policy role user</li>
                <li>Penambahan aplikasi Tabunganku</li>
                <li>Penambahan widget data user (admin)</li>
                <li>Penambahan widget data dailytask</li>
                <li>Penambahan widget data tabungan</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

    <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">23 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V1.1.2</h5>
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Fix bug add list user</li>
                <li>Penyesuaian nama user table list user</li>
              	<li>Penambahan filter pada table list user</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

    <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">22 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V1.1.1</h5>
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Penambahan custom favicon</li>
                <li>Penyesuaian fitur PWA</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

        <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">20 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V1.1.0</h5>
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Format font document export sesuai dengan format font standar daily task</li>
                <li>Format alignment document export sesuai dengan format alignment standar daily task</li>
                <li>Penambahan kondisi default filter list dailytask menjadi per-minggu</li>
                <li>Alter table kolom PIC menjadi nullable agar dapat menginput hari libur</li>
                <li>Penyesuaian icon pada menu Daily Task</li>
                <li>Penyesuaian icon pada menu Task User</li>
                <li>Penambahan custom favicon</li>
                <li>Penambahan fitur PWA</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

    <li class="mb-10 ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">15 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V1.0.1</h5>
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Penambahan list category daily task</li>
                <li>Penyesuaian "PIC" pada exporter daily task</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

        <li class="ms-6">            
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">14 June 2025</time>
        <!-- Card -->
        <div class="block max-w-sm p-6 border-gray-200 rounded-lg shadow-sm" style="background: linear-gradient(137deg,rgba(255, 255, 255, 0) 80%, rgba(22, 151, 250, 0.7) 100%);">
        <h5 class="mb-2 text-2xl font-bold tracking-tight">V1.0.0</h5>
            <ul class="max-w-md space-y-1 list-disc list-inside ">
                <li>Initial Build</li>
                <li>CRUD Daily Task</li>
                <li>CRUD Task User</li>
                <li>Export Excel Daily Task</li>
                <li>Notification Export Excel Daily Task</li>
            </ul>
        </div>
    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
    </li>

</ol>
</div>
</x-filament::page>
