<x-app-layout>
@section('title', 'Open Reptile Database')
    @push('meta')
    <meta name="description" content="Reptile Bio is a free, open-source reptile species database dedicated to data stewardship, conservation education, and community-driven taxonomy.">
    @endpush

    <div class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Hero --}}
            <div class="text-center mb-16">
                <img src="{{ asset('patreon-reptile-bio.png') }}" alt="Reptile Bio"
                     class="h-32 w-auto mx-auto mb-6 dark:invert">
                <h1 class="text-4xl font-serif font-bold text-gray-900 dark:text-gray-100 mb-4">
                    Reptile Bio
                </h1>
                <p class="text-xl text-blue-600 dark:text-blue-400 font-medium">Forever</p>
            </div>

            {{-- Mission Statement --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-12 mb-10">
                <h2 class="text-2xl font-serif font-bold text-gray-900 dark:text-gray-100 mb-6">
                    Our Mission
                </h2>
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <p>
                        Reptile Bio is a free, open-source database dedicated to the documentation,
                        classification, and celebration of reptile biodiversity. We believe that
                        accurate, accessible scientific data is a foundation for reptile conservation —
                        and that data belongs to everyone.
                    </p>
                    <p>
                        We are building a permanent, community-maintained record of reptile species,
                        subspecies, taxonomy, photographs, and natural history. Every data point we
                        collect is released under open licenses, freely available to researchers,
                        educators, conservationists, and enthusiasts worldwide.
                    </p>
                    <p>
                        <strong>Data stewardship</strong> is at the heart of everything we do.
                        Taxonomic knowledge is fragile — species are renamed, synonymized, and
                        redescribed as science advances. We track these changes with full revision
                        history, attributing every contribution to the community members who made it.
                    </p>
                </div>
            </div>

            {{-- Conservation Focus --}}
            <div class="bg-blue-50 dark:bg-blue-950/30 border border-blue-100 dark:border-blue-900 rounded-2xl p-8 mb-10">
                <h2 class="text-2xl font-serif font-bold text-gray-900 dark:text-gray-100 mb-6">
                    Conservation & Education
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Open Knowledge</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">All species data, photographs, and descriptions are freely licensed and downloadable.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Community-Driven</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Keepers, breeders, researchers, and naturalists contribute and curate content together.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-800 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Permanent Record</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Full revision history ensures taxonomic changes are traceable and attributable forever.</p>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('species.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-xl transition text-center text-lg shadow">
                    Browse Species Database
                </a>
                @guest
                <a href="{{ route('register') }}"
                   class="bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 px-8 rounded-xl transition text-center text-lg shadow">
                    Join the Community
                </a>
                @endguest
                <a href="https://github.com/defenestrator/reptile.bio"
                   target="_blank" rel="noopener noreferrer"
                   class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-3 px-8 rounded-xl transition text-center text-lg shadow flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                    View on GitHub
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
