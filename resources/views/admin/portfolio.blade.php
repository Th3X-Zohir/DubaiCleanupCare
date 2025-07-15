@extends('layouts.admin.admin')

@section('title', 'Portfolio Management - Dubai Cleanup & Maintenance')

@section('content')
    <div class="space-y-6 p-4 sm:p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Portfolio Management</h1>
            <button id="createPortfolioBtn" class="gradient-btn bg-[#36a3dc] text-white px-6 py-2 rounded-lg hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" aria-label="Add New Portfolio">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Portfolio
            </button>
        </div>

        <!-- Success/Error Message -->
        <div id="alert" class="hidden p-4 rounded-lg text-sm flex items-center gap-2 transition-all duration-300" role="alert"></div>

        <!-- Portfolios Table -->
        <div class="overflow-x-auto max-w-5xl mx-auto bg-white rounded-lg shadow-md">
            <table class="w-full max-w-full border border-gray-200 rounded-lg table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photos</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="portfoliosTable" class="divide-y divide-gray-200"></tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit Portfolio -->
    <div id="portfolioModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden" role="dialog" aria-labelledby="modalTitle">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg transform transition-all duration-300">
            <h2 id="modalTitle" class="text-xl font-semibold text-gray-800 mb-4"></h2>
            <form id="portfolioForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="portfolioId">
                <div class="mb-4">
                    <label for="service_id" class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                        Service
                        <span class="text-gray-400 text-xs" title="Select the service associated with this portfolio">ℹ</span>
                    </label>
                    <select id="service_id" name="service_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#36a3dc] focus:border-[#36a3dc]" required aria-required="true">
                        <option value="" disabled selected>Select a service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="photos" class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                        Photos (Drag & Drop or Click)
                        <span class="text-gray-400 text-xs" title="Upload multiple images (JPEG, PNG, JPG, GIF, max 2MB each)">ℹ</span>
                    </label>
                    <div id="dropZone" class="mt-1 border-2 border-dashed border-gray-300 rounded-lg p-4 text-center bg-gray-50 hover:bg-gray-100 transition-colors duration-200" role="button" aria-label="Drag and drop images here or click to upload">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <p class="text-sm text-gray-600">Drag & drop images here or click to upload</p>
                        <input type="file" id="photos" name="photos[]" multiple accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden">
                    </div>
                    <div id="photoPreview" class="mt-2 flex flex-wrap gap-2 sortable"></div>
                </div>
                <div id="uploadProgress" class="hidden mb-4">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div id="progressBar" class="bg-[#36a3dc] h-2.5 rounded-full" style="width: 0%"></div>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Uploading...</p>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-200" aria-label="Cancel">Cancel</button>
                    <button type="submit" id="saveBtn" class="gradient-btn bg-[#36a3dc] text-white px-4 py-2 rounded-lg hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300 flex items-center gap-2" aria-label="Save Portfolio">
                        <svg class="w-5 h-5 hidden" id="spinner" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden" role="dialog" aria-labelledby="deleteModalTitle">
        <div class="bg-white rounded-lg p-6 w-full max-w-sm transform transition-all duration-300">
            <h2 id="deleteModalTitle" class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this portfolio? This action cannot be undone.</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDeleteBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-200" aria-label="Cancel">Cancel</button>
                <button id="confirmDeleteBtn" class="gradient-btn bg-red-500 text-white px-4 py-2 rounded-lg hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-300" aria-label="Confirm Deletion">Confirm</button>
            </div>
        </div>
    </div>

    <!-- JavaScript for Enhanced UI/UX -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const portfolioModal = document.getElementById('portfolioModal');
            const portfolioForm = document.getElementById('portfolioForm');
            const createPortfolioBtn = document.getElementById('createPortfolioBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const saveBtn = document.getElementById('saveBtn');
            const modalTitle = document.getElementById('modalTitle');
            const portfoliosTable = document.getElementById('portfoliosTable');
            const alertBox = document.getElementById('alert');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            const photoPreview = document.getElementById('photoPreview');
            const dropZone = document.getElementById('dropZone');
            const photosInput = document.getElementById('photos');
            const spinner = document.getElementById('spinner');
            const uploadProgress = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');
            let deletePortfolioId = null;

            // Show alert message with icon
            const showAlert = (message, type) => {
                alertBox.classList.remove('hidden', 'bg-green-100', 'text-green-700', 'bg-red-100', 'text-red-700');
                alertBox.classList.add(type === 'success' ? 'bg-green-100' : 'bg-red-100', type === 'success' ? 'text-green-700' : 'text-red-700');
                alertBox.innerHTML = `
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path ${type === 'success' ? 'd="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"' : 'd="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"'} clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                    ${message}
                `;
                setTimeout(() => alertBox.classList.add('hidden'), 5000);
            };

            // Fetch and display portfolios
            const fetchPortfolios = async () => {
                try {
                    const response = await fetch('/admin/portfolios/list', {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await response.json();
                    portfoliosTable.innerHTML = '';
                    data.portfolios.forEach(portfolio => {
                        const photosHtml = portfolio.photos && portfolio.photos.length > 0 
                            ? portfolio.photos.slice(0, 2).map(photo => `<img src="/storage/${photo}" class="w-12 h-12 object-cover rounded" alt="Portfolio photo" title="${portfolio.service.title}">`).join(' ') 
                            + (portfolio.photos.length > 2 ? `<span class="text-gray-500 text-sm ml-2">+${portfolio.photos.length - 2} more</span>` : '')
                            : 'No photos';
                        portfoliosTable.innerHTML += `
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">${portfolio.service.title}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 relative group">
                                    <div class="flex gap-2">${photosHtml}</div>
                                    ${portfolio.photos && portfolio.photos.length > 2 ? `
                                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg p-2 z-10 mt-2">
                                            ${portfolio.photos.map(photo => `<img src="/storage/${photo}" class="w-16 h-16 object-cover rounded m-1" alt="Portfolio photo">`).join('')}
                                        </div>
                                    ` : ''}
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm flex gap-2">
                                    <button onclick="editPortfolio(${portfolio.id})" class="text-[#36a3dc] hover:underline focus:outline-none focus:ring-2 focus:ring-[#36a3dc] rounded p-1" title="Edit Portfolio">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick="showDeleteModal(${portfolio.id})" class="text-red-500 hover:underline focus:outline-none focus:ring-2 focus:ring-red-500 rounded p-1" title="Delete Portfolio">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    showAlert('Error fetching portfolios', 'error');
                }
            };

            // Open modal for creating portfolio
            createPortfolioBtn.addEventListener('click', () => {
                modalTitle.textContent = 'Create Portfolio';
                portfolioForm.reset();
                document.getElementById('portfolioId').value = '';
                photoPreview.innerHTML = '';
                portfolioModal.classList.remove('hidden');
                document.getElementById('service_id').focus();
            });

            // Close portfolio modal
            cancelBtn.addEventListener('click', () => {
                portfolioModal.classList.add('hidden');
                portfolioForm.reset();
                photoPreview.innerHTML = '';
            });

            // Drag-and-drop and click upload
            dropZone.addEventListener('click', () => photosInput.click());
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('border-[#36a3dc]', 'bg-gray-200');
            });
            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('border-[#36a3dc]', 'bg-gray-200');
            });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-[#36a3dc]', 'bg-gray-200');
                const files = e.dataTransfer.files;
                if (files.length) {
                    photosInput.files = files;
                    updatePhotoPreview(files);
                }
            });
            photosInput.addEventListener('change', () => updatePhotoPreview(photosInput.files));

            // Update photo preview with remove and reorder
            const updatePhotoPreview = (files) => {
                photoPreview.innerHTML = '';
                Array.from(files).forEach((file, index) => {
                    const div = document.createElement('div');
                    div.className = 'relative w-16 h-16';
                    div.innerHTML = `
                        <img src="${URL.createObjectURL(file)}" class="w-16 h-16 object-cover rounded cursor-move" alt="Preview">
                        <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 transition-all duration-200" title="Remove image" data-index="${index}">×</button>
                    `;
                    photoPreview.appendChild(div);
                    div.querySelector('button').addEventListener('click', () => {
                        const newFiles = Array.from(photosInput.files).filter((_, i) => i !== index);
                        const dataTransfer = new DataTransfer();
                        newFiles.forEach(f => dataTransfer.items.add(f));
                        photosInput.files = dataTransfer.files;
                        updatePhotoPreview(newFiles);
                    });
                });

                // Initialize SortableJS for reordering
                new Sortable(photoPreview, {
                    animation: 150,
                    onEnd: () => {
                        const newFiles = Array.from(photoPreview.children).map(div => {
                            const src = div.querySelector('img').src;
                            return Array.from(photosInput.files).find(f => URL.createObjectURL(f) === src);
                        });
                        const dataTransfer = new DataTransfer();
                        newFiles.forEach(f => dataTransfer.items.add(f));
                        photosInput.files = dataTransfer.files;
                    }
                });
            };

            // Handle form submission with progress
            portfolioForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                saveBtn.disabled = true;
                spinner.classList.remove('hidden');
                uploadProgress.classList.remove('hidden');
                progressBar.style.width = '10%';

                const portfolioId = document.getElementById('portfolioId').value;
                const url = portfolioId ? `/admin/portfolios/${portfolioId}` : '/admin/portfolios';
                const formData = new FormData(portfolioForm);
                if (portfolioId) {
                    formData.append('_method', 'PUT');
                }

                try {
                    // Simulate progress for UX
                    let progress = 10;
                    const progressInterval = setInterval(() => {
                        progress = Math.min(progress + 10, 90);
                        progressBar.style.width = `${progress}%`;
                    }, 500);

                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    clearInterval(progressInterval);
                    progressBar.style.width = '100%';
                    setTimeout(() => {
                        uploadProgress.classList.add('hidden');
                        progressBar.style.width = '0%';
                        saveBtn.disabled = false;
                        spinner.classList.add('hidden');
                    }, 500);

                    const data = await response.json();
                    if (response.ok) {
                        showAlert(data.message, 'success');
                        portfolioModal.classList.add('hidden');
                        portfolioForm.reset();
                        photoPreview.innerHTML = '';
                        fetchPortfolios();
                    } else {
                        showAlert(Object.values(data.errors)[0][0] || 'Failed to process request', 'error');
                    }
                } catch (error) {
                    uploadProgress.classList.add('hidden');
                    progressBar.style.width = '0%';
                    saveBtn.disabled = false;
                    spinner.classList.add('hidden');
                    showAlert('An error occurred', 'error');
                }
            });

            // Edit portfolio
            window.editPortfolio = async (id) => {
                try {
                    const response = await fetch(`/admin/portfolios/${id}/edit`, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const portfolio = await response.json();
                    modalTitle.textContent = 'Edit Portfolio';
                    document.getElementById('portfolioId').value = portfolio.id;
                    document.getElementById('service_id').value = portfolio.service_id;
                    photoPreview.innerHTML = portfolio.photos ? portfolio.photos.map(photo => `
                        <div class="relative w-16 h-16">
                            <img src="/storage/${photo}" class="w-16 h-16 object-cover rounded cursor-move" alt="Preview">
                            <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 transition-all duration-200" title="Remove image">×</button>
                        </div>
                    `).join(' ') : '';

                    // Simulate existing files for edit
                    const dataTransfer = new DataTransfer();
                    portfolio.photos.forEach((photo, index) => {
                        // Placeholder for existing photos (not actual files)
                        const file = new File([photo], `existing-${index}.jpg`, { type: 'image/jpeg' });
                        dataTransfer.items.add(file);
                    });
                    photosInput.files = dataTransfer.files;

                    photoPreview.querySelectorAll('button').forEach((btn, index) => {
                        btn.addEventListener('click', () => {
                            const newFiles = Array.from(photosInput.files).filter((_, i) => i !== index);
                            const dataTransfer = new DataTransfer();
                            newFiles.forEach(f => dataTransfer.items.add(f));
                            photosInput.files = dataTransfer.files;
                            updatePhotoPreview(newFiles);
                        });
                    });

                    portfolioModal.classList.remove('hidden');
                    document.getElementById('service_id').focus();
                } catch (error) {
                    showAlert('Error fetching portfolio', 'error');
                }
            };

            // Show delete confirmation modal
            window.showDeleteModal = (id) => {
                deletePortfolioId = id;
                deleteModal.classList.remove('hidden');
            };

            // Close delete modal
            cancelDeleteBtn.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
                deletePortfolioId = null;
            });

            // Confirm delete
            confirmDeleteBtn.addEventListener('click', async () => {
                if (deletePortfolioId) {
                    try {
                        const response = await fetch(`/admin/portfolios/${deletePortfolioId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (response.ok) {
                            showAlert(data.message, 'success');
                            fetchPortfolios();
                        } else {
                            showAlert(data.message, 'error');
                        }
                    } catch (error) {
                        showAlert('An error occurred', 'error');
                    }
                    deleteModal.classList.add('hidden');
                    deletePortfolioId = null;
                }
            });

            // Fetch portfolios on page load
            fetchPortfolios();
        });
    </script>
@endsection