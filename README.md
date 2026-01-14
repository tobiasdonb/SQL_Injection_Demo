<<<<<<< HEAD
# 🔓 Demo SQL Injection - Form Login

> ⚠️ **PERINGATAN**: Kode ini SENGAJA dibuat vulnerable untuk keperluan **EDUKASI dan SIMULASI** saja. **JANGAN** gunakan di lingkungan production!

## 📁 Struktur File

```
sql_injection_demo/
├── database.sql    # Script SQL untuk membuat database & tabel
├── config.php      # Konfigurasi koneksi database
├── index.php       # Form login (VULNERABLE)
├── style.css       # Styling CSS
└── README.md       # Dokumentasi ini
```

## 🚀 Cara Setup

### 1. Buat Database
Jalankan query di `database.sql` menggunakan phpMyAdmin atau MySQL CLI:

```sql
-- Via MySQL CLI
mysql -u root -p < database.sql

-- Atau copy-paste isi file ke phpMyAdmin
```

### 2. Konfigurasi Koneksi
Edit file `config.php` jika perlu mengubah kredensial database:

```php
$host = 'localhost';
$dbname = 'demo_sqli';
$username = 'root';
$password = '';
```

### 3. Jalankan di XAMPP/WAMP
- Letakkan folder `sql_injection_demo` di `htdocs` (XAMPP) atau `www` (WAMP)
- Akses via browser: `http://localhost/sql_injection_demo/`

## 🎯 Contoh SQL Injection

### 1. Bypass Login (di field Username)
| Payload | Penjelasan |
|---------|------------|
| `' OR '1'='1` | Kondisi selalu TRUE |
| `admin' --` | Comment sisa query |
| `' OR 1=1 --` | Bypass autentikasi |
| `admin' #` | Comment dengan # |

### 2. Di Field Password
| Payload | Penjelasan |
|---------|------------|
| `' OR '1'='1` | Kondisi selalu TRUE |
| `anything' OR 'x'='x` | Bypass password check |

### 3. Union-Based Injection
| Payload | Penjelasan |
|---------|------------|
| `' UNION SELECT 1,2,3,4,5 --` | Cek jumlah kolom |
| `' UNION SELECT id,username,password,email,5 FROM users --` | Ekstrak data |

## 📝 Cara Kerja

Query vulnerable di `index.php`:
```php
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
```

Ketika user memasukkan `' OR '1'='1` di username, query menjadi:
```sql
SELECT * FROM users WHERE username='' OR '1'='1' AND password='...'
```

Kondisi `'1'='1'` selalu TRUE, sehingga query mengembalikan data user.

## 🛡️ Cara Mengamankan (Untuk Referensi)

Gunakan **Prepared Statements**:
```php
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
```

## 👤 User Sample

| Username | Password |
|----------|----------|
| admin | admin123 |
| user1 | password1 |
| user2 | password2 |
| john_doe | john2024 |
| jane_doe | jane2024 |

---

**Dibuat untuk keperluan pembelajaran Keamanan Jaringan Komputer**
=======
# SQL_Injection_Demo
Tugas Keamanan Jaringan untuk mendemonstrasikan form login yang rentan terkena SQL Injection
>>>>>>> 9cf3353bd818ad0228abf4e4f55019a295757db9
