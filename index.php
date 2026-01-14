<?php
// ===========================================
// Form Login VULNERABLE terhadap SQL Injection
// HANYA UNTUK KEPERLUAN EDUKASI/SIMULASI
// ===========================================

include 'config.php';

$message = '';
$messageType = '';
$queryExecuted = '';

#Query sql injection


#perkondisian login rawan sql injection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'") ;
    $queryExecuted = $query;
    
    if ($query && mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        $message = "Login Berhasil! Selamat datang, " . htmlspecialchars($user['username']) . "!";
        $messageType = 'success';
    } else {
        $message = "Login Gagal! Username atau password salah.";
        $messageType = 'error';
    }
}

#perkondisian login melindungi dari sql injection
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = $_POST['username'] ?? '';
//     $password = $_POST['password'] ?? '';

//         $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
//         $stmt->bind_param("s", $username);
//         $stmt->execute();
        
//         $result = $stmt->get_result();
        
//         if ($result->num_rows === 1) {
//             $user = $result->fetch_assoc();
            
//             if (password_verify($password, $user['password'])) {
//                 $_SESSION['username'] = $user['username'];
//                 $message = "Login berhasil! Selamat datang, " . htmlspecialchars($user['username']);
//                 $messageType = 'success';
                
//             } else {
//                 $message = "Password salah";
//                 $messageType = 'error';
//             }
//         } else {
//             $message = "Username tidak ditemukan";
//             $messageType = 'error';
//         }
        
//         $stmt->close();
//     }

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo SQL Injection - Form Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2> Login</h2>
            
            <div class="warning-badge">
                DEMO EDUKASI VULNERABLE TO SQL INJECTION
            </div>
            
            <?php if ($message): ?>
                <div class="message <?php echo $messageType; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Masukkan username"
                        required
                    >
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input 
                        type="text" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password"
                        required
                    >
                </div>
                
                <button type="submit" class="btn-login">Login</button>
            </form>
            
            
        </div>
    </div>
</body>
</html>
