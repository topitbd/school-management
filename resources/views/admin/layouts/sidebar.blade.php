@php
    $sidebarItems = sidebarList();

    $itemHasChildren = function ($item) {
        if (! is_array($item)) {
            return false;
        }
        foreach ($item as $value) {
            if (is_array($value) && isset($value['route'])) {
                return true;
            }
        }

        return false;
    };

    $itemHasActiveChild = function ($item) {
        if (! is_array($item)) {
            return false;
        }
        foreach ($item as $value) {
            if (is_array($value) && isset($value['route']) && request()->routeIs($value['route'])) {
                return true;
            }
        }

        return false;
    };
@endphp

<aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1 dark:bg-gray-800">
                <ul class="space-y-2 pb-2">
                    @foreach ($sidebarItems as $label => $item)
                        @if ($item === null)
                            <li class="my-2">
                                <hr class="border-gray-200 dark:border-gray-700">
                            </li>
                        @elseif ($itemHasChildren($item))
                            @php $menuId = 'menu-' . Str::slug($label); @endphp
                            <li>
                                <button type="button"
                                    data-sidebar-toggle="{{ $menuId }}"
                                    class="w-full text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $itemHasActiveChild($item) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                    <i data-lucide="{{ $item['icon'] ?? 'circle' }}" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:group-hover:text-gray-200 transition duration-75"></i>
                                    <span class="ml-3 flex-1 text-left whitespace-nowrap">{{ $label }}</span>
                                    <i data-lucide="chevron-down" data-sidebar-chevron class="w-4 h-4 text-gray-500 transition-transform duration-200 {{ $itemHasActiveChild($item) ? 'rotate-180' : '' }}"></i>
                                </button>
                                <ul id="{{ $menuId }}" class="space-y-1 mt-1 pl-4 {{ $itemHasActiveChild($item) ? '' : 'hidden' }}">
                                    @foreach ($item as $subLabel => $subItem)
                                        @if (is_array($subItem) && isset($subItem['route']) && Route::has($subItem['route']) && ($subItem['permission'] ?? true))
                                            <li>
                                                <a href="{{ route($subItem['route']) }}" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs($subItem['route']) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                                    <i data-lucide="{{ $subItem['icon'] ?? 'circle' }}" class="w-5 h-5 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:group-hover:text-gray-200 transition duration-75"></i>
                                                    <span class="ml-3 flex-1 whitespace-nowrap">{{ $subLabel }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @elseif (isset($item['route']) && Route::has($item['route']) && ($item['permission'] ?? true))
                            <li>
                                <a href="{{ route($item['route']) }}" class="text-base text-gray-900 dark:text-gray-200 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs($item['route']) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                    <i data-lucide="{{ $item['icon'] ?? 'circle' }}" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 dark:group-hover:text-gray-200 transition duration-75"></i>
                                    <span class="ml-3 flex-1 whitespace-nowrap">{{ $label }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>

<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
