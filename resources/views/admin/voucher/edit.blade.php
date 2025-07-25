<!-- resources/views/admin/voucher/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Voucher: {{ $voucher->code }}</h1>
        <a href="{{ route('admin.vouchers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Vouchers
        </a>
    </div>

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.vouchers.update', $voucher) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="code" class="block text-sm font-medium text-gray-700">Voucher Code</label>
                <input type="text" name="code" id="code" value="{{ old('code', $voucher->code) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('code')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Voucher Image</label>
                <div class="flex items-center mb-2">
                    <img src="{{ asset($voucher->image) }}" alt="Voucher Image" class="h-20 object-cover mr-4">
                    <span class="text-sm text-gray-500">Current Image</span>
                </div>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <p class="text-gray-500 text-xs mt-1">Upload a new image only if you want to change it</p>
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $voucher->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="discount_percentage" class="block text-sm font-medium text-gray-700">Discount Percentage (%)</label>
                <input type="number" name="discount_percentage" id="discount_percentage" min="0" max="100" value="{{ old('discount_percentage', $voucher->discount_percentage) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('discount_percentage')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="usage_limit" class="block text-sm font-medium text-gray-700">Usage Limit (optional)</label>
                <input type="number" name="usage_limit" id="usage_limit" min="1" value="{{ old('usage_limit', $voucher->usage_limit) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <p class="text-gray-500 text-xs mt-1">Current usage: {{ $voucher->usage_count }}. Leave empty for unlimited usage</p>
                @error('usage_limit')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="expired_at" class="block text-sm font-medium text-gray-700">Expiration Date (optional)</label>
                <input type="date" name="expired_at" id="expired_at" value="{{ old('expired_at', $voucher->expired_at ? date('Y-m-d', strtotime($voucher->expired_at)) : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <p class="text-gray-500 text-xs mt-1">Leave empty for no expiration</p>
                @error('expired_at')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex space-x-3">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Update Voucher
                </button>
                <a href="{{ route('admin.vouchers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection