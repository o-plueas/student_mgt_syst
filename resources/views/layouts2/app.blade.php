<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Academy - Excellence in Education')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e40af;
            --primary-dark: #1e3a8a;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navigation Styles */
        nav {
            background: rgba(30, 64, 175, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(30, 64, 175, 0.98);
            padding: 0.5rem 0;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
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
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--white);
            text-decoration: none;
            letter-spacing: -0.5px;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
            font-size: 0.95rem;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .cta-btn {
            background: var(--accent);
            color: var(--white);
            padding: 0.75rem 1.75rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--accent);
        }

        .cta-btn:hover {
            background: transparent;
            color: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
        }

        /* Hero Section */
        .hero {
            margin-top: 70px;
            height: 100vh;
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.85) 0%, rgba(14, 165, 233, 0.85) 100%), 
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><linearGradient id="grad"><stop offset="0%25" style="stop-color:rgb(30,64,175);stop-opacity:0.1" /><stop offset="100%25" style="stop-color:rgb(14,165,233);stop-opacity:0.1" /></linearGradient></defs><rect width="1200" height="600" fill="url(%23grad)"/></svg>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(14, 165, 233, 0.1) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 80%, rgba(245, 158, 11, 0.05) 0%, transparent 50%);
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--white);
            max-width: 800px;
            padding: 0 2rem;
            animation: fadeInUp 1s ease 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.35rem;
            margin-bottom: 2.5rem;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 300;
            letter-spacing: 0.3px;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--accent);
            color: var(--white);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--accent);
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: transparent;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(245, 158, 11, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--white);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--white);
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: var(--white);
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 255, 255, 0.2);
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            background: var(--bg-light);
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3.5rem;
            color: var(--primary);
            font-weight: 700;
            animation: fadeInUp 0.8s ease;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.8s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(30, 64, 175, 0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .feature-card h3 {
            color: var(--primary);
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* Footer */
        footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 3rem 2rem;
            text-align: center;
        }

        footer p {
            margin: 0.5rem 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                gap: 1.5rem;
                font-size: 0.85rem;
            }

            .hero h1 {
                font-size: 2.25rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .nav-links {
                gap: 0.75rem;
                font-size: 0.75rem;
            }

            .cta-btn {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .hero {
                margin-top: 60px;
            }

            .hero h1 {
                font-size: 1.75rem;
            }

            .hero p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.navigation')
    
    @yield('content')
    
    @include('partials.footer')

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Smooth scroll animation for cards on view
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
