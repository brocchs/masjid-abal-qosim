@extends('layouts.app')

@section('title', 'Daftar User - Masjid Abal Qosim')
@section('page-title', 'Daftar User')

@section('content')
<div class="mb-6">
    @if(Auth::user()->role_id && Auth::user()->userRole && Auth::user()->userRole->name === 'Admin IT')
    <div class="bg-white rounded-lg shadow p-4 md:p-6">
        <div class="text-right">
            <a href="{{ route('users.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah User
            </a>
        </div>
    </div>
    @endif
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-4 md:px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-users mr-2"></i>
            Daftar User Admin
        </h5>
    </div>
    <div class="p-4 md:p-6">
        @if($users->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-2 md:px-4 py-3 text-left text-xs md:text-sm font-medium text-gray-700">Nama</th>
                            <th class="px-2 md:px-4 py-3 text-left text-xs md:text-sm font-medium text-gray-700 hidden md:table-cell">Email</th>
                            <th class="px-2 md:px-4 py-3 text-left text-xs md:text-sm font-medium text-gray-700">Role</th>
                            <th class="px-2 md:px-4 py-3 text-left text-xs md:text-sm font-medium text-gray-700 hidden md:table-cell">Dibuat</th>
                            <th class="px-2 md:px-4 py-3 text-center text-xs md:text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-2 md:px-4 py-3">
                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500 md:hidden">{{ $user->email }}</div>
                            </td>
                            <td class="px-2 md:px-4 py-3 text-sm text-gray-900 hidden md:table-cell">{{ $user->email }}</td>
                            <td class="px-2 md:px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $user->userRole->name == 'Admin IT' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($user->userRole->name) }}
                                </span>
                            </td>
                            <td class="px-2 md:px-4 py-3 text-sm text-gray-900 hidden md:table-cell">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-2 md:px-4 py-3 text-center">
                                @if(Auth::user()->role_id && Auth::user()->userRole && Auth::user()->userRole->name === 'Admin IT')
                                <div class="flex justify-center space-x-1 md:space-x-2">
                                    <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 md:px-3 py-1 rounded text-xs md:text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 md:px-3 py-1 rounded text-xs md:text-sm">
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
                {{ $users->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-users text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Belum ada user</p>
            </div>
        @endif
    </div>
</div>
@endsection