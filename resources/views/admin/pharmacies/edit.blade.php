@extends('layouts.admin')

@section('title', 'Edit Pharmacy')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pharmacy: {{ $pharmacy->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pharmacies.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('admin.pharmacies.update', $pharmacy) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-md-6">
                                <h5>Informasi Dasar</h5>
                                
                                <div class="form-group">
                                    <label for="name">Nama Pharmacy <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $pharmacy->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" 
                                              id="address" name="address" rows="3" required>{{ old('address', $pharmacy->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Telepon <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" name="phone" value="{{ old('phone', $pharmacy->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="whatsapp">WhatsApp <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" 
                                                   id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $pharmacy->whatsapp) }}" required>
                                            @error('whatsapp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="3">{{ old('description', $pharmacy->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    @if($pharmacy->image)
                                        <div class="mb-2">
                                            <img src="{{ $pharmacy->image_url }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Location & Settings -->
                            <div class="col-md-6">
                                <h5>Lokasi & Pengaturan</h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror" 
                                                   id="latitude" name="latitude" value="{{ old('latitude', $pharmacy->latitude) }}">
                                            @error('latitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror" 
                                                   id="longitude" name="longitude" value="{{ old('longitude', $pharmacy->longitude) }}">
                                            @error('longitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Fasilitas</label>
                                    <div class="row">
                                        @foreach($facilities as $key => $label)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       name="facilities[]" value="{{ $key }}" id="facility_{{ $key }}"
                                                       {{ in_array($key, old('facilities', $pharmacy->facilities ?? [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="facility_{{ $key }}">
                                                    {{ $label }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1" 
                                               id="is_active" {{ old('is_active', $pharmacy->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Operating Hours -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5>Jam Operasional</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Hari</th>
                                                <th width="15%">Buka</th>
                                                <th width="15%">Jam Buka</th>
                                                <th width="15%">Jam Tutup</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $days = [
                                                    'monday' => 'Senin',
                                                    'tuesday' => 'Selasa', 
                                                    'wednesday' => 'Rabu',
                                                    'thursday' => 'Kamis',
                                                    'friday' => 'Jumat',
                                                    'saturday' => 'Sabtu',
                                                    'sunday' => 'Minggu'
                                                ];
                                            @endphp
                                            @foreach($days as $key => $day)
                                            @php
                                                $dayData = $pharmacy->operating_hours[$key] ?? ['is_open' => false, 'open' => '08:00', 'close' => '22:00'];
                                            @endphp
                                            <tr>
                                                <td>{{ $day }}</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input day-toggle" type="checkbox" 
                                                               name="operating_hours[{{ $key }}][is_open]" value="1"
                                                               id="day_{{ $key }}" data-day="{{ $key }}"
                                                               {{ old("operating_hours.{$key}.is_open", $dayData['is_open']) ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control time-input" 
                                                           name="operating_hours[{{ $key }}][open]" 
                                                           id="open_{{ $key }}"
                                                           value="{{ old("operating_hours.{$key}.open", $dayData['open']) }}">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control time-input" 
                                                           name="operating_hours[{{ $key }}][close]" 
                                                           id="close_{{ $key }}"
                                                           value="{{ old("operating_hours.{$key}.close", $dayData['close']) }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Medicines -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5>Obat-obatan</h5>
                                <button type="button" class="btn btn-success btn-sm mb-3" id="add-medicine">
                                    <i class="fas fa-plus"></i> Tambah Obat
                                </button>
                                <div id="medicines-container">
                                    @foreach($pharmacy->medicines as $index => $medicine)
                                    <div class="medicine-row border p-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Obat</label>
                                                    <select class="form-control medicine-select" name="medicines[{{ $index }}][medicine_id]">
                                                        <option value="">Pilih Obat</option>
                                                        @foreach($medicines as $med)
                                                        <option value="{{ $med->id_medicine }}" 
                                                                {{ $med->id_medicine == $medicine->id_medicine ? 'selected' : '' }}>
                                                            {{ $med->nama }} - {{ $med->kategori }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Stok</label>
                                                    <input type="number" class="form-control" name="medicines[{{ $index }}][stock]" 
                                                           min="0" value="{{ $medicine->pivot->stock }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Harga</label>
                                                    <input type="number" class="form-control" name="medicines[{{ $index }}][price]" 
                                                           min="0" value="{{ $medicine->pivot->price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Catatan</label>
                                                    <input type="text" class="form-control" name="medicines[{{ $index }}][notes]" 
                                                           value="{{ $medicine->pivot->notes }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>Tersedia</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                               name="medicines[{{ $index }}][is_available]" value="1"
                                                               {{ $medicine->pivot->is_available ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <button type="button" class="btn btn-danger btn-sm d-block remove-medicine">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="{{ route('admin.pharmacies.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Medicine Row Template -->
<template id="medicine-row-template">
    <div class="medicine-row border p-3 mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Obat</label>
                    <select class="form-control medicine-select" name="medicines[INDEX][medicine_id]">
                        <option value="">Pilih Obat</option>
                        @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id_medicine }}">{{ $medicine->nama }} - {{ $medicine->kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" class="form-control" name="medicines[INDEX][stock]" min="0" value="0">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="medicines[INDEX][price]" min="0">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" class="form-control" name="medicines[INDEX][notes]">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Tersedia</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="medicines[INDEX][is_available]" value="1" checked>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="button" class="btn btn-danger btn-sm d-block remove-medicine">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let medicineIndex = {{ $pharmacy->medicines->count() }};

    // Toggle operating hours inputs
    $('.day-toggle').change(function() {
        const day = $(this).data('day');
        const isChecked = $(this).is(':checked');
        
        $(`#open_${day}, #close_${day}`).prop('disabled', !isChecked);
        
        if (!isChecked) {
            $(`#open_${day}, #close_${day}`).val('');
        }
    });

    // Initialize operating hours
    $('.day-toggle').trigger('change');

    // Add medicine row
    $('#add-medicine').click(function() {
        const template = $('#medicine-row-template').html();
        const newRow = template.replace(/INDEX/g, medicineIndex);
        $('#medicines-container').append(newRow);
        medicineIndex++;
    });

    // Remove medicine row
    $(document).on('click', '.remove-medicine', function() {
        $(this).closest('.medicine-row').remove();
    });
});
</script>
@endpush