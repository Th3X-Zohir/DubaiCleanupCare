@extends('layouts.admin.admin')

@section('title', 'User Management - Dubai Cleanup & Maintenance')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">User Management</h1>
            <button id="createUserBtn" class="gradient-btn bg-[#36a3dc] text-white px-6 py-2 rounded-lg hover:shadow-lg">Add New User</button>
        </div>

        <!-- Success/Error Message -->
        <div id="alert" class="hidden p-4 rounded-lg text-sm" role="alert"></div>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTable" class="divide-y divide-gray-200"></tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit User -->
    <div id="userModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 id="modalTitle" class="text-xl font-semibold text-gray-800 mb-4"></h2>
            <form id="userForm">
                @csrf
                <input type="hidden" id="userId">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                </div>
                <div class="mb-4">
                    <label for="number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" id="number" name="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                </div>
                <div class="mb-4">
                    <label for="is_admin" class="block text-sm font-medium text-gray-700">Admin Status</label>
                    <select id="is_admin" name="is_admin" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
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
            <p class="text-gray-600 mb-6">Are you sure you want to delete this user?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDeleteBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button id="confirmDeleteBtn" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg">Confirm</button>
            </div>
        </div>
    </div>

    <!-- JavaScript for CRUD Operations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userModal = document.getElementById('userModal');
            const userForm = document.getElementById('userForm');
            const createUserBtn = document.getElementById('createUserBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const modalTitle = document.getElementById('modalTitle');
            const usersTable = document.getElementById('usersTable');
            const alertBox = document.getElementById('alert');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            let deleteUserId = null;

            // Fetch and display users
            const fetchUsers = async () => {
                try {
                    const response = await fetch('/admin/users/list', {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await response.json();
                    usersTable.innerHTML = '';
                    data.users.forEach(user => {
                        usersTable.innerHTML += `
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${user.name}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${user.email}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${String(user.number).padStart(10, '0')}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${user.is_admin ? 'Admin' : 'User'}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button onclick="editUser(${user.id})" class="text-[#36a3dc] hover:underline mr-4">Edit</button>
                                    <button onclick="showDeleteModal(${user.id})" class="text-red-500 hover:underline">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    showAlert('Error fetching users', 'error');
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

            // Open modal for creating user
            createUserBtn.addEventListener('click', () => {
                modalTitle.textContent = 'Create User';
                userForm.reset();
                document.getElementById('userId').value = '';
                document.getElementById('password').required = true;
                userModal.classList.remove('hidden');
            });

            // Close user modal
            cancelBtn.addEventListener('click', () => {
                userModal.classList.add('hidden');
                userForm.reset();
            });

            // Handle form submission
            userForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const userId = document.getElementById('userId').value;
                const url = userId ? `/admin/users/${userId}` : '/admin/users';
                const formData = new FormData(userForm);
                
                // Add method spoofing for PUT
                if (userId) {
                    formData.append('_method', 'PUT');
                }

                // Debug FormData content
                const formDataEntries = {};
                for (const [key, value] of formData.entries()) {
                    formDataEntries[key] = value;
                }
                console.log('FormData being sent:', formDataEntries);

                try {
                    const response = await fetch(url, {
                        method: 'POST', // Use POST with _method: PUT for updates
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const data = await response.json();
                    if (response.ok) {
                        showAlert(data.message, 'success');
                        userModal.classList.add('hidden');
                        userForm.reset();
                        fetchUsers();
                    } else {
                        console.error('Server response:', data);
                        showAlert(Object.values(data.errors)[0][0] || 'Failed to process request', 'error');
                    }
                } catch (error) {
                    console.error('Form submission error:', error);
                    showAlert('An error occurred', 'error');
                }
            });
            // Edit user
            window.editUser = async (id) => {
                try {
                    const response = await fetch(`/admin/users/${id}/edit`, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const user = await response.json();
                    modalTitle.textContent = 'Edit User';
                    document.getElementById('userId').value = user.id;
                    document.getElementById('name').value = user.name;
                    document.getElementById('email').value = user.email;
                    document.getElementById('number').value = user.number;
                    document.getElementById('is_admin').value = user.is_admin ? '1' : '0';
                    document.getElementById('password').required = false;
                    userModal.classList.remove('hidden');
                } catch (error) {
                    showAlert('Error fetching user', 'error');
                }
            };

            // Show delete confirmation modal
            window.showDeleteModal = (id) => {
                deleteUserId = id;
                deleteModal.classList.remove('hidden');
            };

            // Close delete modal
            cancelDeleteBtn.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
                deleteUserId = null;
            });

            // Confirm delete
            confirmDeleteBtn.addEventListener('click', async () => {
                if (deleteUserId) {
                    try {
                        const response = await fetch(`/admin/users/${deleteUserId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (response.ok) {
                            showAlert(data.message, 'success');
                            fetchUsers();
                        } else {
                            showAlert(data.message, 'error');
                        }
                    } catch (error) {
                        showAlert('An error occurred', 'error');
                    }
                    deleteModal.classList.add('hidden');
                    deleteUserId = null;
                }
            });

            // Fetch users on page load
            fetchUsers();
        });
    </script>
@endsection