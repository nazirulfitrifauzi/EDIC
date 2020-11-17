<div class="mt-1">
    <label for="profile_pic"
        class="block text-sm leading-5 font-medium text-gray-700">Gambar Passport
        <span class="text-red-700"> *</span></label>

    @if(isset(auth()->user()->pinjaman->gambar))
    <div class="mt-2 px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md"
        x-data="{ open: false }">
        <div class="w-full">
            <img src="{{ asset('storage/' . auth()->user()->ic_no . '/' . auth()->user()->pinjaman->gambar . '') }}" class="h-40">
        </div>
        <div class="w-full">
            <span class="mt-3 inline-flex rounded-md shadow-sm">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150 cursor-pointer"
                    @click.prevent="open = true">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd">
                    </svg>
                    Padam Gambar
                </button>
            </span>
        </div>

        {{-- delete gambar modal --}}
        <div class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center"
            x-show="open" x-cloak>
            <div class="fixed inset-0 transition-opacity" x-show="open" x-cloak
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start=" opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6"
                x-show="open" x-cloak x-transition:enter="ease-out duration-300"
                x-transition:enter-start=" opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Padam Gambar!
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500">
                                Adakah anda pasti untuk memadam gambar ini?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                            onclick="event.preventDefault();deleteGambar({{auth()->user()->pinjaman->id}})">
                            Padam!
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                            @click="open = false">
                            Batal
                        </button>
                    </span>
                </div>
            </div>
        </div>
        {{-- end delete gambar modal --}}
    </div>
    @else

    <div id="gambar-div"
        class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('gambar') border-red-500 @enderror border-dashed rounded-md cursor-pointer"
        style="display: block;">
        <div class="text-center">
            <input type="file" name="gambar" id="gambar" class="hidden" />
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                viewBox="0 0 48 48">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="mt-1 text-sm text-gray-600">
                <a
                    class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition duration-150 ease-in-out">
                    Muat naik
                </a>
            </p>
            <p class="mt-1 text-xs text-gray-500">
                PNG & JPG sahaja.
            </p>
            @error('gambar')
            <p class="text-red-500 text-xs italic mt-4">
                Ruangan Gambar diperlukan
            </p>
            @enderror
        </div>
    </div>

    <div id="uploaded-div"
        class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer"
        style="display:none">
        <img id="uploaded" src="" class="h-40">
        <span class="mt-3 inline-flex rounded-md shadow-sm">
            <a id="buttonDel" type="button"
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150"
                onclick="delPicture()">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd">
                </svg>
                Padam Gambar
            </a>
        </span>
    </div>

    @endif
</div>