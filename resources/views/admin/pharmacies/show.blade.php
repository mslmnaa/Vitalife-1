@extends('layouts.admin')

@section('title', 'Detail Pharmacy')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pharmacy: {{ $pharmacy->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pharmacies.edit', $pharmacy) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.pharmacies.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <h5>Informasi Dasar</h5>
                            
                            @if($pharmacy->image)
                            <div class="text-center mb-3">
                                <img src="{{ $pharmacy->image_url }}" alt="{{ $pharmacy->name }}" 
                                     class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                            @endif

                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Nama</th>
                                    <td>{{ $pharmacy->name }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $pharmacy->address }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{ $pharmacy->phone }}</td>
                                </tr>
                                <tr>
                                    <th>WhatsApp</th>
                                    <td>
                                        {{ $pharmacy->whatsapp }}
                                        <a href="{{ $pharmacy->whatsapp_link }}" target="_blank" class="btn btn-success btn-sm ml-2">
                                            <i class="fab fa-whatsapp"></i> Chat
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $pharmacy->description ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($pharmacy->is_active)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif
                                        
                                        @if($pharmacy->is_open_now === true)
                                            <span class="badge badge-success ml-2">Sedang Buka</span>
                                        @elseif($pharmacy->is_open_now === false)
                                            <span class="badge badge-danger ml-2">Sedang Tutup</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Koordinat</th>
                                    <td>
                                        @if($pharmacy->latitude && $pharmacy->longitude)
                                            {{ $pharmacy->latitude }}, {{ $pharmacy->longitude }}
                                            <a href="https://maps.google.com/?q={{ $pharmacy->latitude }},{{ $pharmacy->longitude }}" 
                                               target="_blank" class="btn btn-info btn-sm ml-2">
                                                <i class="fas fa-map-marker-alt"></i> Lihat di Maps
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dibuat</th>
                                    <td>{{ $pharmacy->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Diperbarui</th>
                                    <td>{{ $pharmacy->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Facilities & Operating Hours -->
                        <div class="col-md-6">
                            <h5>Fasilitas</h5>
                            @if($pharmacy->facilities && count($pharmacy->facilities) > 0)
                                <div class="mb-4">
                                    @foreach($pharmacy->facilities as $facility)
                                        <span class="badge badge-info mr-1 mb-1">
                                            {{ Pharmacy::getFacilitiesOptions()[$facility] ?? $facility }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-4">Tidak ada fasilitas yang tercatat.</p>
                            @endif

                            <h5>Jam Operasional</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jam</th>
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
                                            $dayData = $pharmacy->operating_hours[$key] ?? null;
                                        @endphp
                                        <tr>
                                            <td>{{ $day }}</td>
                                            <td>
                                                @if($dayData && $dayData['is_open'])
                                                    {{ $dayData['open'] }} - {{ $dayData['close'] }}
                                                @else
                                                    <span class="text-muted">Tutup</span>
                                                @endif
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
                            <h5>Obat-obatan ({{ $pharmacy->medicines->count() }} obat)</h5>
                            
                            @if($medicinesByCategory->count() > 0)
                                @foreach($medicinesByCategory as $category => $medicines)
                                <div class="mb-4">
                                    <h6 class="text-primary">{{ $category }}</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Nama Obat</th>
                                                    <th>Stok</th>
                                                    <th>Harga</th>
                                                    <th>Status</th>
                                                    <th>Catatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($medicines as $medicine)
                                                <tr>
                                                    <td>
                                                        <strong>{{ $medicine->nama }}</strong>
                                                        <br>
                                                        <small class="text-muted">{{ $medicine->produsen }}</small>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-{{ $medicine->pivot->stock > 0 ? 'success' : 'danger' }}">
                                                            {{ $medicine->pivot->stock }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($medicine->pivot->price)
                                                            Rp {{ number_format($medicine->pivot->price, 0, ',', '.') }}
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($medicine->pivot->is_available)
                                                            <span class="badge badge-success">Tersedia</span>
                                                        @else
                                                            <span class="badge badge-danger">Tidak Tersedia</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $medicine->pivot->notes ?: '-' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Belum ada obat yang terdaftar di pharmacy ini.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection