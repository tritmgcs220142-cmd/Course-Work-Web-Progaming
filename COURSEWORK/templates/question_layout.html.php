<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title ?? 'Questions Portal', ENT_QUOTES, 'UTF-8') ?></title>
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      color: #333;
      line-height: 1.6;
    }

    /* Animated Background */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(120, 200, 255, 0.2) 0%, transparent 50%);
      z-index: -1;
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    /* Header */
    .header {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      padding: 1.5rem 0;
      position: sticky;
      top: 0;
      z-index: 100;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: bold;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-decoration: none;
    }

    .nav-links {
      display: flex;
      gap: 2.5rem;
      list-style: none;
    }

    .nav-links a {
      text-decoration: none;
      color: #666;
      font-weight: 500;
      transition: all 0.3s ease;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      position: relative;
    }

    .nav-links a:hover {
      color: #667eea;
      background: rgba(102, 126, 234, 0.1);
    }

    .nav-links a.active {
      color: #667eea;
      background: rgba(102, 126, 234, 0.15);
    }

    /* Main Container */
    .main-container {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 0 2rem;
    }

    .content-card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 25px;
      padding: 3rem;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      margin-bottom: 2rem;
    }

    .page-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .page-title {
      font-size: 3rem;
      font-weight: 700;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1rem;
    }

    .page-subtitle {
      font-size: 1.2rem;
      color: #666;
      font-weight: 500;
    }

    /* Action Buttons */
    .action-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      padding: 1.5rem;
      background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
      border-radius: 15px;
      border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .stats {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .stat-badge {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .add-btn {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: white;
      text-decoration: none;
      padding: 0.75rem 2rem;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .add-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
      text-decoration: none;
      color: white;
    }

    /* Error/Success Messages */
    .message {
      padding: 1.5rem;
      border-radius: 15px;
      margin-bottom: 2rem;
      text-align: center;
      font-weight: 500;
    }

    .error {
      background: linear-gradient(135deg, #fee 0%, #fdd 100%);
      border: 1px solid #fcc;
      color: #c66;
    }

    .success {
      background: linear-gradient(135deg, #efe 0%, #dfd 100%);
      border: 1px solid #cfc;
      color: #6c6;
    }

    /* Footer */
    .footer {
      text-align: center;
      padding: 3rem 2rem;
      color: rgba(255, 255, 255, 0.9);
      margin-top: 4rem;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-bottom: 1rem;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .footer-links a:hover {
      color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-container {
        flex-direction: column;
        gap: 1rem;
      }

      .nav-links {
        gap: 1rem;
        flex-wrap: wrap;
      }

      .main-container {
        margin: 1rem auto;
        padding: 0 1rem;
      }

      .content-card {
        padding: 2rem;
        margin: 1rem 0;
      }

      .page-title {
        font-size: 2.2rem;
      }

      .action-bar {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
      }

      .footer-links {
        flex-direction: column;
        gap: 0.5rem;
      }
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="nav-container">
      <a href="index.php" class="logo">🎓 COMP1841 Portal</a>
      <nav>
        <ul class="nav-links">
          <li><a href="index.php">🏠 Home</a></li>
          <li><a href="question.php" class="active">❓ Questions</a></li>
          <li><a href="addquestion.php">➕ Add Question</a></li>
          <li><a href="User/posts.php">📝 User Posts</a></li>
          <li><a href="admin/">⚙️ Admin</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main-container">
    <div class="content-card">
      <div class="page-header">
        <h1 class="page-title"><?= htmlspecialchars($title ?? 'Questions', ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="page-subtitle">Explore and manage community questions</p>
      </div>
      
      <?php if (isset($error)): ?>
        <div class="message error">
          <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
      <?php endif; ?>
      
      <?php if (isset($success)): ?>
        <div class="message success">
          <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
        </div>
      <?php endif; ?>

      <?= $output ?>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-links">
      <a href="index.php">Home</a>
      <a href="question.php">Questions</a>
      <a href="User/posts.php">Posts</a>
      <a href="admin/">Admin Panel</a>
    </div>
    <p>&copy; 2025 COMP1841 Coursework - Questions Portal</p>
  </footer>
</body>
</html>