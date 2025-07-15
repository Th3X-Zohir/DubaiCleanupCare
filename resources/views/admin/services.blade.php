@extends('layouts.admin.admin')

@section('title', 'Service Management - Dubai Cleanup & Maintenance')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Service Management</h1>
            <button id="createServiceBtn" class="gradient-btn bg-[#36a3dc] text-white px-6 py-2 rounded-lg hover:shadow-lg">Add New Service</button>
        </div>

        <!-- Success/Error Message -->
        <div id="alert" class="hidden p-4 rounded-lg text-sm" role="alert"></div>

        <!-- Services Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="servicesTable" class="divide-y divide-gray-200"></tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit Service -->
    <div id="serviceModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 id="modalTitle" class="text-xl font-semibold text-gray-800 mb-4"></h2>
            <form id="serviceForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="serviceId">
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Service Type</label>
                    <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required>
                        <option value="Cleaning">Cleaning</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="previewImg" class="h-20 w-20 object-cover rounded" alt="Image Preview">
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                    <button type="submit" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Custom Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-sm">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this service?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDeleteBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button id="confirmDeleteBtn" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg">Confirm</button>
            </div>
        </div>
    </div>

    <!-- JavaScript for CRUD Operations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const serviceModal = document.getElementById('serviceModal');
            const serviceForm = document.getElementById('serviceForm');
            const createServiceBtn = document.getElementById('createServiceBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const modalTitle = document.getElementById('modalTitle');
            const servicesTable = document.getElementById('servicesTable');
            const alertBox = document.getElementById('alert');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            let deleteServiceId = null;

            // Fetch and display services
            const fetchServices = async () => {
                try {
                    const response = await fetch('/admin/services/list', {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await response.json();
                    servicesTable.innerHTML = '';
                    data.services.forEach(service => {
                        servicesTable.innerHTML += `
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${service.type}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${service.title}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">${service.description.substring(0, 50)}${service.description.length > 50 ? '...' : ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${service.image ? `<img src="/storage/${service.image}" class="h-10 w-10 object-cover rounded" alt="Service Image">` : 'None'}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button onclick="editService(${service.id})" class="text-[#36a3dc] hover:underline mr-4">Edit</button>
                                    <button onclick="showDeleteModal(${service.id})" class="text-red-500 hover:underline">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    showAlert('Error fetching services', 'error');
                }
            };

            // Show alert message
            const showAlert = (message, type) => {
                alertBox.classList.remove('hidden', 'bg-green-100', 'text-green-700', 'bg-red-100', 'text-red-700');
                alertBox.classList.add(type === 'success' ? 'bg-green-100' : 'bg-red-100');
                alertBox.classList.add(type === 'success' ? 'text-green-700' : 'text-red-700');
                alertBox.textContent = message;
                setTimeout(() => alertBox.classList.add('hidden'), 5000);
            };

            // Preview image on file selection
            imageInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        previewImg.src = event.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.classList.add('hidden');
                }
            });

            // Open modal for creating service
            createServiceBtn.addEventListener('click', () => {
                modalTitle.textContent = 'Create Service';
                serviceForm.reset();
                document.getElementById('serviceId').value = '';
                document.getElementById('type').required = true;
                document.getElementById('title').required = true;
                document.getElementById('description').required = true;
                imagePreview.classList.add('hidden');
                serviceModal.classList.remove('hidden');
            });

            // Close modal
            cancelBtn.addEventListener('click', () => {
                serviceModal.classList.add('hidden');
                serviceForm.reset();
                imagePreview.classList.add('hidden');
            });

            // Handle form submission
            serviceForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const serviceId = document.getElementById('serviceId').value;
                const url = serviceId ? `/admin/services/${serviceId}` : '/admin/services';
                const formData = new FormData(serviceForm);
                if (serviceId) {
                    formData.append('_method', 'PUT');
                }

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const data = await response.json();
                    if (response.ok) {
                        showAlert(data.message, 'success');
                        serviceModal.classList.add('hidden');
                        serviceForm.reset();
                        imagePreview.classList.add('hidden');
                        fetchServices();
                    } else {
                        showAlert(Object.values(data.errors)[0][0] || 'Failed to process request', 'error');
                    }
                } catch (error) {
                    showAlert('An error occurred', 'error');
                }
            });

            // Edit service
            window.editService = async (id) => {
                try {
                    const response = await fetch(`/admin/services/${id}/edit`, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const service = await response.json();
                    modalTitle.textContent = 'Edit Service';
                    document.getElementById('serviceId').value = service.id;
                    document.getElementById('type').value = service.type;
                    document.getElementById('title').value = service.title;
                    document.getElementById('description').value = service.description;
                    document.getElementById('image').value = '';
                    if (service.image) {
                        previewImg.src = `/storage/${service.image}`;
                        imagePreview.classList.remove('hidden');
                    } else {
                        imagePreview.classList.add('hidden');
                    }
                    document.getElementById('type').required = false;
                    document.getElementById('title').required = false;
                    document.getElementById('description').required = false;
                    serviceModal.classList.remove('hidden');
                } catch (error) {
                    showAlert('Error fetching service', 'error');
                }
            };

            // Show delete confirmation modal
            window.showDeleteModal = (id) => {
                deleteServiceId = id;
                deleteModal.classList.remove('hidden');
            };

            // Close delete modal
            cancelDeleteBtn.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
                deleteServiceId = null;
            });

            // Confirm delete
            confirmDeleteBtn.addEventListener('click', async () => {
                if (deleteServiceId) {
                    try {
                        const response = await fetch(`/admin/services/${deleteServiceId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (response.ok) {
                            showAlert(data.message, 'success');
                            fetchServices();
                        } else {
                            showAlert(data.message || 'Failed to delete service', 'error');
                        }
                    } catch (error) {
                        showAlert('An error occurred', 'error');
                    }
                    deleteModal.classList.add('hidden');
                    deleteServiceId = null;
                }
            });

            // Fetch services on page load
            fetchServices();
        });
    </script>
@endsection