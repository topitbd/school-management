@if ($data->hasPages())
    <div class="dark:bg-gray-800 sticky bottom-0 right-0 w-full border-t border-gray-200 p-4 dark:border-gray-700 dark:text-white text-white">
        {{ $data->appends(request()->query())->links() }}
    </div>
@endif
