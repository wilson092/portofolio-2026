<section class="section" id="contact">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Kontak</div>
            <h2 class="section-title">Hubungi Saya</h2>
            <p class="section-subtitle">Siap berkolaborasi? Mari terhubung</p>
        </div>

        <div class="contact-grid">

            <div class="contact-info">
                <h3>Mari Ngobrol</h3>
                <p class="contact-intro">Terbuka untuk peluang freelance, kolaborasi, maupun full-time. Jangan ragu untuk menghubungi saya.</p>

                <div class="contact-items">
                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/><circle cx="12" cy="7" r="4" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Nama</strong>
                            <span>{{ $profil->nama ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/><polyline points="22,6 12,13 2,6" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Email</strong>
                            <span>{{ $profil->email ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>No Telpon</strong>
                            <span>{{ $profil->no_telpon ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="rgba(255,255,255,0.7)" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>GitHub</strong>
                            <a href="{{ $profil->github ?? '#' }}" target="_blank">{{ $profil->github ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-box">
                <h3>Kirim Pesan</h3>
                <p class="form-intro">Isi formulir di bawah dan saya akan segera merespons.</p>

                @if(session('success'))
                    <div class="success-msg">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="#166534" stroke-width="1.5" stroke-linecap="round"/><polyline points="22 4 12 14.01 9 11.01" stroke="#166534" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@contoh.com" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" placeholder="Tuliskan pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center; margin-top:8px;">
                        Kirim Pesan
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><polygon points="22 2 15 22 11 13 2 9 22 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
