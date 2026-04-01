<?php
session_start();

// Handle logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: volunteer-login.php');
    exit;
}

// If already logged in, redirect to portal
if (isset($_SESSION['volunteer_authenticated']) && $_SESSION['volunteer_authenticated'] === true) {
    header('Location: volunteer-portal.php');
    exit;
}

// Load credentials from config file, with fallback
$credentialsFile = __DIR__ . '/config/portal-credentials.php';
if (file_exists($credentialsFile)) {
    $credentials = require $credentialsFile;
} else {
    $credentials = [
        'username' => 'volunteer',
        'password_hash' => '$2b$12$xh.bA9AQ59CrpH73p3SdGuj0t8Ge1H5nl.6wiwgCHG4ucf731pb8u',
    ];
}
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $credentials['username'] && password_verify($password, $credentials['password_hash'])) {
        $_SESSION['volunteer_authenticated'] = true;
        header('Location: volunteer-portal.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}

$pageTitle = 'Volunteer Login';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Volunteer Login</h1>
            <p>Access your volunteer resources and documentation</p>
        </div>
    </section>

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-box">
                    <div class="login-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h2>Welcome Back</h2>
                    <p>Sign in to access the volunteer portal</p>

                    <?php if ($error): ?>
                    <div class="login-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                    <?php endif; ?>

                    <form method="POST" class="login-form">
                        <div class="form-group">
                            <label for="username"><i class="fas fa-user"></i> Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large btn-block">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </button>
                    </form>

                    <p class="login-help">Credentials are provided by STCC when you join as a volunteer.</p>
                </div>

                <div class="login-info">
                    <h3>Volunteer Portal Features</h3>
                    <ul class="portal-features">
                        <li><i class="fas fa-book"></i> Guidelines of Volunteer Conduct</li>
                        <li><i class="fas fa-clipboard-list"></i> Nest Registration Procedures</li>
                        <li><i class="fas fa-egg"></i> Hatching Activity Forms</li>
                        <li><i class="fas fa-phone-alt"></i> Emergency Contact Information</li>
                    </ul>
                    <p class="login-note">Not a volunteer yet? <a href="volunteer.php">Learn how to join our team</a></p>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
