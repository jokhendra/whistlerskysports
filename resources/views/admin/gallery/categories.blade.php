@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Gallery Categories
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('admin.gallery.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Gallery
                </a>
                <button type="button" 
                        onclick="document.getElementById('new-category-modal').classList.remove('hidden')"
                        class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Category
                </button>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if($categories->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No categories</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new category.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Images
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $category->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($category->description, 100) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $category->images_count }} {{ Str::plural('image', $category->images_count) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button type="button"
                                                onclick="editCategory({{ $category->id }}, '{{ $category->name }}', '{{ $category->description }}')"
                                                class="text-blue-600 hover:text-blue-900 mr-3">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.gallery.categories.destroy', $category) }}" 
                                              method="POST" 
                                              class="inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this category? Images in this category will be uncategorized.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- New Category Modal -->
<div id="new-category-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <form action="{{ route('admin.gallery.categories.store') }}" method="POST">
                @csrf
                <div class="px-6 py-4">
                    <h3 class="text-lg font-medium text-gray-900">New Category</h3>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                   required>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      rows="3"
                                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                    <button type="button"
                            onclick="document.getElementById('new-category-modal').classList.add('hidden')"
                            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="edit-category-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <form id="edit-category-form" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="px-6 py-4">
                    <h3 class="text-lg font-medium text-gray-900">Edit Category</h3>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label for="edit-name" class="block text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="edit-name"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                   required>
                        </div>
                        <div>
                            <label for="edit-description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <textarea name="description" 
                                      id="edit-description"
                                      rows="3"
                                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                    <button type="button"
                            onclick="document.getElementById('edit-category-modal').classList.add('hidden')"
                            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function editCategory(id, name, description) {
    const form = document.getElementById('edit-category-form');
    const nameInput = document.getElementById('edit-name');
    const descriptionInput = document.getElementById('edit-description');
    
    // set form action to the admin categories update route for the selected id
    const adminPath = '{{ env("ADMIN_PATH", "dashboard-93jf8K2o") }}';
    form.action = `/${adminPath}/gallery/categories/${id}`;
    nameInput.value = name;
    descriptionInput.value = description;
    document.getElementById('edit-category-modal').classList.remove('hidden');
}
</script>
@endpush
@endsection 