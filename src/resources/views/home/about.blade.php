<section class="section" id="about" style="background: var(--bg2);">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Tentang</div>
            <h2 class="section-title">Tentang Saya</h2>
            <p class="section-subtitle">Profil singkat dan fokus pembelajaran saya</p>
        </div>

        <div class="about-grid">
            <div class="about-text-block">
                {{ $profil->deskripsi ?? 'Konten tidak tersedia' }}
            </div>

            <div class="about-stats">
                <div class="stat-card">
                    <div class="stat-number">{{ $projeks->count() }}</div>
                    <div class="stat-label">Proyek Dikerjakan</div>
                    <div class="stat-body">Dari berbagai skala dan kebutuhan bisnis, selalu berorientasi pada kualitas.</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $profil->tech_stack ? count($profil->tech_stack) : 0 }}</div>
                    <div class="stat-label">Tech Stack</div>
                </div>
                
            </div>
        </div>

    </div>
</section>
