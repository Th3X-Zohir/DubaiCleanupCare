@extends('layouts.admin.admin')

@section('title', 'Booking Management - Dubai Cleanup & Maintenance')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Booking Management</h1>
            <button id="createBookingBtn" class="gradient-btn bg-[#36a3dc] text-white px-6 py-2 rounded-lg hover:shadow-lg">Add New Booking</button>
        </div>

        <!-- Success/Error Message -->
        <div id="alert" class="hidden p-4 rounded-lg text-sm" role="alert"></div>

        <!-- Bookings Table -->
        <div class="overflow-x-auto max-w-4xl mx-auto">
            <table class="w-full max-w-full bg-white border border-gray-200 rounded-lg table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="bookingsTable" class="divide-y divide-gray-200"></tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit Booking -->
    <div id="bookingModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 id="modalTitle" class="text-xl font-semibold text-gray-800 mb-4"></h2>
            <form id="bookingForm">
                @csrf
                <input type="hidden" id="bookingId">
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
                    <label for="service_id" class="block text-sm font-medium text-gray-700">Service</label>
                    <select id="service_id" name="service_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                        <option value="" disabled selected>Select a service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                </div>
                <div class="mb-4">
                    <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                    <input type="time" id="time" name="time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]">
                </div>
                <div class="mb-4">
                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                    <textarea id="notes" name="notes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" rows="4"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                    <button type="submit" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-sm">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this booking?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDeleteBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button id="confirmDeleteBtn" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg">Confirm</button>
            </div>
        </div>
    </div>

    <!-- JavaScript for CRUD Operations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bookingModal = document.getElementById('bookingModal');
            const bookingForm = document.getElementById('bookingForm');
            const createBookingBtn = document.getElementById('createBookingBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const modalTitle = document.getElementById('modalTitle');
            const bookingsTable = document.getElementById('bookingsTable');
            const alertBox = document.getElementById('alert');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            let deleteBookingId = null;

            // Fetch and display bookings
            const fetchBookings = async () => {
                try {
                    const response = await fetch('/admin/bookings/list', {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await response.json();
                    bookingsTable.innerHTML = '';
                    data.bookings.forEach(booking => {
                        bookingsTable.innerHTML += `
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${booking.name}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${booking.email}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${booking.number}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${booking.service.title}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${booking.date}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${booking.time}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button onclick="editBooking(${booking.id})" class="text-[#36a3dc] hover:underline mr-4">Edit</button>
                                    <button onclick="showDeleteModal(${booking.id})" class="text-red-500 hover:underline">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    showAlert('Error fetching bookings', 'error');
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

            // Open modal for creating booking
            createBookingBtn.addEventListener('click', () => {
                modalTitle.textContent = 'Create Booking';
                bookingForm.reset();
                document.getElementById('bookingId').value = '';
                bookingModal.classList.remove('hidden');
            });

            // Close booking modal
            cancelBtn.addEventListener('click', () => {
                bookingModal.classList.add('hidden');
                bookingForm.reset();
            });

            // Handle form submission
            bookingForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const bookingId = document.getElementById('bookingId').value;
                const url = bookingId ? `/admin/bookings/${bookingId}` : '/admin/bookings';
                const formData = new FormData(bookingForm);
                if (bookingId) {
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
                        bookingModal.classList.add('hidden');
                        bookingForm.reset();
                        fetchBookings();
                    } else {
                        showAlert(Object.values(data.errors)[0][0] || 'Failed to process request', 'error');
                    }
                } catch (error) {
                    showAlert('An error occurred', 'error');
                }
            });

            // Edit booking
            window.editBooking = async (id) => {
                try {
                    const response = await fetch(`/admin/bookings/${id}/edit`, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const booking = await response.json();
                    modalTitle.textContent = 'Edit Booking';
                    document.getElementById('bookingId').value = booking.id;
                    document.getElementById('name').value = booking.name;
                    document.getElementById('email').value = booking.email;
                    document.getElementById('number').value = booking.number;
                    document.getElementById('service_id').value = booking.service_id;
                    document.getElementById('date').value = booking.date;
                    document.getElementById('time').value = booking.time;
                    document.getElementById('notes').value = booking.notes || '';
                    bookingModal.classList.remove('hidden');
                } catch (error) {
                    showAlert('Error fetching booking', 'error');
                }
            };

            // Show delete confirmation modal
            window.showDeleteModal = (id) => {
                deleteBookingId = id;
                deleteModal.classList.remove('hidden');
            };

            // Close delete modal
            cancelDeleteBtn.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
                deleteBookingId = null;
            });

            // Confirm delete
            confirmDeleteBtn.addEventListener('click', async () => {
                if (deleteBookingId) {
                    try {
                        const response = await fetch(`/admin/bookings/${deleteBookingId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (response.ok) {
                            showAlert(data.message, 'success');
                            fetchBookings();
                        } else {
                            showAlert(data.message, 'error');
                        }
                    } catch (error) {
                        showAlert('An error occurred', 'error');
                    }
                    deleteModal.classList.add('hidden');
                    deleteBookingId = null;
                }
            });

            // Fetch bookings on page load
            fetchBookings();
        });
    </script>
@endsection