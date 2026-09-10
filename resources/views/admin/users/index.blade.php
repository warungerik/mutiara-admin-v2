@extends('layouts.admin')

@section('title', 'Pengguna')
@section('page_title', 'Pengguna')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-motion="fade-up">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Manajemen Pengguna</h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-50 text-indigo-600 dark:bg-indigo-950/60 dark:text-indigo-400 border border-indigo-200/60 dark:border-indigo-800/60">
                    <span id="user-count-badge">{{ count($users) }}</span> Pengguna
                </span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Kelola data pengguna, hak akses per divisi, dan status akun sistem.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <button type="button" onclick="showToast('Data pengguna diekspor ke Excel', 'success')" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/60 shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                <span>Ekspor</span>
            </button>
            <a href="{{ route('admin.users.create') }}" 
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                <span>Tambah Pengguna</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4" data-motion="fade-up">
        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Total Pengguna</span>
                <span class="text-lg font-bold text-slate-900 dark:text-white" id="stat-total">{{ count($users) }}</span>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Status Aktif</span>
                <span class="text-lg font-bold text-emerald-600 dark:text-emerald-400">6</span>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Super Admin & Manager</span>
                <span class="text-lg font-bold text-slate-900 dark:text-white">3</span>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Menunggu Verifikasi</span>
                <span class="text-lg font-bold text-amber-600 dark:text-amber-400">1</span>
            </div>
        </div>
    </div>

    <div data-motion="fade-up" class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">

        <div class="p-4 sm:p-5 border-b border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
            <div class="relative flex-1 max-w-md">
                <input id="table-search-input" type="text" placeholder="Cari nama, email, atau role..."
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden transition-all">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="flex items-center gap-2 flex-wrap">
                <select id="status-filter" aria-label="Filter Status"
                    class="px-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 transition-all cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="Active">Aktif</option>
                    <option value="Pending">Menunggu</option>
                    <option value="Inactive">Nonaktif</option>
                </select>

                <select id="role-filter" aria-label="Filter Role"
                    class="px-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 transition-all cursor-pointer">
                    <option value="">Semua Role</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Editor">Editor</option>
                    <option value="User">User</option>
                </select>
            </div>
        </div>

        <div id="bulk-action-bar" class="hidden px-5 py-2.5 bg-indigo-50/80 dark:bg-indigo-950/60 border-b border-indigo-100 dark:border-indigo-900/60 flex items-center justify-between text-xs text-indigo-900 dark:text-indigo-200">
            <span class="font-medium"><span id="selected-count">0</span> pengguna dipilih</span>
            <div class="flex items-center gap-2">
                <button type="button" onclick="bulkDelete()" class="px-3 py-1 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-semibold shadow-xs">Hapus Terpilih</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="users-table" class="w-full text-left text-xs">
                <thead class="bg-slate-50/75 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-100 dark:border-slate-800">
                    <tr>
                        <th scope="col" class="px-5 py-3.5 w-10">
                            <input type="checkbox" id="select-all-checkbox" aria-label="Pilih Semua" class="rounded-sm border-slate-300 dark:border-slate-700 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </th>
                        <th scope="col" class="px-5 py-3.5">Pengguna</th>
                        <th scope="col" class="px-5 py-3.5">Role</th>
                        <th scope="col" class="px-5 py-3.5">Status</th>
                        <th scope="col" class="px-5 py-3.5 hidden md:table-cell">Bergabung</th>
                        <th scope="col" class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
                    @foreach ($users as $user)
                        <tr data-motion="stagger-item" class="user-row hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors"
                            data-id="{{ $user['id'] }}"
                            data-name="{{ strtolower($user['name']) }}"
                            data-email="{{ strtolower($user['email']) }}"
                            data-role="{{ $user['role'] }}"
                            data-status="{{ $user['status'] }}">
                            
                            <td class="px-5 py-3.5">
                                <input type="checkbox" class="user-checkbox rounded-sm border-slate-300 dark:border-slate-700 text-indigo-600 focus:ring-indigo-500 cursor-pointer" aria-label="Pilih Baris">
                            </td>

                            <td class="px-5 py-3.5 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-indigo-100 dark:bg-indigo-950 text-indigo-700 dark:text-indigo-300 font-bold text-xs flex items-center justify-center shrink-0 shadow-xs border border-indigo-200/50 dark:border-indigo-800/50">
                                        {{ $user['avatar'] }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-900 dark:text-white">{{ $user['name'] }}</div>
                                        <div class="text-[11px] text-slate-400">{{ $user['email'] }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-3.5 whitespace-nowrap">
                                @if ($user['role'] === 'Super Admin')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-purple-50 text-purple-700 dark:bg-purple-950/60 dark:text-purple-300 border border-purple-200/60 dark:border-purple-800/40">Super Admin</span>
                                @elseif ($user['role'] === 'Manager')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/40">Manager</span>
                                @elseif ($user['role'] === 'Editor')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-indigo-50 text-indigo-700 dark:bg-indigo-950/60 dark:text-indigo-300 border border-indigo-200/60 dark:border-indigo-800/40">Editor</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60">Pengguna</span>
                                @endif
                            </td>

                            <td class="px-5 py-3.5 whitespace-nowrap">
                                @if ($user['status'] === 'Active')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200/60 dark:border-emerald-800/40">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                @elseif ($user['status'] === 'Pending')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-400 border border-amber-200/60 dark:border-amber-800/40">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400 border border-slate-200/60 dark:border-slate-700/60">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-3.5 hidden md:table-cell text-slate-500 dark:text-slate-400 whitespace-nowrap font-medium">
                                {{ $user['created_at'] }}
                            </td>

                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1">
                                    <button type="button" onclick="openDetailModal('{{ $user['name'] }}', '{{ $user['email'] }}', '{{ $user['role'] }}', '{{ $user['status'] }}', '{{ $user['created_at'] }}')"
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer" title="Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </button>
                                    <a href="{{ route('admin.users.create') }}" class="p-1.5 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                    </a>
                                    <button type="button" onclick="deleteUser(this, '{{ $user['name'] }}')" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="no-results-alert" class="hidden p-12 text-center">
            <div class="w-16 h-16 rounded-3xl bg-slate-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">Pengguna Tidak Ditemukan</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 max-w-sm mx-auto">Tidak ada akun pengguna yang sesuai dengan pencarian atau filter yang ditentukan.</p>
        </div>

        <div class="p-4 md:p-5 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500 dark:text-slate-400">
            <div>
                Menampilkan 1 sampai <span id="showing-count">{{ count($users) }}</span> dari {{ count($users) }} entri
            </div>
            <div class="flex items-center gap-1">
                <button type="button" disabled class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-400 cursor-not-allowed">
                    &larr; Prev
                </button>
                <button type="button" class="px-3 py-1.5 rounded-xl bg-indigo-600 text-white font-semibold shadow-xs">1</button>
                <button type="button" class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 transition-colors">
                    Next &rarr;
                </button>
            </div>
        </div>

    </div>

</div>

<div id="user-detail-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs hidden">
    <div id="user-detail-dialog" class="w-full max-w-md bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-2xl overflow-hidden">
        <div class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-800">
            <h3 class="text-sm font-bold text-slate-900 dark:text-white">Detail Pengguna</h3>
            <button type="button" onclick="closeDetailModal()" class="p-1 rounded-lg text-slate-400 hover:text-slate-600 dark:hover:text-white cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="p-6 space-y-4 text-xs">
            <div class="flex items-center gap-4">
                <div id="modal-avatar" class="w-14 h-14 rounded-2xl bg-indigo-600 text-white font-bold text-lg flex items-center justify-center shadow-md shadow-indigo-600/20">
                    AP
                </div>
                <div>
                    <h4 id="modal-name" class="text-base font-bold text-slate-900 dark:text-white">Nama</h4>
                    <p id="modal-email" class="text-slate-500 dark:text-slate-400">email@example.com</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 pt-3 border-t border-slate-100 dark:border-slate-800">
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <span class="text-slate-400 block text-[11px]">Role Sistem:</span>
                    <p id="modal-role" class="font-bold text-slate-800 dark:text-slate-200 mt-0.5">Admin</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <span class="text-slate-400 block text-[11px]">Status Akun:</span>
                    <p id="modal-status" class="font-bold text-slate-800 dark:text-slate-200 mt-0.5">Aktif</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <span class="text-slate-400 block text-[11px]">Bergabung:</span>
                    <p id="modal-date" class="font-bold text-slate-800 dark:text-slate-200 mt-0.5">12 Jan 2025</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <span class="text-slate-400 block text-[11px]">Keamanan 2FA:</span>
                    <p class="font-bold text-emerald-600 dark:text-emerald-400 mt-0.5">Aktif</p>
                </div>
            </div>
        </div>
        <div class="p-4 bg-slate-50 dark:bg-slate-800/40 border-t border-slate-100 dark:border-slate-800 flex justify-end gap-2">
            <button type="button" onclick="closeDetailModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                Tutup
            </button>
            <a href="{{ route('admin.users.create') }}" class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs transition-colors cursor-pointer">
                Edit Data
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search-input');
        const statusFilter = document.getElementById('status-filter');
        const roleFilter = document.getElementById('role-filter');
        const rows = document.querySelectorAll('.user-row');
        const noResultsAlert = document.getElementById('no-results-alert');
        const selectAllCheckbox = document.getElementById('select-all-checkbox');
        const userCheckboxes = document.querySelectorAll('.user-checkbox');
        const bulkActionBar = document.getElementById('bulk-action-bar');
        const selectedCountEl = document.getElementById('selected-count');

        function filterTable() {
            const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const status = statusFilter ? statusFilter.value : '';
            const role = roleFilter ? roleFilter.value : '';
            let visibleCount = 0;

            rows.forEach(row => {
                const name = row.dataset.name || '';
                const email = row.dataset.email || '';
                const rowRole = row.dataset.role || '';
                const rowStatus = row.dataset.status || '';

                const matchesQuery = !query || name.includes(query) || email.includes(query) || rowRole.toLowerCase().includes(query);
                const matchesStatus = !status || rowStatus === status;
                const matchesRole = !role || rowRole === role;

                if (matchesQuery && matchesStatus && matchesRole) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (noResultsAlert) noResultsAlert.classList.toggle('hidden', visibleCount > 0);
            const showingCount = document.getElementById('showing-count');
            if (showingCount) showingCount.textContent = visibleCount;
        }

        if (searchInput) searchInput.addEventListener('input', filterTable);
        if (statusFilter) statusFilter.addEventListener('change', filterTable);
        if (roleFilter) roleFilter.addEventListener('change', filterTable);

        function updateBulkBar() {
            const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
            const count = checkedBoxes.length;
            if (selectedCountEl) selectedCountEl.textContent = count;
            if (bulkActionBar) bulkActionBar.classList.toggle('hidden', count === 0);
        }

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', () => {
                userCheckboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
                updateBulkBar();
            });
        }

        userCheckboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkBar);
        });

        window.bulkDelete = function() {
            const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
            showConfirm('Hapus Terpilih?', `Apakah Anda yakin ingin menghapus ${checkedBoxes.length} pengguna terpilih?`, 'Ya, Hapus Terpilih', 'Batal', 'warning')
                .then(res => {
                    if (res.isConfirmed) {
                        checkedBoxes.forEach(cb => cb.closest('.user-row').remove());
                        updateBulkBar();
                        filterTable();
                        showToast(`${checkedBoxes.length} pengguna berhasil dihapus.`, 'success');
                    }
                });
        };

        window.deleteUser = function(btn, name) {
            const row = btn.closest('.user-row');
            showConfirm('Hapus Pengguna?', `Apakah Anda yakin ingin menghapus "${name}"?`, 'Ya, Hapus', 'Batal', 'warning')
                .then(res => {
                    if (res.isConfirmed) {
                        row.remove();
                        filterTable();
                        showToast(`Pengguna "${name}" telah dihapus.`, 'success');
                    }
                });
        };

        window.openDetailModal = function(name, email, role, status, date) {
            document.getElementById('modal-name').textContent = name;
            document.getElementById('modal-email').textContent = email;
            document.getElementById('modal-role').textContent = role;
            document.getElementById('modal-status').textContent = status;
            document.getElementById('modal-date').textContent = date;
            document.getElementById('modal-avatar').textContent = name.split(' ').map(w => w[0]).slice(0, 2).join('');
            
            const modal = document.getElementById('user-detail-modal');
            const dialog = document.getElementById('user-detail-dialog');
            modal.classList.remove('hidden');
            if (window.motionAnimate && dialog) {
                window.motionAnimate(dialog, { scale: [0.9, 1], opacity: [0, 1] }, { duration: 0.25, easing: [0.16, 1, 0.3, 1] });
            }
        };

        window.closeDetailModal = function() {
            const modal = document.getElementById('user-detail-modal');
            const dialog = document.getElementById('user-detail-dialog');
            if (window.motionAnimate && dialog) {
                window.motionAnimate(dialog, { scale: [1, 0.9], opacity: [1, 0] }, { duration: 0.15 }).then(() => {
                    modal.classList.add('hidden');
                });
            } else {
                modal.classList.add('hidden');
            }
        };

        const modalContainer = document.getElementById('user-detail-modal');
        if (modalContainer) {
            modalContainer.addEventListener('click', function(e) {
                if (e.target === this) closeDetailModal();
            });
        }
    });
</script>
@endpush

