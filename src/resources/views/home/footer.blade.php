<footer>
    <div class="container">
        <div class="footer-inner">
            <div class="footer-logo">{{ $profil->nama ?? 'Portfolio' }}</div>

            <p class="footer-copy">© {{ date('Y') }} — Junior Laravel Developer</p>

            <div class="footer-links">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#projects">Projek</a>
                <a href="#contact">Kontak</a>
            </div>
        </div>
    </div>
</footer>
