<section class="section" id="projects" style="background: var(--bg2);">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Portfolio</div>
            <h2 class="section-title">Projek Saya</h2>
            <p class="section-subtitle">Beberapa project yang pernah saya kerjakan</p>
        </div>

        <div class="projects-grid">
            @if($projeks->count() > 0)
                @foreach($projeks as $projek)
                    <div class="project-card">
                        <div class="project-header">
                            <h3>{{ $projek->judul ?? '-' }}</h3>
                            <span class="project-status {{ $projek->status_progress == 'Selesai' ? 'status-done' : 'status-progress' }}">
                                {{ $projek->status_progress ?? '-' }}
                            </span>
                        </div>
                        <p>{{ $projek->deskripsi ?? '-' }}</p>
                        <a href="/projek/{{ $projek->id }}" class="project-link">
                            Detail Projek
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                @endforeach
            @else
                <p style="grid-column: 1 / -1; text-align: center; color: var(--ink3); padding: 60px 0;">Projek tidak tersedia</p>
            @endif
        </div>

    </div>
</section>
