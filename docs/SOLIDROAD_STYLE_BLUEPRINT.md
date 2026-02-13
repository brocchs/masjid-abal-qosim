# Solidroad-Style Design Blueprint

Blueprint ini merangkum gaya desain yang terinspirasi dari `solidroad.com`, lalu diadaptasi untuk konteks website `Masjid Abal Qosim`.

## 1) Design Principles

1. Outcome first: setiap section harus menjawab manfaat nyata untuk jamaah.
2. Scannable layout: heading singkat, angka besar, dan card modular.
3. Trust by structure: tampilkan bukti transparansi, bukan hanya klaim.
4. CTA repetition: tombol aksi utama diulang konsisten pada titik penting.
5. Visual restraint: warna aksen dipakai seperlunya agar hierarki tetap jelas.

## 2) Brand Tokens

Gunakan token di `resources/css/solidroad-blueprint.css`.

- Core background: `--bg-primary`, `--bg-secondary`
- Core text: `--text-primary`, `--text-secondary`
- Brand green scale: `--brand-700`, `--brand-600`, `--brand-500`
- Accent scale: `--accent-teal-*`, `--accent-gold-*`
- Surface: `--surface-white`, `--surface-soft`
- Border/shadow: `--border-soft`, `--shadow-soft`, `--shadow-strong`

## 3) Typography System

- Display title: `clamp(2rem, 5vw, 3.5rem)`, weight `800`, line-height `1.05`
- Section title: `clamp(1.5rem, 3vw, 2.25rem)`, weight `700`
- Body primary: `1rem`, line-height `1.65`
- Eyebrow/label: `0.75rem`, uppercase, letter-spacing `0.08em`
- Numeric metric: `clamp(2rem, 4vw, 3rem)`, weight `800`

Rekomendasi pasangan font:
- Heading: `Poppins` atau `Plus Jakarta Sans`
- Body: `Inter` atau `Manrope`
- Numeric monospace (opsional): `Geist Mono`, `ui-monospace`

## 4) Section Blueprint (Landing)

Urutan section yang disarankan:

1. Hero (headline + 2 CTA + value bullets)
2. Impact Metrics (3-4 angka utama)
3. Transparency Pillars (laporan, dokumentasi, donasi)
4. Workflow (cara data mengalir dari donatur ke laporan)
5. Evidence/Testimonial (kutipan jamaah atau pengurus)
6. FAQ singkat
7. Final CTA + footer

## 5) Component Specs

### CTA Buttons

- Primary: hijau tua (`--brand-700`), text putih, radius `9999px`
- Secondary: outline putih/hijau lembut
- Hover: translateY `-1px`, shadow meningkat

### Metric Card

- Background putih
- Border `1px solid var(--border-soft)`
- Radius `16px`
- Header kecil + nilai besar + catatan periode

### Feature Card

- Ikon bulat/rounded square
- Judul 1 baris
- Deskripsi maksimal 2-3 baris

### Trust Strip

- Bar horizontal dengan latar lembut (`--surface-soft`)
- Berisi item seperti: update otomatis, audit trail, akses publik

## 6) Spacing & Layout Rules

- Max content width: `1200px`
- Horizontal container padding: `24px` desktop, `16px` mobile
- Vertical section spacing: `80px` desktop, `56px` tablet, `40px` mobile
- Card gap: `20-24px`

## 7) Motion & Interaction

- Section reveal: fade + up (`12-20px`), durasi `500-700ms`
- Hover card: translateY `-3px`, shadow bertambah
- Jangan gunakan animasi terus menerus kecuali indikator status update
- Hormati `prefers-reduced-motion`

## 8) Content Template (Copy)

### Hero

- Headline: `Transparansi Keuangan Masjid yang Mudah Dipahami Jamaah`
- Subtext: `Laporan donasi, wakaf, dan penyaluran diperbarui otomatis agar jamaah tahu ke mana amanah disalurkan.`
- CTA 1: `Lihat Laporan`
- CTA 2: `Donasi Sekarang`

### Metrics

- `Total Donasi Bulan Ini`
- `Total Penyaluran`
- `Jumlah Program Aktif`
- `Persentase Dana Tersalurkan`

## 9) Accessibility Checklist

1. Kontras teks minimal `4.5:1`.
2. Tombol dan link wajib punya state focus terlihat jelas.
3. Ukuran tap target minimal `44x44px`.
4. Semua ikon dekoratif `aria-hidden="true"`.
5. Gambar dokumentasi punya `alt` deskriptif.

## 10) Implementation Notes (Laravel + Tailwind/CDN)

1. Sisipkan stylesheet blueprint:
   ```blade
   <link rel="stylesheet" href="{{ asset('css/solidroad-blueprint.css') }}">
   ```
2. Pindahkan style inline berulang ke class blueprint (`.sr-*`).
3. Gunakan class utilitas blueprint untuk section baru sebelum refactor total.
4. Fokus refactor bertahap: Hero -> Metrics -> CTA.

## 11) Anti-Pattern (Hindari)

1. Terlalu banyak warna gradien yang bersaing.
2. Headline panjang lebih dari 2 baris di mobile.
3. Tombol primer dengan label berbeda-beda untuk aksi yang sama.
4. Card dengan tinggi tidak konsisten tanpa alasan.
5. Animasi berlebihan yang mengganggu data reading.
