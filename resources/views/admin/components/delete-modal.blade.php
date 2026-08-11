<div class="h-modal fixed left-0 right-0 top-4 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0" id="deleteModal">
    <div class="relative h-full w-full max-w-md px-4 md:h-auto">
        <!-- Modal content -->
        <form action="{{ $route }}" method="POST">
            @csrf
            <input id="deleteId" name="id" type="hidden">
            <input id="deleteIds" name="ids" type="hidden">
            <div class="relative rounded-sm bg-white shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button class="ml-auto inline-flex items-center rounded-sm bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white" data-modal-hide="deleteModal"
                        type="button">
                        <i data-lucide="x"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <div class="text-center">
                        <i width="70" height="70" class="text-red-500 inline-block" data-lucide="circle-alert"></i>
                    </div>

                    <h3 class="mb-6 mt-5 text-lg text-gray-500 dark:text-gray-400">{{ $text }}</h3>
                    <button class="btn btn-danger" type="submit">
                        {{ translate("Yes, I'm sure") }}
                    </button>
                    <a class="btn btn-outline" data-modal-hide="deleteModal" href="#">
                        {{ translate('No, cancel') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
