@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <!-- section 1 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <p class="text-gray-400 text-xs font-semibold uppercase">Lorem, ipsum.</p>
                <h4 class="text-2xl font-bold mt-1">00 000 00</h4>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <p class="text-gray-400 text-xs font-semibold uppercase">Lorem, ipsum.</p>
                <h4 class="text-2xl font-bold mt-1 ">00 000 00</h4>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <p class="text-gray-400 text-xs font-semibold uppercase">Lorem, ipsum.</p>
                <h4 class="text-2xl font-bold mt-1 ">00 000 00</h4>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <p class="text-gray-400 text-xs font-semibold uppercase">Lorem, ipsum.</p>
                <h4 class="text-2xl font-bold mt-1 ">00 000 00</h4>
            </div>
        </div>
    <!-- section 1 end -->

    <!-- section 2 -->
        <div class="mt-5 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-gray-800">Grafik Lorem</h3>
                    <select class="text-xs border border-gray-200 rounded-lg px-2 py-1 text-gray-600">
                        <option>Lorem 2026</option>
                        <option>Lorem 2025</option>
                        <option>Lorem 2024</option>
                    </select>
                </div>
                
                <div class="h-64 w-full bg-gradient-to-b from-blue-50 to-white rounded-lg border border-gray-100 flex items-end p-2">
                    <div class="w-full flex items-end justify-around h-48">
                        <div class="w-8 bg-blue-500 rounded-t-lg h-24"></div>
                        <div class="w-8 bg-blue-500 rounded-t-lg h-32"></div>
                        <div class="w-8 bg-blue-500 rounded-t-lg h-40"></div>
                        <div class="w-8 bg-blue-500 rounded-t-lg h-36"></div>
                        <div class="w-8 bg-blue-500 rounded-t-lg h-28"></div>
                        <div class="w-8 bg-blue-500 rounded-t-lg h-44"></div>
                        <div class="w-8 bg-blue-500 rounded-t-lg h-20"></div>
                    </div>
                </div>
        
                <div class="flex gap-4 mt-4 text-xs text-gray-500">
                    <span class="flex items-center"><span class="w-3 h-3 bg-blue-500 rounded-full mr-1"></span> Data Grafik Dummy 2026</span>
                    <span class="flex items-center"><span class="w-3 h-3 bg-gray-300 rounded-full mr-1"></span> Lorem</span>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col h-full">
                <h3 class="font-semibold text-gray-800 mb-4 text-center">Aktivitas Lorem</h3>
                
                <div class="flex-1 bg-green-100 rounded-xl p-4 text-white mb-4">
                    <div class="space-y-3">

                    </div>
                </div>
                
                <button class="w-full text-sm text-blue-600 hover:text-blue-700 font-medium text-center py-2 border-t border-gray-100 pt-3">
                    Lorem ipsum dolor sit amet.
                </button>
            </div>
        </div>
    <!-- section 2 end -->

    <!-- section 3 -->
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-semibold text-gray-800">Lorem, ipsum dolor.</h3>
                <button class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-medium shadow-sm hover:shadow">
                    Lorem ipsum
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3">Lorem ipsum dolor sit amet.</th>
                            <th class="px-6 py-3">Lorem ipsum dolor sit.</th>
                            <th class="px-6 py-3">Lorem, ipsum dolor.</th>
                            <th class="px-6 py-3">Lorem, ipsum.</th>
                            <th class="px-6 py-3">Lorem</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">#INV-001</td>
                            <td class="px-6 py-4">Lorem, ipsum dolor.</td>
                            <td class="px-6 py-4">16 Feb 2026</td>
                            <td class="px-6 py-4">Rp 1.250.000</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Work</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 mr-2" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-yellow-600 hover:text-yellow-800" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center">
                <p class="text-xs text-gray-500">Menampilkan 1-5 dari 25 data</p>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs hover:bg-gray-50 transition">Sebelumnya</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700 transition">1</button>
                    <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs hover:bg-gray-50 transition">2</button>
                    <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs hover:bg-gray-50 transition">3</button>
                    <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs hover:bg-gray-50 transition">Selanjutnya</button>
                </div>
            </div>
        </div>
    <!-- section 3 end -->

    <div class="mt-8 bg-white p-8 rounded-xl shadow-sm border border-gray-100 min-h-[400px] flex items-center justify-center">
        <p class="text-gray-400 italic text-center">Konten utama lainnya</p>
    </div>

@endsection