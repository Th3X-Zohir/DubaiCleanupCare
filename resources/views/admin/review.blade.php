@extends('layouts.admin.admin')

@section('title', 'Review Management - Dubai Cleanup & Maintenance')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Review Management</h1>
            <button id="createReviewBtn" class="gradient-btn bg-[#36a3dc] text-white px-6 py-2 rounded-lg hover:shadow-lg">Add New Review</button>
        </div>

        <!-- Success/Error Message -->
        <div id="alert" class="hidden p-4 rounded-lg text-sm" role="alert"></div>

        <!-- Reviews Table -->
        <div class="overflow-x-auto max-w-4xl mx-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comment</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="reviewsTable" class="divide-y divide-gray-200">
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->service->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->rating }} ★</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ Str::limit($review->comment, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <button onclick="toggleStatus({{ $review->id }})" class="status-btn px-2 py-1 rounded text-white text-sm {{ $review->status ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}">
                                    {{ $review->status ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button onclick="editReview({{ $review->id }})" class="text-[#36a3dc] hover:underline mr-4">Edit</button>
                                <button onclick="showDeleteModal({{ $review->id }})" class="text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit Review -->
    <div id="reviewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 id="modalTitle" class="text-xl font-semibold text-gray-800 mb-4"></h2>
            <form id="reviewForm">
                @csrf
                <input type="hidden" id="reviewId">
                <div class="mb-4">
                    <label for="service_id" class="block text-sm font-medium text-gray-700">Service</label>
                    <select id="service_id" name="service_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                    <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea id="comment" name="comment" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
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
            <p class="text-gray-600 mb-6">Are you sure you want to delete this review?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDeleteBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button id="confirmDeleteBtn" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg">Confirm</button>
            </div>
        </div>
    </div>

    <!-- JavaScript for CRUD Operations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const reviewModal = document.getElementById('reviewModal');
            const reviewForm = document.getElementById('reviewForm');
            const createReviewBtn = document.getElementById('createReviewBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const modalTitle = document.getElementById('modalTitle');
            const reviewsTable = document.getElementById('reviewsTable');
            const alertBox = document.getElementById('alert');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            let deleteReviewId = null;

            // Show alert message
            const showAlert = (message, type) => {
                alertBox.classList.remove('hidden', 'bg-green-100', 'text-green-700', 'bg-red-100', 'text-red-700');
                alertBox.classList.add(type === 'success' ? 'bg-green-100' : 'bg-red-100');
                alertBox.classList.add(type === 'success' ? 'text-green-700' : 'text-red-700');
                alertBox.textContent = message;
                setTimeout(() => alertBox.classList.add('hidden'), 5000);
            };

            // Open modal for creating review
            createReviewBtn.addEventListener('click', () => {
                modalTitle.textContent = 'Create Review';
                reviewForm.reset();
                document.getElementById('reviewId').value = '';
                document.getElementById('status').value = '0';
                reviewModal.classList.remove('hidden');
            });

            // Close review modal
            cancelBtn.addEventListener('click', () => {
                reviewModal.classList.add('hidden');
                reviewForm.reset();
            });

            // Handle form submission
            reviewForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const reviewId = document.getElementById('reviewId').value;
                const url = reviewId ? `/admin/reviews/${reviewId}` : '/admin/reviews';
                const formData = new FormData(reviewForm);

                if (reviewId) {
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
                    if (data.status === 'success') {
                        showAlert(data.message, 'success');
                        reviewModal.classList.add('hidden');
                        reviewForm.reset();
                        window.location.reload();
                    } else {
                        showAlert(data.message || 'An error occurred', 'error');
                    }
                } catch (error) {
                    showAlert('An error occurred', 'error');
                }
            });

            // Edit review
            window.editReview = async (id) => {
                try {
                    const response = await fetch(`/admin/reviews/${id}/edit`, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const review = await response.json();
                    modalTitle.textContent = 'Edit Review';
                    document.getElementById('reviewId').value = review.id;
                    document.getElementById('service_id').value = review.service_id;
                    document.getElementById('user_id').value = review.user_id;
                    document.getElementById('rating').value = review.rating;
                    document.getElementById('comment').value = review.comment;
                    document.getElementById('status').value = review.status ? '1' : '0';
                    reviewModal.classList.remove('hidden');
                } catch (error) {
                    showAlert('Error fetching review', 'error');
                }
            };

            // Toggle status
            window.toggleStatus = async (id) => {
                try {
                    const response = await fetch(`/admin/reviews/${id}/toggle-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                        },
                    });

                    const data = await response.json();
                    if (data.status === 'success') {
                        showAlert(data.message, 'success');
                        const btn = document.querySelector(`button[onclick="toggleStatus(${id})"]`);
                        btn.textContent = data.new_status ? 'Active' : 'Inactive';
                        btn.classList.remove('bg-green-500', 'bg-red-500', 'hover:bg-green-600', 'hover:bg-red-600');
                        btn.classList.add(data.new_status ? 'bg-green-500' : 'bg-red-500');
                        btn.classList.add(data.new_status ? 'hover:bg-green-600' : 'hover:bg-red-600');
                    } else {
                        showAlert(data.message || 'An error occurred', 'error');
                    }
                } catch (error) {
                    showAlert('An error occurred', 'error');
                }
            };

            // Show delete confirmation modal
            window.showDeleteModal = (id) => {
                deleteReviewId = id;
                deleteModal.classList.remove('hidden');
            };

            // Close delete modal
            cancelDeleteBtn.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
                deleteReviewId = null;
            });

            // Confirm delete
            confirmDeleteBtn.addEventListener('click', async () => {
                if (deleteReviewId) {
                    try {
                        const response = await fetch(`/admin/reviews/${deleteReviewId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (data.status === 'success') {
                            showAlert(data.message, 'success');
                            window.location.reload();
                        } else {
                            showAlert(data.message || 'An error occurred', 'error');
                        }
                    } catch (error) {
                        showAlert('An error occurred', 'error');
                    }
                    deleteModal.classList.add('hidden');
                    deleteReviewId = null;
                }
            });
        });
    </script>
@endsection