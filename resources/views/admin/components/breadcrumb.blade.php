@php
    array_unshift($items, ["icon" => "house", "text" => translate("Home"), "url" => route("admin.dashboard.view")]);
@endphp
<nav aria-label="Breadcrumb" class="mb-5 flex">
    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
        {{-- First item (always has an icon) --}}
        <li class="inline-flex items-center">
            <a class="hover:text-primary-600 inline-flex items-center text-gray-700 dark:text-gray-300 dark:hover:text-white" href="{{ $items[0]["url"] }}">
                @if (!empty($items[0]["icon"]))
                    <i class="mr-1" data-lucide="{{ $items[0]["icon"] }}" height="18" width="18"></i>
                @endif
                {{ $items[0]["text"] }}
            </a>
        </li>

        {{-- Middle & last items --}}
        @foreach (array_slice($items, 1) as $index => $item)
            @php $isLast = $index === count($items) - 2; @endphp
            <li>
                @if (!$isLast && !empty($item["url"]))
                    <a class="flex items-center" href="{{ $item["url"] }}">
                        <i class="dark:stroke-white" data-lucide="chevron-right" height="18" width="18"></i>
                        <span class="hover:text-primary-600 inline-flex items-center text-gray-700 dark:text-gray-300 dark:hover:text-white">
                            {{ $item["text"] }}
                        </span>
                    </a>
                @else
                    <div class="flex items-center">
                        <i class="dark:stroke-white" data-lucide="chevron-right" height="18" width="18"></i>
                        <span aria-current="page" class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500">
                            {{ $item["text"] }}
                        </span>
                    </div>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
