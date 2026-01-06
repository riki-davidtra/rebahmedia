@extends('layouts.home.app')

@push('title', 'Home')

@section('content')
    <div class="space-y-8">
        <section class="min-h-screen">
            <div class="relative rounded-3xl overflow-hidden bg-gradient-to-r from-indigo-700 to-indigo-600 text-white">

                <!-- Background Image -->
                <img src="{{ asset('assets/images/no-image.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-30">

                <!-- Content -->
                <div class="relative p-8 md:p-12 max-w-3xl">
                    <span class="inline-flex items-center gap-2 mb-4 px-4 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur">
                        🔥 Trending
                        <span class="opacity-80">Viral Hari Ini</span>
                    </span>

                    <h2 class="text-3xl md:text-4xl font-extrabold leading-tight mb-4">
                        Judul Berita Viral Paling Banyak Dibicarakan
                    </h2>

                    <div class="flex items-center gap-2 mb-4 text-xs">
                        <span class="px-3 py-1 rounded-full bg-indigo-900/50 backdrop-blur-md text-white font-medium">
                            Politik
                        </span>
                        <time class="text-indigo-200 opacity-80">2 jam lalu</time>
                        <span class="text-indigo-200 opacity-80">•</span>
                        <span class="text-indigo-200 opacity-80">1.234 views</span>
                    </div>

                    <p class="text-indigo-100 line-clamp-3 mb-6">
                        Ini contoh hero section statis untuk berita viral. Nantinya bisa diganti
                        dengan data dinamis dari database.
                    </p>

                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-indigo-700 font-semibold hover:bg-indigo-100 transition">
                        Lihat Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Iklan di bawah hero section -->
            <div class="mt-8 max-w-7xl mx-auto p-6 bg-white rounded-2xl shadow-md text-center">
                <h3 class="font-semibold text-lg mb-2 text-slate-800">Iklan Sponsor</h3>
                <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-4">
                    <p class="text-sm text-indigo-700 mb-3">Tempat iklan AdSense / Banner Promosi</p>
                    <img src="{{ asset('assets/images/no-image.jpg') }}" alt="Ad Banner" class="mx-auto rounded-lg mb-3 h-40 w-full object-cover">
                    <a href="#" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-full text-sm font-medium hover:bg-indigo-700 transition">
                        Kunjungi Sekarang
                    </a>
                </div>
            </div>

            <!-- Trending Grid -->
            <div class="mt-8 max-w-7xl mx-auto grid gap-6 md:grid-cols-3">
                @for ($i = 1; $i <= 3; $i++)
                    <article class="group flex gap-4 bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition relative">
                        <span class="absolute top-3 left-3 px-2 py-1 text-xs rounded-full bg-indigo-700/30 text-white font-semibold backdrop-blur-sm">
                            🔥
                        </span>

                        <img src="{{ asset('assets/images/no-image.jpg') }}" class="w-32 object-cover flex-shrink-0">

                        <div class="p-4 flex flex-col justify-between flex-1">
                            <div>
                                <h3 class="font-semibold leading-snug line-clamp-2 group-hover:text-indigo-600 transition">
                                    Judul Berita Trending Lainnya
                                </h3>

                                <span class="inline-block mb-2 px-3 py-1 text-xs rounded-full bg-indigo-100 text-indigo-700 font-medium">
                                    Politik
                                </span>

                                <div class="text-xs text-slate-500 flex gap-2 items-center">
                                    <span>2025-10-12 03:10</span>
                                    <span>•</span>
                                    <span>100.2k views</span>
                                </div>
                            </div>

                            <div class="mt-3 flex justify-end">
                                <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-700 transition">
                                    Lihat selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endfor
            </div>
        </section>

        <section class="container mx-auto px-4 py-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Berita Terbaru</h1>
                <p class="text-slate-600 mt-1">Update terkini & terpercaya</p>
            </div>

            <div class="grid lg:grid-cols-4 gap-6 items-start">
                <!-- Sidebar -->
                <aside class="lg:col-span-1 bg-white rounded-2xl shadow-sm flex flex-col">
                    <div class="p-5 border-b border-slate-200 bg-white">
                        <h2 class="font-semibold text-lg text-slate-800">Kategori</h2>
                    </div>

                    <ul class="p-5 space-y-3 overflow-y-auto max-h-[500px] mb-4">
                        @foreach ($categories as $category)
                            <li>
                                <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-indigo-50 transition flex justify-between items-center font-medium text-slate-700" onclick="this.nextElementSibling.classList.toggle('hidden')">
                                    <span>{{ $category->name }}</span>
                                    @if (count($category->subcategories ?? []) > 0)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                </button>

                                @if (count($category->subcategories ?? []) > 0)
                                    <ul class="ml-5 mt-2 hidden space-y-1 text-sm text-slate-600">
                                        @foreach ($category->subcategories as $sub)
                                            <li>
                                                <a href="{{ route('posts.index', ['category' => $sub->slug]) }}" class="block px-3 py-1 rounded hover:bg-indigo-100 transition">
                                                    {{ $sub->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <!-- Sidebar Iklan -->
                    <div class="mt-4 p-4 bg-white rounded-2xl shadow-sm flex flex-col items-center">
                        <h3 class="font-semibold text-lg mb-2 text-slate-800">Iklan</h3>
                        <div class="w-full bg-indigo-50 border border-indigo-200 rounded-xl p-4 text-center">
                            <p class="text-sm text-indigo-700 mb-2">Tempat iklan AdSense / Promosi</p>
                            <img src="{{ asset('assets/images/no-image.jpg') }}" alt="Ad Banner" class="mx-auto rounded-lg mb-2">
                            <a href="#" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-full text-sm font-medium hover:bg-indigo-700 transition">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </aside>

                <!-- Posts Grid -->
                <div class="lg:col-span-3">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-2">
                        @foreach ($posts as $post)
                            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group">
                                <div class="relative">
                                    <img src="{{ $post->thumbnail ?? asset('assets/images/no-image.jpg') }}" class="h-48 w-full object-cover group-hover:scale-105 transition duration-300" alt="{{ $post->title }}">
                                    <span class="absolute top-3 left-3 px-3 py-1 text-xs rounded-full bg-gradient-to-r from-indigo-600 to-indigo-500 text-white">
                                        {{ $post->category->name ?? 'News' }}
                                    </span>
                                </div>

                                <div class="p-5">
                                    <h2 class="font-semibold text-lg leading-snug line-clamp-2 group-hover:text-indigo-600 transition">
                                        <a href="{{ route('posts.show', $post->slug ?? '#') }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>

                                    <p class="text-sm text-slate-600 mt-2 line-clamp-3">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content ?? ''), 100) }}
                                    </p>

                                    <div class="flex items-center justify-between mt-4 text-sm">
                                        <div class="text-xs text-slate-500 flex gap-2 items-center">
                                            {{ $post->created_at?->diffForHumans() }}
                                            <span>•</span>
                                            <span>100.2k views</span>
                                        </div>

                                        <a href="{{ route('posts.show', $post->slug ?? '#') }}" class="inline-flex items-center gap-1 font-medium text-indigo-600 hover:text-indigo-700 transition">
                                            Lihat selengkapnya
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Iklan di atas tombol lihat semua berita -->
                    <div class="mt-8 p-6 bg-white rounded-2xl shadow-md text-center">
                        <h3 class="font-semibold text-lg mb-2 text-slate-800">Iklan Sponsor</h3>
                        <div class="max-w-md mx-auto bg-indigo-50 border border-indigo-200 rounded-xl p-4">
                            <p class="text-sm text-indigo-700 mb-3">Tempat iklan AdSense / Banner Promosi</p>
                            <img src="{{ asset('assets/images/no-image.jpg') }}" alt="Ad Banner" class="mx-auto rounded-lg mb-3 h-40 w-full object-cover">
                            <a href="#" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-full text-sm font-medium hover:bg-indigo-700 transition">
                                Kunjungi Sekarang
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                            Lihat Semua Berita
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
