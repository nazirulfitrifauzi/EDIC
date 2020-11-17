<div class="fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center" x-show="open">

    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="px-4 py-5 sm:p-6">
            <h3 class=" text-center text-lg leading-6 font-medium text-gray-900">
                Pilih Negeri & Cawangan
            </h3>
            <div class="mt-5">
                <div class="w-full">
                    <form method="post" action="{{ route('mobile.storeNegeri') }}">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="tekun_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                <select id="tekun_state" name="tekun_state"
                                    class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Negeri</option>
                                    @foreach($negeri as $negeris)
                                        <option value="{{ $negeris->kodnegeri }}"
                                            @if(isset(auth()->user()->peribadi->tekun_state))
                                                @if(auth()->user()->peribadi->tekun_state == $negeris->kodnegeri)
                                                    selected
                                                @else
                                                    {{ old('tekun_state') == ($negeris->kodnegeri) ? 'selected':'' }}
                                                @endif
                                            @else
                                                {{ old('tekun_state') == ($negeris->kodnegeri) ? 'selected':'' }}
                                            @endif
                                        >{{ $negeris->namanegeri }}</option>
                                    @endforeach
                                </select>
                                @error('tekun_state')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="tekun_branch"
                                    class="block text-sm font-medium leading-5 text-gray-700">Cawangan Berhampiran dengan Lokasi Perniagaan <span class="text-red-700">*</span>
                                </label>
                                <select id="tekun_branch" name="tekun_branch"
                                    class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Cawangan</option>
                                    @foreach($cawangan as $cawangans)
                                        <option value=
                                            @if(isset(auth()->user()->peribadi->tekun_branch))
                                                "{{ trim($cawangans->kodcawangan,"") }}"
                                            @else
                                                "{{ old('tekun_branch') }}"
                                            @endif

                                            @if(isset(auth()->user()->peribadi->tekun_branch))
                                                @if(auth()->user()->peribadi->tekun_branch == trim($cawangans->kodcawangan," "))
                                                    selected
                                                @else
                                                    {{ old('tekun_branch') == (trim($cawangans->kodcawangan," ")) ? 'selected':'' }}
                                                @endif
                                            @else
                                                {{ old('tekun_branch') == (trim($cawangans->kodcawangan," ")) ? 'selected':'' }}
                                            @endif
                                        >{{ $cawangans->namacawangan }}</option>
                                    @endforeach
                                </select>

                                @error('tekun_branch')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 flex justify-center">
                                <span class="mt-3 inline-flex rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 sm:w-auto sm:text-sm sm:leading-5">
                                    Simpan
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
