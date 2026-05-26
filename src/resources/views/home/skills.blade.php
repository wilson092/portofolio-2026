<section class="section" id="skills">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Keahlian</div>
            <h2 class="section-title">Skill &amp; Tech Stack</h2>
            <p class="section-subtitle">Teknologi yang saya kuasai</p>
        </div>

        <div class="skills-grid">
            @if($profil && $profil->tech_stack && is_array($profil->tech_stack))
                @foreach($profil->tech_stack as $tech)
                    @php
                        $techName = is_array($tech) ? ($tech['name'] ?? 'Tech') : $tech;
                        $techDesc = is_array($tech) ? ($tech['description'] ?? 'Teknologi yang dikuasai') : 'Teknologi yang dikuasai';
                        $techNameLower = strtolower($techName);
                        $borderColor = '#c9a84c';
                        if(strpos($techNameLower, 'laravel') !== false) $borderColor = '#FF2D20';
                        elseif(strpos($techNameLower, 'filament') !== false) $borderColor = '#10B981';
                        elseif(strpos($techNameLower, 'livewire') !== false) $borderColor = '#FBBF24';
                        elseif(strpos($techNameLower, 'blade') !== false) $borderColor = '#38BDF8';
                        elseif(strpos($techNameLower, 'docker') !== false) $borderColor = '#2496ED';
                        elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false) $borderColor = '#00758D';
                        elseif(strpos($techNameLower, 'git') !== false && strpos($techNameLower, 'github') === false) $borderColor = '#F05032';
                        elseif(strpos($techNameLower, 'github') !== false) $borderColor = '#24292E';
                        elseif(strpos($techNameLower, 'tailwind') !== false) $borderColor = '#06B6D4';
                        elseif(strpos($techNameLower, 'php') !== false) $borderColor = '#777BB4';
                        elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false) $borderColor = '#F7DF1E';
                        elseif(strpos($techNameLower, 'react') !== false) $borderColor = '#61DAFB';
                        elseif(strpos($techNameLower, 'vue') !== false) $borderColor = '#4FC08D';
                        elseif(strpos($techNameLower, 'bootstrap') !== false) $borderColor = '#7952B3';
                        elseif(strpos($techNameLower, 'rest api') !== false) $borderColor = '#009B77';
                        elseif(strpos($techNameLower, 'html') !== false) $borderColor = '#E34C26';
                        elseif(strpos($techNameLower, 'css') !== false) $borderColor = '#563D7C';
                        elseif(strpos($techNameLower, 'figma') !== false) $borderColor = '#F24E1E';
                    @endphp
                    <div class="skill-card" style="--tech-color: {{ $borderColor }}">
                        <div class="skill-icon-wrap">
                            @if(strpos($techNameLower, 'laravel') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'filament') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'livewire') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/></svg>
                            @elseif(strpos($techNameLower, 'blade') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/></svg>
                            @elseif(strpos($techNameLower, 'docker') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><circle cx="7" cy="4" r="1.5" fill="#2496ED"/><circle cx="7" cy="12" r="1.5" fill="#2496ED"/><circle cx="7" cy="20" r="1.5" fill="#2496ED"/></svg>
                            @elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/><path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/><path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/></svg>
                            @elseif(strpos($techNameLower, 'github') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="#24292E"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z"/></svg>
                            @elseif(strpos($techNameLower, 'git') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2" stroke="#F05032" stroke-width="1.5"/><circle cx="18" cy="6" r="2" stroke="#F05032" stroke-width="1.5"/><circle cx="6" cy="18" r="2" stroke="#F05032" stroke-width="1.5"/><path d="M6 8v8M8 6h8M8 18h4" stroke="#F05032" stroke-width="1.5" stroke-linecap="round"/></svg>
                            @elseif(strpos($techNameLower, 'tailwind') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="#06B6D4" stroke-width="1.5"/><path d="M8 12L11 15L16 9" stroke="#06B6D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'php') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="12" rx="10" ry="6" stroke="#777BB4" stroke-width="1.5"/><path d="M9 10H11C12 10 13 10.5 13 12C13 13.5 12 14 11 14H9V10Z" stroke="#777BB4" stroke-width="1.2"/></svg>
                            @elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#F7DF1E" stroke-width="1.5"/><path d="M8 13C8 14.5 7.5 16 6 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/><path d="M16 13C16 14.5 16.5 16 18 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/></svg>
                            @elseif(strpos($techNameLower, 'react') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="2" stroke="#61DAFB" stroke-width="1.5"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(120 12 12)"/></svg>
                            @elseif(strpos($techNameLower, 'vue') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 20H9L12 14L15 20H21L12 2Z" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'bootstrap') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#7952B3" stroke-width="1.5"/><path d="M8 9H12C13.1 9 14 9.9 14 11C14 12.1 13.1 13 12 13H8V9Z" stroke="#7952B3" stroke-width="1.5"/><path d="M8 13H12C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17H8V13Z" stroke="#7952B3" stroke-width="1.5"/></svg>
                            @elseif(strpos($techNameLower, 'rest api') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 4H20V20H4V4Z" stroke="#009B77" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 8L16 16M16 8L8 16" stroke="#009B77" stroke-width="1.5" stroke-linecap="round"/></svg>
                            @elseif(strpos($techNameLower, 'html') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'css') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'figma') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.5" stroke="#F24E1E" stroke-width="1.5"/><path d="M8.5 14.5C8.5 12.567 9.567 11 12 11C14.433 11 15.5 12.567 15.5 14.5C15.5 16.433 14.433 17 12 17C9.567 17 8.5 16.433 8.5 14.5Z" stroke="#F24E1E" stroke-width="1.5"/></svg>
                            @else
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4" fill="var(--accent)" opacity="0.6"/><circle cx="12" cy="12" r="9" stroke="var(--accent)" stroke-width="1.5" opacity="0.4"/></svg>
                            @endif
                        </div>
                        <h3>{{ $techName }}</h3>
                        <p>{{ $techDesc }}</p>
                    </div>
                @endforeach
            @else
                <p style="grid-column: 1 / -1; text-align: center; color: var(--ink3);">Tech stack tidak tersedia</p>
            @endif
        </div>

    </div>
</section>
