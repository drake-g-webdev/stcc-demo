<?php
$pageTitle = 'Volunteer Login';
include 'includes/head.php';
include 'includes/header.php';

// Demo credentials
$demoUsername = 'volunteer';
$demoPassword = 'stcc2025';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $demoUsername && $password === $demoPassword) {
        // Redirect to portal
        header('Location: volunteer-portal.php');
        exit;
    } else {
        $error = 'Invalid username or password. Try the demo credentials below.';
    }
}
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
                            <input type="text" id="username" name="username" value="volunteer" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" id="password" name="password" value="stcc2025" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large btn-block">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </button>
                    </form>

                    <div class="demo-credentials">
                        <p><strong>Demo Credentials:</strong></p>
                        <p>Username: <code>volunteer</code></p>
                        <p>Password: <code>stcc2025</code></p>
                    </div>
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
