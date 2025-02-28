@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="">

            <div class="w-full py-10 flex flex-col items-center">
                <div class="mb-6 font-poppins text-gray-800">
                    <p class="leading-5">
                        {!! __('Menampilkan') !!}
                        @if ($paginator->firstItem())
                            <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                            {!! __('-') !!}
                            <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        {!! __('dari') !!}
                        <span class="font-semibold">{{ $paginator->total() }}</span>
                        {!! __('berita') !!}
                    </p>
                </div>

                <div>
                    <div class="flex items-center gap-3">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <div class="opacity-20">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M19.25 12H5"></path>
                                    </svg>
                                </div>
                            @else
                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after">
                                    <div class="flex justify-center items-center w-10 h-10 bg-transparent hover:bg-primary rounded-full transition-colors duration-300 hover:text-white text-primary">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" d="M19.25 12H5"></path>
                                        </svg>
                                    </div>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span
                                        wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <div class="font-semibold text-lg text-gray-200 flex justify-center items-center bg-primary rounded-full h-10 w-10">
                                                {{ $page }}
                                            </div>
                                        @else
                                            <button type="button"
                                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                x-on:click="{{ $scrollIntoViewJsSnippet }}">
                                                <div class="font-semibold text-lg text-primary flex justify-center items-center bg-transparent border-2 border-primary rounded-full h-10 w-10 hover:bg-primary hover:text-gray-200 transition-colors duration-300">
                                                    {{ $page }}
                                                </div>
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after">
                                    <div class="flex justify-center items-center w-10 h-10 bg-transparent hover:bg-primary rounded-full transition-colors duration-300 hover:text-white text-primary">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" d="M19 12H4.75"></path>
                                        </svg>
                                    </div>
                                </button>
                            @else
                                <div class="opacity-20">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M19 12H4.75"></path>
                                    </svg>
                                </div>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    @endif
</div>