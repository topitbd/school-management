@extends("admin.layouts.main")
@section("content")
    <div class="px-4 pt-6">
        <div class="mb-4">

            <div class="flex items-center justify-between">
                <!---------------- Breadcrumb ------------------->
                @include("admin.components.breadcrumb", [
                    "items" => [["text" => translate("Categories"), "url" => route("admin.categories.view")], ["text" => translate("Edit Category")]],
                ])

                <div>
                    <a class="btn btn-primary" href="{{ route("admin.categories.createPage", $category->parent_id) }}">
                        <i class="mr-1" data-lucide="plus" height="16" width="16"></i>
                        {{ translate("Create Category") }}
                    </a>
                </div>
            </div>
            <!----------------- Page title ----------------->
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ translate("Edit Category") }}</h1>
        </div>
        <form action="{{ route("admin.categories.update") }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input name="id" type="hidden" value="{{ $category->id }}">
            <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                <!-- Inpur fields -->
                <div class="rounded-sm border border-gray-200 bg-white p-4 shadow-sm sm:p-6 2xl:col-span-2 dark:border-gray-700 dark:bg-gray-800">
                    <div class="space-y-4">
                        <div class="form-group">
                            <label class="form-label" for="categoryName">{{ translate("Category Name") }}</label>
                            <input class="form-control" id="categoryName" name="name" required type="text" value="{{ old("name", $category->name) }}">
                        </div>
                        @if ($category->parent_id)
                            <div class="form-group">
                                <label class="form-label" for="parentCategory">{{ translate("Parent Category") }}</label>
                                <select class="form-control" id="parentCategory" name="parent_id">
                                    <option value="">{{ translate("Select Parent Category") }}</option>
                                    @foreach ($categories as $cat)
                                        <option @selected($category->parent_id === $cat->id) value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="form-label" for="categoryDescription">{{ translate("Description") }}</label>
                            <textarea class="form-control" id="categoryDescription" name="description" rows="5">{{ old("description", $category->description) }}</textarea>
                        </div>

                    </div>
                </div>
                <!-- Image fields -->
                <div class="rounded-sm border border-gray-200 bg-white p-4 shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800">
                    <div class="space-y-4">
                        <div class="form-group">
                            <label class="form-label" for="categoryBanner">{{ translate("Category Image") }}</label>
                            <input class="form-control imageInput" data-target="categoryBannerPreview" id="categoryBanner" name="image" type="file">

                            <div class="w-75 mt-3 rounded-sm border border-gray-200 p-2">
                                <img class="img-thumbnail img-preview" id="categoryBannerPreview" src="{{ isset($category->images["webp"]) ? $category->images["webp"] : asset("assets/placeholder/800x800.png") }}">
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">
                            {{ translate("Update") }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
