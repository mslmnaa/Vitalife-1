<!-- resources/views/admin/voucher/show.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Voucher Details: {{ $voucher->code }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.vouchers.edit', $voucher) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
            <a href="{{ route('admin.vouchers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Back to Vouchers
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Voucher Image</h3>
                        <img src="{{ asset($voucher->image) }}" alt="Voucher Image" class="mt-2 w-full h-48 object-cover rounded">
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Voucher Code</h3>
                        <p class="mt-1 text-xl font-bold">{{ $voucher->code }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Discount</h3>
                        <p class="mt-1 text-xl font-bold">{{ $voucher->discount_percentage }}%</p>
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Description</h3>
                        <p class="mt-1 text-gray-600">{{ $voucher->description }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Usage</h3>
                        <p class="mt-1">
                            {{ $voucher->usage_count }} times used 
                            @if($voucher->usage_limit)
                                (Limit: {{ $voucher->usage_limit }})
                            @else
                                (No usage limit)
                            @endif
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Status</h3>
                        <p class="mt-1">
                            @if($voucher->is_used)
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Used
                                </span>
                            @elseif($voucher->expired_at && now() > $voucher->expired_at)
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Expired
                                </span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Expiration</h3>
                        <p class="mt-1">
                            @if($voucher->expired_at)
                                {{ date('d F Y', strtotime($voucher->expired_at)) }}
                                
                                @if(now() > $voucher->expired_at)
                                    <span class="text-red-600">(Expired)</span>
                                @else
                                    <span class="text-gray-500">({{ now()->diffInDays($voucher->expired_at) }} days remaining)</span>
                                @endif
                            @else
                                No expiration date
                            @endif
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Created</h3>
                        <p class="mt-1 text-gray-600">{{ $voucher->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Last Updated</h3>
                        <p class="mt-1 text-gray-600">{{ $voucher->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-50 px-6 py-3 flex justify-end">
            <form action="{{ route('admin.vouchers.destroy', $voucher) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900 font-medium" onclick="return confirm('Are you sure you want to delete this voucher?')">
                    Delete Voucher
                </button>
            </form>
        </div>
    </div>
</div>
@endsection