@extends('layouts.admin')

@section('page-title', 'Edit Pharmacy')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center mb-6">
                <a href="{{ route('admin.pharmacies.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold">Edit Pharmacy: {{ $pharmacy->name }}</h1>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <form action="{{ route('admin.pharmacies.update', $pharmacy) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="p-6">
                        <!-- Basic Information & Location Settings -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                            <!-- Basic Information -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
                                
                                <div class="space-y-4">
                                    <!-- Pharmacy Name -->
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Pharmacy Name <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" id="name" value="{{ old('name', $pharmacy->name) }}" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                               placeholder="Enter pharmacy name" required>
                                        @error('name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address <span class="text-red-500">*</span></label>
                                        <textarea name="address" id="address" rows="3" 
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror"
                                                  placeholder="Enter pharmacy address" required>{{ old('address', $pharmacy->address) }}</textarea>
                                        @error('address')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone & WhatsApp -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone <span class="text-red-500">*</span></label>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone', $pharmacy->phone) }}" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                                                   placeholder="Phone number" required>
                                            @error('phone')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp <span class="text-red-500">*</span></label>
                                            <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $pharmacy->whatsapp) }}" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('whatsapp') border-red-500 @enderror"
                                                   placeholder="WhatsApp number" required>
                                            @error('whatsapp')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea name="description" id="description" rows="3" 
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                                  placeholder="Enter pharmacy description">{{ old('description', $pharmacy->description) }}</textarea>
                                        @error('description')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Current Image -->
                                    @if($pharmacy->image)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                                        <div class="flex items-center space-x-4">
                                            <img src="{{ $pharmacy->image_url }}" alt="{{ $pharmacy->name }}" class="h-20 w-20 object-cover rounded-lg">
                                            <span class="text-sm text-gray-600">Current pharmacy image</span>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- New Image -->
                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                            {{ $pharmacy->image ? 'Change Image (Optional)' : 'Pharmacy Image' }}
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                        <span>Upload a file</span>
                                                        <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Location & Settings -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Location & Settings</h3>
                                
                                <div class="space-y-4">
                                    <!-- Latitude & Longitude -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                                            <input type="number" step="any" name="latitude" id="latitude" value="{{ old('latitude', $pharmacy->latitude) }}" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('latitude') border-red-500 @enderror"
                                                   placeholder="Latitude">
                                            @error('latitude')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                                            <input type="number" step="any" name="longitude" id="longitude" value="{{ old('longitude', $pharmacy->longitude) }}" 
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('longitude') border-red-500 @enderror"
                                                   placeholder="Longitude">
                                            @error('longitude')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Facilities -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-3">Facilities</label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                            @foreach($facilities as $key => $label)
                                            <div class="flex items-center">
                                                <input type="checkbox" name="facilities[]" value="{{ $key }}" id="facility_{{ $key }}"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                       {{ in_array($key, old('facilities', $pharmacy->facilities ?? [])) ? 'checked' : '' }}>
                                                <label for="facility_{{ $key }}" class="ml-2 text-sm text-gray-700">{{ $label }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Active Status -->
                                    <div>
                                        <div class="flex items-center">
                                            <input type="checkbox" name="is_active" value="1" id="is_active"
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                   {{ old('is_active', $pharmacy->is_active) ? 'checked' : '' }}>
                                            <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Operating Hours -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Operating Hours</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b">Day</th>
                                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700 border-b w-20">Open</th>
                                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b w-32">Opening Time</th>
                                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b w-32">Closing Time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @php
                                            $days = [
                                                'monday' => 'Monday',
                                                'tuesday' => 'Tuesday', 
                                                'wednesday' => 'Wednesday',
                                                'thursday' => 'Thursday',
                                                'friday' => 'Friday',
                                                'saturday' => 'Saturday',
                                                'sunday' => 'Sunday'
                                            ];
                                        @endphp
                                        @foreach($days as $key => $day)
                                        @php
                                            $dayData = $pharmacy->operating_hours[$key] ?? ['is_open' => false, 'open' => '08:00', 'close' => '22:00'];
                                        @endphp
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-900">{{ $day }}</td>
                                            <td class="px-4 py-3 text-center">
                                               <input type="checkbox" name="operating_hours[{{ $key }}][is_open]" value="1"
       id="day_{{ $key }}" data-day="{{ $key }}"
       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded day-toggle"
       {{ old("operating_hours.{$key}.is_open", $dayData['is_open'] ?? false) ? 'checked' : '' }}>

                                            </td>
                                            <td class="px-4 py-3">
                                                <input type="time" name="operating_hours[{{ $key }}][open]" 
                                                       value="{{ old("operating_hours.{$key}.open", $dayData['open'] ?? '') }}"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent time-input">
                                            </td>
                                            <td class="px-4 py-3">
                                                <input type="time" name="operating_hours[{{ $key }}][close]" 
                                                       value="{{ old("operating_hours.{$key}.close", $dayData['close'] ?? '') }}"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent time-input">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Medicines -->
                        <div class="mb-8">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Medicines</h3>
                                {{-- <button type="button" id="add-medicine" 
                                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Medicine
                                </button> --}}
                            </div>
                            <div id="medicines-container" class="space-y-4">
                                @foreach($pharmacy->medicines as $index => $medicine)
                                <div class="medicine-row bg-gray-50 border border-gray-200 rounded-lg p-4">
                                    <div class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Medicine</label>
                                            <select name="medicines[{{ $index }}][medicine_id]" 
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent medicine-select">
                                                <option value="">Select Medicine</option>
                                                @foreach($medicines as $med)
                                                <option value="{{ $med->id_medicine }}" 
                                                        {{ $med->id_medicine == $medicine->id_medicine ? 'selected' : '' }}>
                                                    {{ $med->nama }} - {{ $med->kategori }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                                            <input type="number" name="medicines[{{ $index }}][stock]" min="0" 
                                                   value="{{ $medicine->pivot->stock }}"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                                            <input type="number" name="medicines[{{ $index }}][price]" min="0" 
                                                   value="{{ $medicine->pivot->price }}"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                                            <input type="text" name="medicines[{{ $index }}][notes]" 
                                                   value="{{ $medicine->pivot->notes }}"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <input type="checkbox" name="medicines[{{ $index }}][is_available]" value="1"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                       {{ $medicine->pivot->is_available ? 'checked' : '' }}>
                                                <label class="ml-2 text-sm text-gray-700">Available</label>
                                            </div>
                                            <button type="button" class="remove-medicine text-red-600 hover:text-red-800 p-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3">
                        <a href="{{ route('admin.pharmacies.index') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Update Pharmacy
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Medicine Row Template -->
    <template id="medicine-row-template">
        <div class="medicine-row bg-gray-50 border border-gray-200 rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Medicine</label>
                    <select name="medicines[INDEX][medicine_id]" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent medicine-select">
                        <option value="">Select Medicine</option>
                        @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id_medicine }}">{{ $medicine->nama }} - {{ $medicine->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                    <input type="number" name="medicines[INDEX][stock]" min="0" value="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" name="medicines[INDEX][price]" min="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <input type="text" name="medicines[INDEX][notes]"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="medicines[INDEX][is_available]" value="1" checked
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 text-sm text-gray-700">Available</label>
                    </div>
                    <button type="button" class="remove-medicine text-red-600 hover:text-red-800 p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </template>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let medicineIndex = {{ $pharmacy->medicines->count() }};

    // Toggle operating hours inputs
    const dayToggles = document.querySelectorAll('.day-toggle');
    dayToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const day = this.getAttribute('data-day');
            const isChecked = this.checked;
            
            const openInput = document.getElementById(`open_${day}`);
            const closeInput = document.getElementById(`close_${day}`);
            
            openInput.disabled = !isChecked;
            closeInput.disabled = !isChecked;
            
            if (!isChecked) {
                openInput.value = '';
                closeInput.value = '';
            }
        });
    });

    // Initialize operating hours
    dayToggles.forEach(toggle => toggle.dispatchEvent(new Event('change')));

    // Add medicine row
    document.getElementById('add-medicine').addEventListener('click', function() {
        const template = document.getElementById('medicine-row-template').innerHTML;
        const newRow = template.replace(/INDEX/g, medicineIndex);
        document.getElementById('medicines-container').insertAdjacentHTML('beforeend', newRow);
        medicineIndex++;
    });

    // Remove medicine row
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-medicine')) {
            e.target.closest('.medicine-row').remove();
        }
    });
});
</script>
@endpush