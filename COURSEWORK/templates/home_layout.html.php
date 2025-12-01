<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title ?? 'COMP1841 Portal', ENT_QUOTES, 'UTF-8') ?></title>
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* Animated Background Elements */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 20%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 20%),
        radial-gradient(circle at 90% 10%, rgba(255, 255, 255, 0.05) 0%, transparent 20%);
      z-index: -2;
      animation: float 8s ease-in-out infinite;
    }

    body::after {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.2) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.2) 0%, transparent 50%);
      z-index: -1;
      animation: float 6s ease-in-out infinite reverse;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(1deg); }
    }

    /* Header */
    .header {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 2rem;
      font-weight: 800;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-decoration: none;
      letter-spacing: -0.5px;
    }

    .nav-menu {
      display: flex;
      list-style: none;
      gap: 2rem;
    }

    .nav-menu a {
      text-decoration: none;
      color: #555;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.75rem 1.5rem;
      border-radius: 25px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .nav-menu a::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      transition: left 0.3s ease;
      z-index: -1;
    }

    .nav-menu a:hover::before {
      left: 0;
    }

    .nav-menu a:hover {
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .nav-menu a.active {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    /* Main Content */
    .main-content {
      min-height: calc(100vh - 200px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .content-wrapper {
      max-width: 1000px;
      margin: 0 auto;
      text-align: center;
    }

    /* Hero Section */
    .hero {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border-radius: 30px;
      padding: 4rem 3rem;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
      margin-bottom: 3rem;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.03), transparent);
      animation: shine 3s ease-in-out infinite;
    }

    @keyframes shine {
      0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
      50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
      100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    }

    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      color: white;
      margin-bottom: 1.5rem;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      line-height: 1.2;
      letter-spacing: -1px;
    }

    .hero-subtitle {
      font-size: 1.3rem;
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 3rem;
      line-height: 1.6;
      font-weight: 400;
    }

    /* Feature Cards */
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      margin-top: 3rem;
    }

    .feature-card {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      transition: all 0.4s ease;
      border: 1px solid rgba(255, 255, 255, 0.2);
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
      background: rgba(255, 255, 255, 0.2);
    }

    .feature-card:hover::before {
      height: 3px;
      background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
    }

    .feature-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      display: block;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    }

    .feature-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: white;
      margin-bottom: 1rem;
    }

    .feature-description {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.85);
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .feature-btn {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
      color: white;
      text-decoration: none;
      padding: 0.75rem 2rem;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.3);
      display: inline-block;
    }

    .feature-btn:hover {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.2));
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
      text-decoration: none;
      color: white;
    }

    /* CTA Section */
    .cta-section {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
      backdrop-filter: blur(15px);
      border-radius: 25px;
      padding: 3rem 2rem;
      text-align: center;
      margin-top: 3rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .cta-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: white;
      margin-bottom: 1rem;
    }

    .cta-description {
      font-size: 1.2rem;
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 2rem;
      line-height: 1.6;
    }

    .cta-buttons {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .cta-btn {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: white;
      text-decoration: none;
      padding: 1rem 2.5rem;
      border-radius: 30px;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .cta-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(16, 185, 129, 0.4);
      text-decoration: none;
      color: white;
    }

    .cta-btn.secondary {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
      box-shadow: 0 8px 25px rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .cta-btn.secondary:hover {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.2));
      box-shadow: 0 15px 40px rgba(255, 255, 255, 0.2);
    }

    /* Footer */
    .footer {
      background: rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      padding: 2rem;
      text-align: center;
      color: rgba(255, 255, 255, 0.8);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin-top: 4rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-bottom: 1rem;
      flex-wrap: wrap;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .footer-links a:hover {
      color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .nav-container {
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
      }

      .nav-menu {
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
      }

      .nav-menu a {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
      }

      .logo {
        font-size: 1.6rem;
      }

      .hero {
        padding: 3rem 2rem;
        margin: 1rem;
      }

      .hero-title {
        font-size: 2.5rem;
      }

      .hero-subtitle {
        font-size: 1.1rem;
      }

      .features-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        margin: 2rem 1rem;
      }

      .feature-card {
        padding: 2rem 1.5rem;
      }

      .cta-section {
        margin: 2rem 1rem;
        padding: 2rem 1.5rem;
      }

      .cta-title {
        font-size: 2rem;
      }

      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }

      .main-content {
        padding: 1rem;
      }

      .footer-links {
        flex-direction: column;
        gap: 1rem;
      }
    }

    /* Mobile Menu Toggle (for future enhancement) */
    .menu-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 4px;
    }

    .menu-toggle span {
      width: 25px;
      height: 3px;
      background: #667eea;
      transition: 0.3s;
    }

    @media (max-width: 768px) {
      .menu-toggle {
        display: flex;
      }
    }
  </style>
</head>
<body>
  <header class="header">
    <nav class="nav-container">
      <a href="index.php" class="logo">🎓 COMP1841</a>
      
      <ul class="nav-menu">
        <li><a href="index.php" class="active">🏠 Home</a></li>
        <li><a href="question.php">❓ Questions</a></li>
        <li><a href="User/posts.php">📝 Posts</a></li>
        <li><a href="admin/login/Login.html">⚙️ Admin</a></li>
        <li><a href="User/login/Login.html">👤 User Portal</a></li>
      </ul>

      <div class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
  </header>

  <main class="main-content">
    <div class="content-wrapper">
      <?= $output ?>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-content">
      <div class="footer-links">
        <a href="index.php">Home</a>
        <a href="question.php">Questions</a>
        <a href="User/posts.php">User Posts</a>
        <a href="admin/">Admin Panel</a>
      </div>
      <p>&copy; 2025 COMP1841 Coursework - Student Portal Platform</p>
    </div>
  </footer>
</body>
</html>