@extends('layouts.admin.admin')
@section('title', 'Slider Management - Dubai Cleanup & Maintenance')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 relative">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold text-[#203e78] tracking-tight animate-fade-in">Slider Management</h1>
            <div class="relative">
                <input type="text" id="searchSliders" placeholder="Search sliders..." class="pl-10 pr-4 py-2 rounded-full border border-gray-200 focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent shadow-sm transition-all duration-300 w-64" aria-label="Search sliders">
                <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg mb-8 shadow-md animate-fade-in" role="alert" aria-live="polite">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Add Slider Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-10 glassmorphic transition-transform duration-300 hover:shadow-2xl">
            <h2 class="text-2xl font-semibold text-[#203e78] mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-[#36a3dc]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Slider
            </h2>
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image Upload -->
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="image_path" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-[#36a3dc] transition-colors duration-300 bg-gray-50">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V8m0 0L3 12m4-4l4 4m6 0V8m0 0l-4 4m4-4l4 4" />
                                    </svg>
                                    <p class="text-sm text-gray-500">Click to upload or drag and drop</p>
                                </div>
                                <input id="image_path" type="file" name="image_path" class="hidden" accept="image/*" required>
                            </label>
                        </div>
                        <div id="imagePreview" class="mt-2 hidden">
                            <img src="#" alt="Image Preview" class="w-24 h-24 object-cover rounded-lg shadow-sm">
                        </div>
                    </div>
                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" class="block w-full border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent py-2 px-4 transition-all duration-300" required>
                    </div>
                    <!-- Short Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                        <textarea name="short_description" class="block w-full border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent py-2 px-4 transition-all duration-300 resize-none" rows="4" required></textarea>
                    </div>
                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <input type="number" name="order" class="block w-full border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent py-2 px-4 transition-all duration-300" required>
                    </div>
                </div>
                <button type="submit" class="gradient-btn px-8 py-3 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300">Add Slider</button>
            </form>
        </div>

        <!-- Sliders Table -->
        <div class="bg-white rounded-2xl shadow-xl p-8 glassmorphic">
            <h2 class="text-2xl font-semibold text-[#203e78] mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-[#36a3dc]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Existing Sliders
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white">
                            <th class="p-4 rounded-tl-lg">Image</th>
                            <th class="p-4">Title</th>
                            <th class="p-4">Short Description</th>
                            <th class="p-4">Order</th>
                            <th class="p-4 rounded-tr-lg">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="slidersTable">
                        @foreach ($sliders as $slider)
                            <tr class="border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-4">
                                    <img src="{{ asset('storage/' . $slider->image_path) }}" alt="{{ $slider->title }}" class="w-20 h-20 object-cover rounded-lg shadow-sm">
                                </td>
                                <td class="p-4 font-medium text-gray-800">{{ $slider->title }}</td>
                                <td class="p-4 text-gray-600">{{ Str::limit($slider->short_description, 50) }}</td>
                                <td class="p-4 text-gray-600">{{ $slider->order }}</td>
                                <td class="p-4 flex space-x-2">
                                    <button onclick="openEditModal({{ $slider->id }}, '{{ $slider->title }}', '{{ $slider->short_description }}', {{ $slider->order }}, '{{ asset('storage/' . $slider->image_path) }}')" class="gradient-btn px-4 py-2 text-white rounded-full shadow-sm hover:shadow-md transition-all duration-300" data-tooltip="Edit Slider">
                                        <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-full shadow-sm hover:bg-red-600 hover:shadow-md transition-all duration-300" data-tooltip="Delete Slider" onclick="return confirm('Are you sure you want to delete this slider?')">
                                            <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Slider Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50" aria-hidden="true">
        <div class="bg-white rounded-2xl p-8 max-w-lg w-full glassmorphic animate-fade-in">
            <h2 class="text-2xl font-semibold text-[#203e78] mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-[#36a3dc]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Slider
            </h2>
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="edit_image_path" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-[#36a3dc] transition-colors duration-300 bg-gray-50">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V8m0 0L3 12m4-4l4 4m6 0V8m0 0l-4 4m4-4l4 4" />
                                    </svg>
                                    <p class="text-sm text-gray-500">Click to upload or drag and drop</p>
                                </div>
                                <input id="edit_image_path" type="file" name="image_path" class="hidden" accept="image/*">
                            </label>
                        </div>
                        <div id="editImagePreview" class="mt-2">
                            <img id="currentImage" src="#" alt="Current Image" class="w-24 h-24 object-cover rounded-lg shadow-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="edit_title" class="block w-full border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent py-2 px-4 transition-all duration-300" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                        <textarea name="short_description" id="edit_short_description" class="block w-full border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent py-2 px-4 transition-all duration-300 resize-none" rows="4" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <input type="number" name="order" id="edit_order" class="block w-full border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-[#36a3dc] focus:border-transparent py-2 px-4 transition-all duration-300" required>
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeEditModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-full shadow-sm hover:bg-gray-300 transition-all duration-300">Cancel</button>
                    <button type="submit" class="gradient-btn px-6 py-2 text-white rounded-full shadow-sm hover:shadow-md transition-all duration-300">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Image Preview for Add Slider
        const imageInput = document.getElementById('image_path');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = imagePreview.querySelector('img');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        // Image Preview for Edit Slider
        const editImageInput = document.getElementById('edit_image_path');
        const editImagePreview = document.getElementById('editImagePreview');
        const editPreviewImg = editImagePreview.querySelector('img');

        editImageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    editPreviewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Edit Modal Functionality
        function openEditModal(id, title, short_description, order, image_path) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');
            form.action = `/admin/sliders/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_short_description').value = short_description;
            document.getElementById('edit_order').value = order;
            document.getElementById('currentImage').src = image_path;
            modal.classList.remove('hidden');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden');
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('overflow-hidden');
            document.getElementById('editForm').reset();
            editPreviewImg.src = '#';
        }

        // Search Functionality
        document.getElementById('searchSliders').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#slidersTable tr');
            rows.forEach(row => {
                const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const description = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Keyboard Accessibility for Modal
        document.getElementById('editModal').addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditModal();
            }
        });

        // Drag and Drop for Add Slider
        const dropArea = document.querySelector('label[for="image_path"]');
        const input = document.getElementById('image_path');

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('border-[#36a3dc]');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-[#36a3dc]');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('border-[#36a3dc]');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                input.files = e.dataTransfer.files;
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        // Drag and Drop for Edit Slider
        const editDropArea = document.querySelector('label[for="edit_image_path"]');
        const editInput = document.getElementById('edit_image_path');

        editDropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            editDropArea.classList.add('border-[#36a3dc]');
        });

        editDropArea.addEventListener('dragleave', () => {
            editDropArea.classList.remove('border-[#36a3dc]');
        });

        editDropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            editDropArea.classList.remove('border-[#36a3dc]');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                editInput.files = e.dataTransfer.files;
                const reader = new FileReader();
                reader.onload = function(e) {
                    editPreviewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection