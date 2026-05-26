<div align="center">

<img src="https://readme-typing-svg.demolab.com?font=Fira+Code&size=28&duration=3000&pause=1000&color=6366F1&center=true&vCenter=true&width=600&lines=🌐+Personal+Portfolio;Laravel+%2B+Filament+v3+%2B+Docker;Built+by+Wilson+Fabian" alt="Typing SVG" />

<br/>

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament_v3-FDAE4B?style=for-the-badge&logo=filament&logoColor=black)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white)
![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)

<br/>

![Status](https://img.shields.io/badge/Status-Active-brightgreen?style=flat-square)
![License](https://img.shields.io/badge/License-MIT-blue?style=flat-square)
![University](https://img.shields.io/badge/Universitas-Esa%20Unggul-orange?style=flat-square)

<br/>

> 🚀 **Website portfolio personal** yang menampilkan profil, showcase proyek dinamis, dokumentasi PDF, diagram teknis, dan panel admin — semua dalam satu platform modern.

</div>

---

## ✨ Fitur Unggulan

<table>
<tr>
<td width="50%">

### 🌐 Frontend
- 🏠 Landing Page & Profil Personal
- 🗂️ Showcase Project Dinamis
- 📄 Detail Project & Laporan PDF
- 📊 Diagram (ERD / Flowchart)
- 📬 Contact Form Interaktif
- 📱 Responsive Design

</td>
<td width="50%">

### 🔧 Backend & Admin
- 🛡️ Panel Admin (Filament v3)
- ➕ Tambah & Kelola Project
- 📤 Upload PDF & Diagram
- 📈 Update Progress Project
- 🔐 Autentikasi Admin
- 🐳 Docker Environment

</td>
</tr>
</table>

---

## 🛠️ Tech Stack

<div align="center">

| Layer | Teknologi |
|-------|-----------|
| **Backend** | ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white) ![Filament](https://img.shields.io/badge/Filament_v3-FDAE4B?logo=data:image/svg+xml;base64,PHN2Zy8+&logoColor=black) ![Livewire](https://img.shields.io/badge/Livewire-4E56A6?logo=livewire&logoColor=white) |
| **Database** | ![MariaDB](https://img.shields.io/badge/MariaDB-003545?logo=mariadb&logoColor=white) |
| **Frontend** | ![Blade](https://img.shields.io/badge/Blade-FF2D20?logo=laravel&logoColor=white) ![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white) ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black) |
| **DevOps** | ![Docker](https://img.shields.io/badge/Docker-2496ED?logo=docker&logoColor=white) ![Docker Compose](https://img.shields.io/badge/Docker_Compose-2496ED?logo=docker&logoColor=white) |

</div>

---

## 📦 Instalasi & Setup

### Prasyarat

Pastikan sudah terinstall:

- 🐳 [Docker](https://docs.docker.com/get-docker/) & Docker Compose
- 🔧 Git

---

### 🔁 Step 1 — Clone Repository

```bash
git clone <URL_REPOSITORY>
cd portofolio-2026
```

---

### 🐳 Step 2 — Jalankan Docker

```bash
# Custom command (shortcut)
dcu

# atau lengkap
docker compose up -d
```

---

### 💻 Step 3 — Masuk Container PHP

```bash
docker compose exec php bash
```

---

### 📦 Step 4 — Install Dependency

```bash
composer install
```

---

### ⚙️ Step 5 — Setup Environment

```bash
cp .env.example .env
```

Sesuaikan konfigurasi berikut di file `.env`:

```env
APP_URL=https://portofolio-2026.test

DB_CONNECTION=mariadb
DB_HOST=db
DB_PORT=3306
DB_DATABASE=portofolio
DB_USERNAME=root
DB_PASSWORD=p455w0rd
```

---

### 🔑 Step 6 — Generate App Key

```bash
dca key:generate
```

---

### 🗄️ Step 7 — Migration & Seeder

```bash
dca migrate:fresh --seed
```

---

### 🔗 Step 8 — Storage Link

```bash
dca storage:link
```

---

### 🌐 Step 9 — Akses Website

| Panel | URL |
|-------|-----|
| 🌐 Frontend | `https://portofolio-2026.test` |
| 🔐 Admin Panel | `https://portofolio-2026.test/admin` |

---

## 🚀 Panduan Penggunaan

### 👤 Frontend (Pengunjung)

Pengunjung dapat mengakses fitur berikut tanpa login:

- 👁️ Melihat profil & informasi personal
- 📂 Menjelajahi daftar project
- 📄 Membuka & mengunduh laporan PDF
- 🗺️ Melihat diagram ERD / Flowchart
- 📩 Mengirim pesan melalui contact form

---

### 🔐 Admin Panel

Login ke panel admin untuk mengelola konten:

```
URL   : https://portofolio-2026.test/admin
Email : (isi akun admin)
Pass  : (isi password)
```

Fitur admin meliputi:

| Fitur | Deskripsi |
|-------|-----------|
| ➕ Tambah Project | Buat entri project baru |
| 📤 Upload PDF | Lampirkan laporan atau dokumen |
| 🖼️ Upload Diagram | Tambahkan ERD, flowchart, dll |
| 📊 Update Progress | Perbarui status pengerjaan project |

---

## 📷 Screenshot

> Tampilan utama aplikasi Portfolio berbasis Laravel + Filament v3

---

### 🏠 Landing Page

<div align="center">

<img src="./docs/screenshots/home.png" width="900"/>

</div>

Menampilkan halaman utama portfolio beserta navigasi 

---

### 👤 About

<div align="center">

<img src="./docs/screenshots/About.png" width="900"/>

</div>

Bagian profil dan informasi personal.

---

### 🛠️ Skills & Tech Stack

<div align="center">

<img src="./docs/screenshots/Skills.png" width="900"/>

</div>

Menampilkan kemampuan dan teknologi yang digunakan.

---

### 📂 Project Showcase

<div align="center">

<img src="./docs/screenshots/Project.png" width="900"/>

</div>

Daftar project yang ditampilkan secara dinamis.

---

### 📄 Detail Project

<div align="center">

<img src="./docs/screenshots/Detail-Project.png" width="900"/>

</div>

Halaman detail project yang menampilkan:
- Deskripsi
- Tech Stack
- Diagram
- Laporan PDF
- Link GitHub

---

### 📬 Contact

<div align="center">

<img src="./docs/screenshots/Contact.png" width="900"/>

</div>

Form kontak untuk menerima pesan dari pengunjung.

---

## 🔐 Admin Panel (Filament v3)

### 📊 Dashboard

<div align="center">

<img src="./docs/screenshots/Admin-Dashboard.png" width="900"/>

</div>

Dashboard monitoring data aplikasi.

---

### 📁 Project Management

<div align="center">

<img src="./docs/screenshots/Admin-Projects.png" width="900"/>

</div>

Kelola project:
- Tambah Project
- Upload Diagram
- Upload PDF
- Update Progress

---

### 👤 Portfolio Profile Management

<div align="center">

<img src="./docs/screenshots/Admin-Contact.png" width="900"/>

</div>

Panel administrasi untuk mengelola informasi profil yang ditampilkan pada halaman portfolio, meliputi:

- Nama lengkap
- Nomor telepon
- Link GitHub
- Deskripsi profil
- Tech Stack
- Profesi

Seluruh perubahan akan langsung terintegrasi dengan tampilan frontend secara dinamis melalui Filament Admin Panel.

## 📂 Struktur Direktori

```
portofolio-2026/
│
├── 📁 app/
│   ├── Filament/          # Panel admin Filament
│   ├── Http/Controllers/  # Controller backend
│   └── Models/            # Model Eloquent
│
├── 📁 resources/
│   ├── views/             # Blade templates
│   └── css/               # Stylesheet
│
├── 📁 database/
│   ├── migrations/        # Skema database
│   └── seeders/           # Data awal
│
├── 📁 storage/
│   └── app/public/docs    # PDF & Diagram upload
│
├── 📁 docs/
│   └── screenshots/       # Screenshot aplikasi
│
├── 🐳 docker-compose.yml
├── ⚙️ .env.example
└── 📄 README.md
```

---

## 🗺️ Roadmap

```
✅  Portfolio Website
✅  Dynamic Project Showcase
✅  Upload PDF
✅  Diagram Support
🔄  Deployment ke Production
⏳  Analytics & Visitor Tracking
```

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Berikut langkah-langkahnya:

```bash
# 1. Fork repository ini
# 2. Buat branch baru
git checkout -b feature/nama-fitur

# 3. Commit perubahan
git commit -m "feat: tambah fitur keren"

# 4. Push ke branch
git push origin feature/nama-fitur

# 5. Buat Pull Request 🎉
```

---

## 📄 Lisensi

```
MIT License

Copyright (c) 2026 Wilson Fabian

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files, to deal in the Software
without restriction.
```

Project ini dibuat untuk kebutuhan **akademik dan pembelajaran** di Universitas Esa Unggul.

---

## 👨‍💻 Author

<div align="center">

<img src="https://avatars.githubusercontent.com/u/0?v=4" width="80" style="border-radius: 50%;" alt="Wilson Fabian"/>

### Wilson Fabian

🎓 **Universitas Esa Unggul**
📋 **NIM:** 20240801098


