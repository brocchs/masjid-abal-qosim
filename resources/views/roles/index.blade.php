@extends('layouts.app')

@section('title', 'Master Role - Masjid Abal Qosim')
@section('page-title', 'Master Role')

@section('content')
<div class="mb-6">
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-right">
            <a href="{{ route('roles.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded inline-flex items-center">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Role
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-shield-alt mr-2"></i>
            Daftar Role
        </h5>
    </div>
    <div class="p-6">
        @if($roles->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Role</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Deskripsi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Dibuat</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($roles as $role)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded bg-blue-100 text-blue-800">{{ $role->name }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $role->description ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $role->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($role->name !== 'Admin IT')
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('roles.edit', $role) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus role ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                @else
                                <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="flex justify-center mt-6">
                {{ $roles->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-shield-alt text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada role</p>
                <a href="{{ route('roles.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Role Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection