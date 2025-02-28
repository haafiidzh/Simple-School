<nav :class="isOpen ? 'w-52' : 'w-20'" class="fixed flex-shrink-0 transition-all duration-300 h-full bg-white">
    <div class="flex flex-col justify-between h-screen bg-slate-200 shadow-xl">
        <div class="px-4 py-6">

            <a href="{{ route('administrator.dashboard') }}" target="_blank" class="-mx-2 p-2 flex justify-center"
                :class="!isOpen ? 'w-16 transition-all duration-300' : 'w-48 transition-all duration-300'">
                <img :src="!isOpen ? '{{ url('logo.png') }}' :
                    '{{ url('logo.png') }}'"
                    class="h-14 w-14 drop-shadow-md object-contain" alt="">
            </a>

            <ul class="mt-5 space-y-1">
                {{-- general --}}
                @foreach ($menu as $item)
                    @if ($item['is_separator'])
                        {{-- @canany($item['permission'], 'web') --}}
                            <li>
                                <div :class="!isOpen ? 'hidden' : ''"
                                    class="pl-4 my-2 text-xs text-gray-500 font-medium transition-all duration-300">
                                    {{ $item['name'] }}</div>
                            </li>
                        {{-- @endcanany --}}
                    @else
                        {{-- @canany($item['permission'], 'web') --}}
                            @if (empty($item['childs']))
                                <li>
                                    <a wire:navigate href="{{ $item['route'] }}"
                                        class="{{ $item['active'] ? 'bg-gray-100 px-4 py-2 text-gray-700' : 'text-gray-500' }} block rounded-lg px-4 py-2 text-md font-medium hover:bg-gray-100 hover:text-gray-700 hover:transition-all hover:duration-200">
                                        <div class="flex gap-3 items-center">
                                            <i class="{{ $item['icon'] }}"></i>
                                            <span
                                                :class="!isOpen ? 'hidden transition-all duration-300' :
                                                    'transition-all duration-300'">{{ $item['name'] }}</span>
                                        </div>

                                    </a>
                                </li>
                            @else
                                <div x-data="{ child: {{ $item['active'] ? 'true' : 'false' }} }">
                                    <li>
                                        <div @click="child = !child"
                                            :class="child ? 'bg-gray-100 px-4 py-2 text-gray-700' : 'text-gray-500'"
                                            class="{{ $item['active'] ? 'bg-gray-100 px-4 py-2 text-gray-700' : 'text-gray-500' }} flex cursor-pointer justify-between items-center rounded-lg px-4 py-2 text-md font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 hover:transition-all hover:duration-200">
                                            <div class="flex gap-3 items-center">
                                                <i class="{{ $item['icon'] }}"></i>
                                                <span
                                                    :class="!isOpen ? 'hidden transition-all duration-300' : 'transition-all duration-300'">{{ $item['name'] }}</span>
                                            </div>
                                            <div :class="!isOpen ? 'hidden transition-all duration-300' : 'transition-all duration-300'">
                                                <i :class="child ? 'fa-rotate-90' : ''"
                                                class="fa-solid fa-chevron-right text-xs transition-all duration-300"></i>
                                            </div>
                                            
                                        </div>
                                    </li>
                                    <li x-cloak
                                        x-show="child" x-transition:enter="transition translate-y-0 ease-out duration-300"
                                        x-transition:enter-start="opacity-0 bottom-10"
                                        x-transition:enter-end="opacity-100 bottom-0 "
                                        x-transition:leave="transition translate-y-0 ease-in duration-200"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                        <ul class="mt-1 py-2 space-y-1 bg-slate-300 rounded-md"
                                            :class="!isOpen ? 'px-2' : 'px-3'">
                                            @foreach ($item['childs'] as $child)
                                                <li class="">
                                                    <a wire:navigate href="{{ $child['route'] }}"
                                                        class="{{ $child['active'] ? 'bg-gray-100 text-gray-700' : 'text-gray-500' }} block rounded-lg p-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 hover:transition-all hover:duration-200">
                                                        <i class="{{ $child['icon'] }} pr-2"></i>
                                                        <span
                                                            :class="!isOpen ? 'hidden transition-all duration-300' :
                                                                'transition-all duration-300'">{{ $child['name'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </div>
                            @endif
                        {{-- @endcanany --}}
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
