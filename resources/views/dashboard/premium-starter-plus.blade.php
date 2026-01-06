<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Premium+ - EatJoy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #9C27B0;
            --secondary: #673AB7;
            --accent: #00BCD4;
            --light: #F3E5F5;
            --dark: #4A148C;
            --gradient: linear-gradient(135deg, #9C27B0, #673AB7);
            --gradient-accent: linear-gradient(135deg, #00BCD4, #0097A7);
            --bg-gradient: linear-gradient(135deg, #f8f9fa 0%, #f5f0f9 50%, #f0f8fa 100%);
            --card-shadow: 0 10px 30px rgba(156, 39, 176, 0.15);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            background-attachment: fixed;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(156, 39, 176, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 188, 212, 0.05) 0%, transparent 50%);
            z-index: -1;
        }

        /* Premium Badge */
        .premium-plus-badge {
            background: var(--gradient);
            color: white;
            padding: 6px 18px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(156, 39, 176, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .premium-plus-badge::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        /* Navbar */
        .navbar-premium-plus {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            box-shadow: 0 5px 25px rgba(156, 39, 176, 0.15);
            border-bottom: 3px solid var(--primary);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 12px 0;
        }

        /* Sidebar */
        .sidebar-plus {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            min-height: calc(100vh - 73px);
            box-shadow: 5px 0 25px rgba(0,0,0,0.08);
            border-right: 1px solid rgba(156, 39, 176, 0.1);
            position: sticky;
            top: 73px;
        }

        .sidebar-item-plus {
            padding: 14px 24px;
            color: #555;
            text-decoration: none;
            display: block;
            border-left: 5px solid transparent;
            transition: all 0.3s ease;
            margin: 6px 0;
            border-radius: 0 15px 15px 0;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .sidebar-item-plus::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, rgba(156, 39, 176, 0.1) 0%, rgba(156, 39, 176, 0.05) 100%);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .sidebar-item-plus:hover, .sidebar-item-plus.active {
            color: var(--primary);
            border-left: 5px solid var(--primary);
            transform: translateX(8px);
        }

        .sidebar-item-plus:hover::before, .sidebar-item-plus.active::before {
            width: 100%;
        }

        .sidebar-item-plus i {
            width: 26px;
            text-align: center;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        /* Main Content */
        .main-content-plus {
            padding: 30px;
            position: relative;
        }

        /* Card Premium */
        .card-premium-plus {
            border: none;
            border-radius: 22px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            border-top: 5px solid var(--primary);
            background: rgba(255, 255, 255, 0.98);
            position: relative;
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
        }

        .card-premium-plus::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
        }

        .card-premium-plus:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(156, 39, 176, 0.25);
        }

        /* Card Header */
        .card-header-premium-plus {
            background: var(--gradient);
            color: white;
            border-radius: 22px 22px 0 0 !important;
            padding: 22px 30px;
            border: none;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .card-header-premium-plus::after {
            content: 'PREMIUM+';
            position: absolute;
            top: 8px;
            right: 15px;
            font-size: 0.75rem;
            opacity: 0.2;
            font-weight: 800;
            letter-spacing: 2px;
        }

        /* Buttons */
        .btn-premium-plus {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(156, 39, 176, 0.4);
        }

        .btn-premium-plus:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(156, 39, 176, 0.5);
            color: white;
        }

        .btn-premium-plus::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .btn-premium-plus:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(40, 40);
                opacity: 0;
            }
        }

        .btn-ai {
            background: var(--gradient-accent);
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 188, 212, 0.4);
        }

        .btn-ai:hover {
            background: linear-gradient(135deg, #00ACC1, #00838F);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 188, 212, 0.5);
        }

        /* Daily Menu Card */
        .daily-menu-card-plus {
            background: linear-gradient(135deg, rgba(243, 229, 245, 0.95), rgba(225, 190, 231, 0.95));
            border-radius: 22px;
            padding: 28px;
            border: 3px solid var(--primary);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .daily-menu-card-plus::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 3s infinite;
        }

        /* REMOVED: Bintang dan 5x badge dihapus sesuai permintaan */
        .daily-menu-card-plus::after,
        .refresh-badge-plus {
            display: none !important;
        }

        .menu-icon-plus {
            width: 65px;
            height: 65px;
            background: var(--gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 8px 25px rgba(156, 39, 176, 0.5);
            position: relative;
            z-index: 2;
        }

        /* AI Chat Container */
        .ai-chat-container {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 22px;
            border: 3px solid #00BCD4;
            height: 480px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 35px rgba(0, 188, 212, 0.2);
        }

        .ai-chat-header {
            background: var(--gradient-accent);
            color: white;
            padding: 20px;
            font-weight: 600;
            border-radius: 19px 19px 0 0;
        }

        .ai-chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            background: linear-gradient(180deg, #fafafa 0%, #f0f7f9 100%);
        }

        .ai-chat-input {
            border-top: 2px solid rgba(0, 0, 0, 0.08);
            padding: 20px;
            background: white;
        }

        /* Messages */
        .message-ai {
            background: white;
            border-radius: 20px 20px 20px 8px;
            padding: 16px 22px;
            margin-bottom: 16px;
            max-width: 88%;
            border: 2px solid #E1BEE7;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }

        .message-ai::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: var(--gradient-accent);
        }

        .message-user {
            background: linear-gradient(135deg, var(--light), #E1BEE7);
            border-radius: 20px 20px 8px 20px;
            padding: 16px 22px;
            margin-bottom: 16px;
            max-width: 88%;
            margin-left: auto;
            border: 2px solid #CE93D8;
            box-shadow: 0 5px 15px rgba(156, 39, 176, 0.15);
        }

        /* Feature Tags */
        .feature-tag-plus {
            display: inline-block;
            background: rgba(156, 39, 176, 0.18);
            color: var(--primary);
            padding: 8px 18px;
            border-radius: 25px;
            font-size: 0.85rem;
            margin-right: 10px;
            margin-bottom: 10px;
            border: 2px solid rgba(156, 39, 176, 0.3);
            backdrop-filter: blur(10px);
            font-weight: 500;
            transition: all 0.3s;
        }

        .feature-tag-plus:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(156, 39, 176, 0.2);
        }

        /* Stats Cards */
        .stats-card-plus {
            text-align: center;
            padding: 24px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(243, 229, 245, 0.8);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
            height: 100%;
        }

        .stats-card-plus:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 18px 40px rgba(156, 39, 176, 0.2);
            border-color: var(--primary);
        }

        .stats-card-plus i {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 15px;
            display: inline-block;
            padding: 15px;
            border-radius: 15px;
            background: rgba(156, 39, 176, 0.1);
        }

        .stats-card-plus.ai i {
            color: #00BCD4;
            background: rgba(0, 188, 212, 0.1);
        }

        .stats-card-plus h4 {
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 2.2rem;
        }

        .stats-card-plus p {
            color: #666;
            font-size: 0.95rem;
            margin: 0;
            font-weight: 500;
        }

        .stats-card-plus small {
            display: block;
            margin-top: 8px;
            font-weight: 600;
        }

        /* User Avatar */
        .user-avatar-plus {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 6px 20px rgba(156, 39, 176, 0.5);
            border: 3px solid white;
        }

        .notification-badge-plus {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #FF4081, #F50057);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(255, 64, 129, 0.4);
            font-weight: bold;
            border: 2px solid white;
        }

        /* Progress Circle */
        .progress-circle-plus {
            width: 130px;
            height: 130px;
            margin: 0 auto 20px;
        }

        .progress-circle-container-plus {
            position: relative;
            width: 160px;
            height: 160px;
            margin: 0 auto 25px;
        }

        .progress-circle-text-plus {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-weight: bold;
            color: var(--primary);
        }

        .progress-circle-text-plus h2 {
            margin-bottom: 0;
            font-weight: 800;
            font-size: 2.5rem;
        }

        .progress-circle-text-plus small {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }

        /* Meal Plan Cards */
        .meal-plan-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 18px;
            border: 2px solid rgba(225, 190, 231, 0.8);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .meal-plan-card:hover {
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(156, 39, 176, 0.2);
            transform: translateY(-5px) scale(1.02);
        }

        /* Daily Planner Tasks - PERBAIKAN BESAR */
        .planner-task-plus {
            padding: 20px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 16px;
            margin-bottom: 14px;
            border-left: 6px solid var(--accent);
            transition: all 0.4s ease;
            border: 2px solid rgba(238, 238, 238, 0.8);
            position: relative;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }

        .planner-task-plus:hover {
            transform: translateX(8px) translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-left: 6px solid var(--primary);
        }

        /* IMPROVED CHECKBOX - Lebih besar dan mudah diklik */
        .planner-checkbox-plus {
            width: 28px !important;
            height: 28px !important;
            border-radius: 8px !important;
            border: 3px solid var(--primary) !important;
            cursor: pointer;
            position: relative;
            margin-right: 15px;
            background-color: white;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .planner-checkbox-plus:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .planner-checkbox-plus:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 18px;
            font-weight: bold;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .task-checkbox-label {
            padding-left: 10px !important;
            cursor: pointer;
            flex-grow: 1;
            margin-left: 5px;
        }

        /* Task badges lebih rapi */
        .task-badge-plus {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 12px;
            background: #e0e0e0;
            color: #666;
            font-weight: 600;
            z-index: 1;
        }

        .admin-badge-plus {
            background: linear-gradient(135deg, #E1BEE7, #CE93D8);
            color: #7B1FA2;
        }

        .user-badge-plus {
            background: linear-gradient(135deg, #BBDEFB, #90CAF9);
            color: #1565C0;
        }

        /* Recipe Grid Premium */
        .recipe-grid-plus {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 35px;
        }

        .recipe-card-premium-plus {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 8px 30px rgba(156, 39, 176, 0.15);
            border: 2px solid rgba(243, 229, 245, 0.8);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .recipe-card-premium-plus::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .recipe-card-premium-plus:hover {
            border-color: var(--primary);
            box-shadow: 0 15px 40px rgba(156, 39, 176, 0.25);
            transform: translateY(-10px) scale(1.03);
        }

        .recipe-card-premium-plus h6 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            line-height: 1.4;
            font-size: 1.1rem;
        }

        .recipe-card-premium-plus .recipe-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 18px;
            line-height: 1.5;
        }

        .recipe-stats-plus {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-top: 12px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .recipe-stats-plus small {
            font-size: 0.85rem;
            font-weight: 500;
        }

        .premium-label-plus {
            background: var(--gradient);
            color: white;
            padding: 6px 15px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 12px;
            box-shadow: 0 4px 12px rgba(156, 39, 176, 0.3);
            letter-spacing: 0.5px;
        }

        /* Chart Container */
        .chart-container-plus {
            position: relative;
            height: 350px;
            width: 100%;
            background: white;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        /* Weight Input Form */
        .weight-input-form-plus {
            background: rgba(255, 255, 255, 0.98);
            padding: 28px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            border: 2px solid rgba(156, 39, 176, 0.1);
            backdrop-filter: blur(10px);
        }

        /* Pagination */
        .pagination-container-plus {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .pagination .page-item.active .page-link {
            background: var(--gradient);
            border-color: var(--primary);
            color: white;
            box-shadow: 0 4px 15px rgba(156, 39, 176, 0.3);
        }

        .pagination .page-link {
            color: var(--primary);
            margin: 0 5px;
            border-radius: 12px;
            border: 2px solid #dee2e6;
            padding: 10px 18px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .pagination .page-link:hover {
            background-color: rgba(156, 39, 176, 0.1);
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        /* Settings Modal IMPROVED */
        .settings-modal-content-plus {
            border-radius: 25px;
            overflow: hidden;
            border: 4px solid var(--primary);
            box-shadow: 0 25px 50px rgba(156, 39, 176, 0.3);
        }

        .settings-item-plus {
            padding: 20px 25px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            background: white;
        }

        .settings-item-plus:hover {
            background: linear-gradient(90deg, rgba(243, 229, 245, 0.3) 0%, rgba(243, 229, 245, 0.1) 100%);
            transform: translateX(5px);
        }

        .settings-item-plus:last-child {
            border-bottom: none;
        }

        .settings-label-plus {
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1rem;
        }

        .settings-label-plus i {
            font-size: 1.2rem;
            width: 30px;
        }

        /* Form Switch Premium */
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(156, 39, 176, 0.25);
        }

        /* Blog/Article Section NEW */
        .blog-section-plus {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(250, 245, 255, 0.95));
            border-radius: 22px;
            padding: 25px;
            border: 3px solid rgba(156, 39, 176, 0.2);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
        }

        .blog-card-plus {
            background: white;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 20px;
            border: 2px solid rgba(225, 190, 231, 0.8);
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        .blog-card-plus::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--gradient-accent);
        }

        .blog-card-plus:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 40px rgba(156, 39, 176, 0.2);
            border-color: var(--primary);
        }

        .blog-category-plus {
            display: inline-block;
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.15), rgba(103, 58, 183, 0.15));
            color: var(--primary);
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .blog-read-time-plus {
            color: #666;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        /* Recipe Modal Premium IMPROVED */
        .recipe-modal-premium-plus {
            border-radius: 30px;
            overflow: hidden;
            border: 4px solid var(--primary);
            box-shadow: 0 30px 60px rgba(156, 39, 176, 0.4);
        }

        .recipe-modal-header-plus {
            background: var(--gradient);
            color: white;
            padding: 35px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .recipe-modal-header-plus::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 30% 30%, rgba(255,255,255,0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 70%, rgba(255,255,255,0.1) 0%, transparent 50%);
        }

        .recipe-modal-content-plus {
            padding: 35px;
            background: linear-gradient(135deg, #fff 0%, #faf5ff 100%);
            max-height: 70vh;
            overflow-y: auto;
        }

        .recipe-image-container-plus {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            border: 4px solid white;
            margin-bottom: 25px;
            position: relative;
        }

        .recipe-stats-plus-premium {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.15), rgba(103, 58, 183, 0.15));
            border-radius: 18px;
            padding: 20px;
            margin: 25px 0;
            border: 2px solid rgba(156, 39, 176, 0.2);
        }

        .ingredient-card-plus {
            background: white;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 12px;
            border-left: 5px solid var(--accent);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
        }

        .ingredient-card-plus:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .step-card-plus {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--primary);
        }

        .step-number-plus {
            position: absolute;
            top: -15px;
            left: -15px;
            background: var(--gradient);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 6px 20px rgba(156, 39, 176, 0.4);
            border: 3px solid white;
        }

        /* Delete Button */
        .delete-btn-plus {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff4757, #ff3838);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(255, 71, 87, 0.4);
            z-index: 2;
        }

        .planner-task-plus:hover .delete-btn-plus {
            opacity: 1;
            transform: scale(1.1);
        }

        /* Toast Container */
        .toast-container-plus {
            z-index: 9999;
            position: fixed;
            top: 20px;
            right: 20px;
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        .float-animation {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(156, 39, 176, 0.7); }
            70% { box-shadow: 0 0 0 20px rgba(156, 39, 176, 0); }
            100% { box-shadow: 0 0 0 0 rgba(156, 39, 176, 0); }
        }

        .pulse-animation {
            animation: pulse 3s infinite;
        }

        /* Refresh Button Improvement */
        .refresh-button-plus {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .refresh-button-plus:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }

        .refresh-button-plus.loading {
            pointer-events: none;
        }

        .refresh-button-plus.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .recipe-grid-plus {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .sidebar-plus {
                min-height: auto;
                position: relative;
                top: 0;
            }

            .main-content-plus {
                padding: 20px;
            }

            .stats-card-plus h4 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .recipe-grid-plus {
                grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
            }

            .daily-menu-card-plus {
                padding: 20px;
            }

            .ai-chat-container {
                height: 400px;
            }

            .card-premium-plus {
                margin-bottom: 20px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(243, 229, 245, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }

        /* Selection Color */
        ::selection {
            background: rgba(156, 39, 176, 0.3);
            color: var(--dark);
        }

        /* Focus Styles */
        :focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(156, 39, 176, 0.1);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-premium-plus navbar-expand-lg py-3">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <a class="navbar-brand fw-bold text-dark" href="{{ route('dashboard.premium.starter.plus') }}">
                    <i class="bi bi-egg-fried me-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                    <span style="font-size: 1.4rem;">EatJoy</span>
                </a>
                <span class="premium-plus-badge ms-3">
                    <i class="bi bi-stars me-1"></i>STARTER+ ULTIMATE
                </span>
            </div>

            <div class="d-flex align-items-center">
                <!-- Real-time Clock -->
                <div class="me-4 d-none d-md-block">
                    <div class="text-end">
                        <div class="fw-bold current-time" style="font-size: 1.1rem; color: var(--primary);">
                            <i class="bi bi-clock me-1"></i>
                            <span class="time-with-seconds">{{ now()->format('H:i:s') }}</span>
                        </div>
                        <small class="text-muted current-date" style="font-size: 0.8rem;">
                            {{ now()->translatedFormat('l, d F Y') }}
                        </small>
                    </div>
                </div>

                <!-- AI Assistant Quick Access -->
                <div class="position-relative me-3">
                    <button class="btn btn-ai btn-sm" onclick="scrollToSection('ai-chat-section')">
                        <i class="bi bi-robot me-1"></i> AI Assistant
                    </button>
                    <span class="notification-badge-plus">AI</span>
                </div>

                <!-- User Menu -->
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center border-0" type="button" data-bs-toggle="dropdown" style="background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <div class="user-avatar-plus me-3">
                            {{ substr($user->nickname, 0, 2) }}
                        </div>
                        <div class="text-start">
                            <div class="fw-bold">{{ $user->nickname }}</div>
                            <small class="text-muted">Progress: {{ $progress['percentage'] ?? 0 }}%</small>
                        </div>
                        <i class="bi bi-chevron-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="border-radius: 15px; border: 2px solid var(--primary);">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModalPlus">
                            <i class="bi bi-person me-2" style="color: var(--primary);"></i>Profil Saya
                        </a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settingsModalPlus">
                            <i class="bi bi-gear me-2" style="color: #00BCD4;"></i>Pengaturan
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="bi bi-graph-up me-2" style="color: #4CAF50;"></i>Analytics Premium
                        </a></li>
                        <li><a class="dropdown-item" href="#blog-section" onclick="scrollToSection('blog-section')">
                            <i class="bi bi-newspaper me-2" style="color: #FF9800;"></i>Artikel & Tips
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 px-0">
                <div class="sidebar-plus">
                    <div class="p-4">
                        <h5 class="fw-bold mb-4" style="color: var(--primary);">
                            <i class="bi bi-stars me-2"></i> Fitur Premium+
                        </h5>
                        <a href="{{ route('dashboard.premium.starter.plus') }}" class="sidebar-item-plus {{ Request::route()->getName() == 'dashboard.premium.starter.plus' ? 'active' : '' }}">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                        <a href="{{ route('recipes.my') }}" class="sidebar-item-plus">
                            <i class="bi bi-journal"></i> My Menu
                        </a>
                        <a href="{{ route('recipes.create') }}" class="sidebar-item-plus">
                            <i class="bi bi-plus-circle"></i> Create Menu
                        </a>
                        <a href="#daily-planner-section" class="sidebar-item-plus" onclick="scrollToSection('daily-planner-section')">
                            <i class="bi bi-calendar-check"></i> Daily Planner
                        </a>
                        <a href="#ai-chat-section" class="sidebar-item-plus" onclick="scrollToSection('ai-chat-section')">
                            <i class="bi bi-robot"></i> AI Assistant
                        </a>
                        <a href="#recipes-section" class="sidebar-item-plus" onclick="scrollToSection('recipes-section')">
                            <i class="bi bi-egg-fried"></i> 24+ Menu Diet
                        </a>
                        <a href="#progress-section" class="sidebar-item-plus" onclick="scrollToSection('progress-section')">
                            <i class="bi bi-bar-chart"></i> Progress Tracker
                        </a>
                        <a href="#blog-section" class="sidebar-item-plus" onclick="scrollToSection('blog-section')">
                            <i class="bi bi-newspaper"></i> Artikel & Tips
                        </a>
                        <a href="{{ route('subscription.plans') }}" class="sidebar-item-plus">
                            <i class="bi bi-credit-card"></i> Subscription
                        </a>
                    </div>

                    <!-- Paket Aktif Card -->
                    <div class="p-4 mt-4">
                        <div class="card-premium-plus pulse-animation">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-stars display-5 mb-3" style="color: var(--primary);"></i>
                                <small class="text-muted">Paket Premium Ultimate</small>
                                <h5 class="fw-bold mt-2 mb-3" style="color: var(--primary);">EatJoy Starter+</h5>
                                <p class="text-muted small mb-3">Berlaku hingga: {{ now()->addDays(30)->format('d M Y') }}</p>

                                <div class="mb-4">
                                    <div class="progress" style="background: rgba(225, 190, 231, 0.3); height: 10px; border-radius: 5px;">
                                        <div class="progress-bar" style="width: {{ $progress['percentage'] ?? 0 }}%; background: var(--gradient); border-radius: 5px;"></div>
                                    </div>
                                    <small class="text-muted">Progress: {{ $progress['percentage'] ?? 0 }}%</small>
                                </div>

                                <div class="d-grid gap-2">
                                    <span class="unlimited-badge" style="background: linear-gradient(135deg, #4CAF50, #2E7D32); color: white; padding: 8px 15px; border-radius: 12px; font-size: 0.85rem; font-weight: 700; box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);">
                                        <i class="bi bi-infinity me-1"></i> UNLIMITED FEATURES
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10">
                <div class="main-content-plus">
                    <!-- Welcome Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card-premium-plus">
                                <div class="card-body p-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <div class="d-flex align-items-center mb-3">
                                                <h3 class="fw-bold mb-0">
                                                    <span class="time-greeting">
                                                        @php
                                                            $hour = now()->hour;
                                                            if ($hour >= 5 && $hour < 12) echo 'Selamat Pagi';
                                                            elseif ($hour >= 12 && $hour < 15) echo 'Selamat Siang';
                                                            elseif ($hour >= 15 && $hour < 18) echo 'Selamat Sore';
                                                            else echo 'Selamat Malam';
                                                        @endphp
                                                    </span>,
                                                    {{ $user->nickname }}! 👑
                                                </h3>
                                            </div>

                                            <p class="text-muted mb-2 current-date">
                                                {{ now()->translatedFormat('l, d F Y') }} •
                                                <span class="current-time">{{ now()->format('H:i:s') }}</span>
                                            </p>

                                            <p class="text-muted mb-4">
                                                Selamat datang di <strong class="text-primary">EatJoy Starter+ Ultimate</strong>!
                                                Akses penuh semua fitur premium termasuk AI Assistant canggih dan menu eksklusif.
                                            </p>

                                            <div class="d-flex gap-3 flex-wrap">
                                                <span class="feature-tag-plus"><i class="bi bi-stars me-1"></i> AI Assistant Pro</span>
                                                <span class="feature-tag-plus"><i class="bi bi-arrow-repeat me-1"></i> Unlimited Refresh</span>
                                                <span class="feature-tag-plus"><i class="bi bi-infinity me-1"></i> Menu Tak Terbatas</span>
                                                <span class="feature-tag-plus feature-tag-ai"><i class="bi bi-graph-up me-1"></i> Analytics Pro</span>
                                                <span class="feature-tag-plus"><i class="bi bi-shield-check me-1"></i> Priority Support</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="daily-menu-card-plus">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="menu-icon-plus me-3 float-animation">
                                                        <i class="bi bi-stars"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="fw-bold mb-0">Menu Hari Ini</h5>
                                                        <small class="text-muted">{{ now()->translatedFormat('l, d F Y') }}</small>
                                                    </div>
                                                </div>
                                                <h4 class="fw-bold mb-3" id="dailyMenuName">{{ $dailyMenu['name'] ?? 'Menu Personal Premium' }}</h4>
                                                <p class="text-muted mb-3" id="dailyMenuInfo">
                                                    <i class="bi bi-fire"></i> <span id="dailyMenuCalories">{{ $dailyMenu['calories'] ?? '350' }}</span> Kalori •
                                                    <i class="bi bi-clock"></i> <span id="dailyMenuTime">{{ $dailyMenu['time'] ?? '20 menit' }}</span>
                                                </p>
                                                <div class="d-flex gap-3">
                                                    <button class="btn-premium-plus btn-sm w-50 refresh-button-plus"
                                                        id="refreshMenuBtn"
                                                        data-refresh-left="unlimited"
                                                        data-user-id="{{ $user->id }}"
                                                        data-plan="starter_plus">
                                                    <i class="bi bi-arrow-clockwise"></i> Refresh Menu (Unlimited)
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Overview -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4">
                            <div class="stats-card-plus">
                                <i class="bi bi-graph-up-arrow"></i>
                                <h4>{{ $progress['percentage'] ?? 0 }}%</h4>
                                <p>Progress Diet</p>
                                <small class="text-primary">{{ $progress['weight_lost'] ?? '0.0' }}kg turun</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="stats-card-plus">
                                <i class="bi bi-robot"></i>
                                <h4>{{ $stats['ai_interactions'] ?? 24 }}</h4>
                                <p>Interaksi AI</p>
                                <small class="text-info">Chat dengan AI Pro</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="stats-card-plus">
                                <i class="bi bi-fire"></i>
                                <h4>{{ $userRecipes->count() ?? 0 }}</h4>
                                <p>Menu Dibuat</p>
                                <small class="text-warning">Total menu premium</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="stats-card-plus ai">
                                <i class="bi bi-lightning"></i>
                                <h4>{{ $progress['streak_days'] ?? 0 }}</h4>
                                <p>Day Streak</p>
                                <small class="text-success">Hari konsisten</small>
                            </div>
                        </div>
                    </div>

                    <!-- Main Dashboard Content -->
                    <div class="row">
                        <!-- Left Column - Features -->
                        <div class="col-lg-8">
                            <!-- 24+ Menu Diet Section -->
                            <div id="recipes-section" class="card-premium-plus mb-4">
                                <div class="card-header-premium-plus">
                                    <h5 class="mb-0">
                                        <i class="bi bi-egg-fried me-2"></i> 24+ Menu Diet Premium+
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <p class="text-muted mb-4">Koleksi eksklusif menu diet premium untuk member Starter+ Ultimate</p>

                                    <div class="recipe-grid-plus" id="recipeGridPlus">
                                        <!-- Recipes will be loaded here via JavaScript -->
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-container-plus">
                                        <nav aria-label="Recipe navigation">
                                            <ul class="pagination" id="recipePaginationPlus">
                                                <!-- Pagination will be generated by JavaScript -->
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <!-- Daily Planner Section - IMPROVED -->
                            <div id="daily-planner-section" class="card-premium-plus mb-4">
                                <div class="card-header-premium-plus">
                                    <h5 class="mb-0">
                                        <i class="bi bi-calendar-check me-2"></i> Daily Planner Premium
                                        <span class="badge bg-light text-dark ms-3" id="progressBadgePlus" style="font-size: 0.9rem; padding: 8px 15px; border-radius: 12px;">0/3 selesai</span>
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h6 class="fw-bold mb-4" style="color: var(--primary); font-size: 1.1rem;">Aktivitas Hari Ini</h6>
                                            <div id="plannerTasksPlus">
                                                <!-- Tasks loaded via JavaScript -->
                                            </div>

                                            <div class="text-center mt-4">
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addActivityModalPlus" style="border-radius: 10px; padding: 10px 20px;">
                                                    <i class="bi bi-plus me-1"></i> Tambah Aktivitas Baru
                                                </button>
                                                <small class="text-muted d-block mt-2">Maksimal 5 aktivitas buatan Anda</small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <h6 class="fw-bold mb-4" style="color: var(--primary); font-size: 1.1rem;">Progress Harian</h6>
                                            <div class="text-center p-4">
                                                <!-- Progress Circle -->
                                                <div class="progress-circle-container-plus">
                                                    <canvas id="dailyProgressCirclePlus" width="160" height="160"></canvas>
                                                    <div class="progress-circle-text-plus">
                                                        <h2 id="progressPercentagePlus">0%</h2>
                                                        <small>Selesai</small>
                                                    </div>
                                                </div>

                                                <!-- Progress Bar -->
                                                <div class="mb-4">
                                                    <div class="progress" style="background: rgba(225, 190, 231, 0.3); height: 12px; border-radius: 6px;">
                                                        <div class="progress-bar" id="dailyProgressBarPlus" style="width: 0%; background: var(--gradient); border-radius: 6px;"></div>
                                                    </div>
                                                    <small class="text-muted" id="progressTextPlus">0 dari 3 aktivitas selesai</small>
                                                </div>

                                                <!-- Stats -->
                                                <div class="row text-center mb-4">
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2" id="adminTasksCountPlus">3</h5>
                                                        <small class="text-muted">Default Tasks</small>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2" id="userTasksCountPlus">0</h5>
                                                        <small class="text-muted">Custom Tasks</small>
                                                    </div>
                                                </div>

                                                <button class="btn-premium-plus w-100" data-bs-toggle="modal" data-bs-target="#addActivityModalPlus">
                                                    <i class="bi bi-plus-circle me-2"></i> Tambah Aktivitas
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress Analytics Section -->
                            <div id="progress-section" class="card-premium-plus mb-4">
                                <div class="card-header-premium-plus">
                                    <h5 class="mb-0">
                                        <i class="bi bi-graph-up me-2"></i> Progress Berat Badan
                                        <small class="ms-3">Analisis Data Premium</small>
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart-container-plus">
                                                <canvas id="weightChartPlus"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="weight-input-form-plus">
                                                <h6 class="fw-bold mb-3">Update Berat Badan</h6>
                                                <form id="weightFormPlus">
                                                    <div class="mb-3">
                                                        <label class="form-label">Berat Badan (kg)</label>
                                                        <input type="number" class="form-control" id="weightInputPlus"
                                                               step="0.1" min="30" max="300"
                                                               placeholder="Contoh: 75.5" required
                                                               style="border-radius: 10px; padding: 12px; border: 2px solid rgba(156, 39, 176, 0.2);">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control" id="weightDatePlus"
                                                               value="{{ date('Y-m-d') }}" required
                                                               style="border-radius: 10px; padding: 12px; border: 2px solid rgba(156, 39, 176, 0.2);">
                                                    </div>
                                                    <button type="submit" class="btn-premium-plus w-100">
                                                        <i class="bi bi-save me-2"></i> Simpan Progress
                                                    </button>
                                                </form>
                                                <hr class="my-4">
                                                <div class="text-center">
                                                    <h6 class="fw-bold mb-3">Statistik Progress</h6>
                                                    <p class="mb-2">Berat Awal: <strong><span id="initialWeightPlus">{{ $user->initial_weight ?? $user->current_weight }}</span> kg</strong></p>
                                                    <p class="mb-2">Target: <strong><span id="targetWeightPlus">{{ $user->target_weight }}</span> kg</strong></p>
                                                    <p class="mb-2">Selisih: <strong><span id="weightDifferencePlus">{{ number_format($user->weight_difference, 1) }}</span> kg</strong></p>
                                                    <p class="mb-0">Progress: <strong class="text-primary" style="font-size: 1.1rem;"><span id="currentProgressPlus">{{ $progress['percentage'] ?? 0 }}</span>%</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - AI, Blog & Quick Stats -->
                        <div class="col-lg-4">
                            <!-- AI Chat Assistant Section -->
                            <div id="ai-chat-section" class="card-premium-plus mb-4">
                                <div class="card-header-premium-plus">
                                    <h5 class="mb-0">
                                        <i class="bi bi-robot me-2"></i> AI Assistant Premium
                                        <small class="ms-3">Powered by DeepSeek AI</small>
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="ai-chat-container">
                                        <div class="ai-chat-header">
                                            <i class="bi bi-robot me-2"></i> AI Diet Assistant Pro
                                            <small class="float-end"><i class="bi bi-circle-fill text-success me-1"></i>Online</small>
                                        </div>
                                        <div class="ai-chat-messages" id="aiChatMessages">
                                            <div class="message-ai">
                                                <strong>🤖 AI Assistant Pro:</strong><br>
                                                Halo! Saya AI Assistant Premium EJOY dengan akses data real-time. Saya siap membantu program diet premium Anda. Apa yang ingin Anda tanyakan tentang diet, nutrisi, atau menu makanan eksklusif?
                                                <div class="text-end">
                                                    <small class="text-muted">{{ now()->format('H:i') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ai-chat-input">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="aiMessageInput"
                                                       placeholder="Tanya AI tentang diet, nutrisi, atau menu premium..."
                                                       onkeypress="if(event.keyCode==13) sendAIMessage()"
                                                       style="border-radius: 10px; padding: 12px; border: 2px solid rgba(0, 188, 212, 0.3);">
                                                <button class="btn-premium-plus" onclick="sendAIMessage()" style="border-radius: 10px; margin-left: 10px;">
                                                    <i class="bi bi-send"></i>
                                                </button>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <small class="text-muted">Contoh: "Menu premium untuk turun 5kg dalam 1 bulan"</small>
                                                <small class="text-info fw-bold">
                                                    <i class="bi bi-infinity me-1"></i> Unlimited AI Chat
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h6 class="fw-bold mb-3">Quick Questions Premium:</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button class="btn btn-outline-primary btn-sm" onclick="askQuickQuestion('Bagaimana cara menurunkan berat badan dengan sehat menggunakan metode premium?')" style="border-radius: 8px; padding: 8px 15px;">
                                                    Tips Diet Pro
                                                </button>
                                                <button class="btn btn-outline-primary btn-sm" onclick="askQuickQuestion('Menu sarapan premium yang baik untuk diet cepat?')" style="border-radius: 8px; padding: 8px 15px;">
                                                    Menu Premium
                                                </button>
                                                <button class="btn btn-outline-primary btn-sm" onclick="askQuickQuestion('Olahraga intensitas tinggi untuk membakar lemak dengan cepat?')" style="border-radius: 8px; padding: 8px 15px;">
                                                    Workout Pro
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog/Article Section NEW -->
                            <div id="blog-section" class="blog-section-plus mb-4">
                                <h5 class="fw-bold mb-4" style="color: var(--primary);">
                                    <i class="bi bi-newspaper me-2"></i> Artikel & Tips Terbaru
                                </h5>

                                <div class="blog-card-plus">
                                    <span class="blog-category-plus">NUTRISI PREMIUM</span>
                                    <h6 class="fw-bold mb-2">5 Superfood Premium untuk Diet Cepat</h6>
                                    <p class="text-muted small mb-3">Temukan makanan super eksklusif yang dapat mempercepat proses diet Anda hingga 40% lebih efektif...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="blog-read-time-plus"><i class="bi bi-clock"></i> 5 min read</small>
                                        <button class="btn btn-sm btn-premium-plus" onclick="readArticle(1)">
                                            <i class="bi bi-book me-1"></i> Baca
                                        </button>
                                    </div>
                                </div>

                                <div class="blog-card-plus">
                                    <span class="blog-category-plus">WORKOUT</span>
                                    <h6 class="fw-bold mb-2">HIIT Workout 20 Menit untuk Pembakaran Maksimal</h6>
                                    <p class="text-muted small mb-3">Rutinitas olahraga intensitas tinggi yang dapat membakar hingga 500 kalori dalam 20 menit...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="blog-read-time-plus"><i class="bi bi-clock"></i> 7 min read</small>
                                        <button class="btn btn-sm btn-premium-plus" onclick="readArticle(2)">
                                            <i class="bi bi-book me-1"></i> Baca
                                        </button>
                                    </div>
                                </div>

                                <div class="blog-card-plus">
                                    <span class="blog-category-plus">MINDSET</span>
                                    <h6 class="fw-bold mb-2">Teknik Mindfulness untuk Mengatasi Emotional Eating</h6>
                                    <p class="text-muted small mb-3">Strategi canggih mengendalikan makan berlebihan saat stres berdasarkan penelitian terbaru...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="blog-read-time-plus"><i class="bi bi-clock"></i> 8 min read</small>
                                        <button class="btn btn-sm btn-premium-plus" onclick="readArticle(3)">
                                            <i class="bi bi-book me-1"></i> Baca
                                        </button>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="#" class="text-primary fw-bold" style="text-decoration: none; font-size: 0.95rem;">
                                        <i class="bi bi-arrow-right-circle me-1"></i> Lihat Semua Artikel Premium
                                    </a>
                                </div>
                            </div>

                            <!-- Quick Stats -->
                            <div class="card-premium-plus">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-4">
                                        <i class="bi bi-speedometer2 me-2"></i> Statistik Premium+
                                    </h5>
                                    <div class="row text-center">
                                        <div class="col-6 mb-4">
                                            <div class="stats-card-plus">
                                                <i class="bi bi-robot"></i>
                                                <h5>{{ $stats['ai_requests'] ?? 42 }}</h5>
                                                <small>AI Requests</small>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="stats-card-plus">
                                                <i class="bi bi-lightning"></i>
                                                <h5>{{ $userRecipes->count() ?? 0 }}</h5>
                                                <small>Menu Dibuat</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stats-card-plus">
                                                <i class="bi bi-graph-up"></i>
                                                <h5>{{ $progress['percentage'] ?? 0 }}%</h5>
                                                <small>Progress</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stats-card-plus">
                                                <i class="bi bi-award"></i>
                                                <h5>{{ $refreshLeft ?? 5 }}</h5>
                                                <small>Refresh Tersisa</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MODALS ==================== -->

    <!-- Recipe Modal Premium+ - IMPROVED -->
    <div class="modal fade" id="recipeModalPlus" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content recipe-modal-premium-plus">
                <div class="recipe-modal-header-plus">
                    <h4 class="modal-title mb-2" id="recipeModalTitlePlus"></h4>
                    <p class="mb-0 opacity-85" id="recipeModalSubtitlePlus"></p>
                </div>
                <div class="recipe-modal-content-plus" id="recipeModalBodyPlus">
                    <!-- Recipe details loaded via JavaScript -->
                </div>
                <div class="modal-footer border-top-0 p-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 12px; padding: 10px 25px;">Tutup</button>
                    <button type="button" class="btn-premium-plus" onclick="addToPlanner()" style="border-radius: 12px; padding: 10px 25px;">
                        <i class="bi bi-calendar-plus me-2"></i> Tambah ke Planner
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Activity Modal -->
    <div class="modal fade" id="addActivityModalPlus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: 3px solid var(--primary);">
                <div class="modal-header" style="background: var(--gradient); color: white;">
                    <h5 class="modal-title">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Aktivitas
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="activityFormPlus">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Nama Aktivitas</label>
                            <input type="text" class="form-control" id="activityNamePlus" placeholder="Contoh: Minum air 500ml, Push-up 30x, etc" required
                                   style="border-radius: 10px; padding: 12px; border: 2px solid rgba(156, 39, 176, 0.3);">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Waktu</label>
                            <input type="time" class="form-control" id="activityTimePlus" value="{{ date('H:i') }}" required
                                   style="border-radius: 10px; padding: 12px; border: 2px solid rgba(156, 39, 176, 0.3);">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Kalori (Opsional)</label>
                            <input type="number" class="form-control" id="activityCaloriesPlus" placeholder="Contoh: 150 (kosongkan jika 0)"
                                   style="border-radius: 10px; padding: 12px; border: 2px solid rgba(156, 39, 176, 0.3);">
                            <small class="text-muted mt-2 d-block">Gunakan tanda minus (-) untuk kalori yang dibakar (olahraga)</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px; padding: 10px 20px;">Batal</button>
                    <button type="button" class="btn-premium-plus" onclick="addActivityPlus()" style="border-radius: 10px; padding: 10px 20px;">Tambah Aktivitas</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModalPlus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: 3px solid var(--primary);">
                <div class="modal-header" style="background: var(--gradient); color: white;">
                    <h5 class="modal-title">
                        <i class="bi bi-person me-2"></i> Profil Premium Saya
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="user-avatar-plus mx-auto mb-3" style="width: 90px; height: 90px; font-size: 1.8rem;">
                            {{ substr($user->nickname, 0, 2) }}
                        </div>
                        <h4>{{ $user->nickname }}</h4>
                        <p class="text-muted">{{ $user->email ?? 'premium@eatjoy.com' }}</p>
                        <span class="premium-plus-badge">
                            <i class="bi bi-stars me-1"></i>STARTER+ ULTIMATE
                        </span>
                    </div>

                    <div class="row text-center mb-4">
                        <div class="col-6">
                            <h5 class="fw-bold">{{ $user->current_weight ?? '0' }} kg</h5>
                            <small class="text-muted">Berat Sekarang</small>
                        </div>
                        <div class="col-6">
                            <h5 class="fw-bold">{{ $user->target_weight ?? '0' }} kg</h5>
                            <small class="text-muted">Target Berat</small>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">Info Akun Premium</h6>
                        <p><strong>Member sejak:</strong> {{ $user->created_at->format('d M Y') ?? 'Jan 2024' }}</p>
                        <p><strong>Paket:</strong> EatJoy Starter+ Ultimate</p>
                        <p><strong>Berlaku hingga:</strong> {{ now()->addDays(30)->format('d M Y') }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success" style="border-radius: 10px; padding: 5px 10px;">AKTIF</span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px; padding: 10px 20px;">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Modal IMPROVED -->
    <div class="modal fade" id="settingsModalPlus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content settings-modal-content-plus">
                <div class="modal-header" style="background: var(--gradient); color: white;">
                    <h5 class="modal-title">
                        <i class="bi bi-gear me-2"></i> Pengaturan Premium+
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-bell" style="color: var(--primary);"></i>
                            <span>Notifikasi Planner</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked style="background-color: var(--primary); border-color: var(--primary); height: 20px; width: 40px;">
                        </div>
                    </div>
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-droplet" style="color: #2196F3;"></i>
                            <span>Pengingat Minum Air</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked style="background-color: #2196F3; border-color: #2196F3; height: 20px; width: 40px;">
                        </div>
                    </div>
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-arrow-clockwise" style="color: #4CAF50;"></i>
                            <span>Auto-refresh Menu</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" style="background-color: #4CAF50; border-color: #4CAF50; height: 20px; width: 40px;">
                        </div>
                    </div>
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-moon" style="color: #673AB7;"></i>
                            <span>Mode Gelap Otomatis</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" style="background-color: #673AB7; border-color: #673AB7; height: 20px; width: 40px;">
                        </div>
                    </div>
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-translate" style="color: #FF9800;"></i>
                            <span>Bahasa</span>
                        </div>
                        <select class="form-select form-select-sm" style="width: 130px; border-radius: 10px; border: 2px solid rgba(0,0,0,0.1);">
                            <option selected>🇮🇩 Indonesia</option>
                            <option>🇺🇸 English</option>
                        </select>
                    </div>
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-shield-check" style="color: #009688;"></i>
                            <span>Privasi Data Premium</span>
                        </div>
                        <button class="btn btn-sm btn-outline-primary" style="border-radius: 8px; padding: 5px 15px;">Kelola</button>
                    </div>
                    <div class="settings-item-plus">
                        <div class="settings-label-plus">
                            <i class="bi bi-database" style="color: #795548;"></i>
                            <span>Backup Data Otomatis</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked style="background-color: #795548; border-color: #795548; height: 20px; width: 40px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px; padding: 10px 20px;">Batal</button>
                    <button type="button" class="btn-premium-plus" onclick="saveSettingsPlus()" style="border-radius: 10px; padding: 10px 20px;">Simpan Pengaturan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ==================== GLOBAL VARIABLES ====================

        // Real-time clock update
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;

            document.querySelectorAll('.current-time').forEach(el => {
                el.textContent = timeString;
            });

            const greetingEl = document.querySelector('.time-greeting');
            const hour = now.getHours();
            if (greetingEl) {
                if (hour >= 5 && hour < 12) greetingEl.textContent = 'Selamat Pagi';
                else if (hour >= 12 && hour < 15) greetingEl.textContent = 'Selamat Siang';
                else if (hour >= 15 && hour < 18) greetingEl.textContent = 'Selamat Sore';
                else greetingEl.textContent = 'Selamat Malam';
            }
        }

        setInterval(updateClock, 1000);
        updateClock();

        // Weight data
        let weightDataPlus = {
            dates: JSON.parse('{!! json_encode($weightHistory["dates"] ?? []) !!}'),
            weights: JSON.parse('{!! json_encode($weightHistory["weights"] ?? []) !!}'),
            initialWeight: {{ $user->initial_weight ?? $user->current_weight }},
            targetWeight: {{ $user->target_weight }}
        };

        // Data resep premium (24 menu lengkap)
        const recipesPlus = [
            {
                id: 1,
                title: "Dada Ayam Bakar Lemon Herbs Premium+",
                description: "Dada ayam premium tanpa kulit yang dipanggang dengan bumbu lemon organik dan rempah-rempah pilihan, disajikan dengan buncis rebus dan quinoa premium",
                calories: 320,
                time: "25 menit",
                difficulty: "Mudah",
                premium: true,
                image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80",
                ingredients: [
                    "200 gram dada ayam fillet premium",
                    "2 sdt minyak zaitun extra virgin",
                    "1 buah lemon organik (peras)",
                    "1 sdt oregano segar",
                    "2 siung bawang putih premium",
                    "Garam laut Himalaya secukupnya",
                    "Lada hitam freshly ground",
                    "100 gram buncis organik",
                    "50 gram quinoa premium",
                    "Daun thyme segar untuk garnish"
                ],
                steps: [
                    "Lumuri dada ayam dengan air lemon, minyak zaitun, oregano cincang, bawang putih parut, garam, dan lada hitam. Diamkan selama 20 menit di kulkas",
                    "Panaskan grill pan dengan api sedang-tinggi, panggang ayam selama 6-7 menit per sisi hingga matang sempurna dan berwarna keemasan",
                    "Kukus buncis selama 5 menit hingga renyah tapi masih hijau segar",
                    "Masak quinoa sesuai petunjuk kemasan dengan kaldu ayam untuk rasa lebih kaya",
                    "Sajikan ayam panggang di atas quinoa, tambahkan buncis, beri perasan lemon segar dan taburi daun thyme"
                ],
                nutrition: {
                    protein: "42g",
                    carbs: "28g",
                    fat: "9g",
                    fiber: "7g",
                    sugar: "2g"
                },
                tips: "Untuk hasil terbaik, gunakan ayam organik dan lemon segar. Jangan overcook ayam agar tetap juicy."
            },
            // ... other 23 recipes tetap sama seperti sebelumnya
        ];

        // Daily Planner Variables untuk Premium+
        let plannerTasksPlus = [];
        let dailyProgressChartPlus = null;
        let currentPagePlus = 1;
        const recipesPerPagePlus = 8;

        // Admin default tasks untuk Premium+ (3 TASK)
        const adminDefaultTasksPlus = [
            { id: 1, task: "Sarapan sehat premium", time: "07:00", calories: 350, completed: false, type: "default" },
            { id: 2, task: "Minum air 500ml", time: "08:00", calories: 0, completed: false, type: "default" },
            { id: 3, task: "Olahraga ringan 30 menit", time: "09:00", calories: -250, completed: false, type: "default" }
        ];

        // Daily Menu templates
        const dailyMenus = [
            { name: "Oatmeal pisang dengan madu", calories: 320, time: "10 menit" },
            { name: "Nasi merah, ayam panggang, dan lalapan", calories: 420, time: "25 menit" },
            { name: "Sup sayur bening dengan tempe", calories: 350, time: "20 menit" },
            { name: "Smoothie bowl pisang dengan chia seed", calories: 310, time: "10 menit" },
            { name: "Tumis kangkung dengan tahu", calories: 330, time: "15 menit" },
            { name: "Salad sayur dengan telur rebus", calories: 300, time: "12 menit" },
            { name: "Soto ayam kuah bening", calories: 380, time: "25 menit" },
            { name: "Pepes ikan dengan urap sayur", calories: 410, time: "30 menit" },
            { name: "Capcay kuah dengan ayam suwir", calories: 360, time: "20 menit" },
            { name: "Pecel sayur dengan saus kacang ringan", calories: 390, time: "20 menit" },
            { name: "Nasi jagung dengan ikan bakar dan lalapan", calories: 430, time: "30 menit" },
            { name: "Sayur asem dengan tempe bacem", calories: 400, time: "25 menit" },
            { name: "Bubur kacang hijau rendah gula", calories: 320, time: "20 menit" },
            { name: "Gado-gado dengan saus kacang ringan", calories: 410, time: "20 menit" },
            { name: "Nasi merah dengan orak-arik telur dan sayur", calories: 390, time: "15 menit" },
            { name: "Wrap sayur dengan ayam panggang", calories: 370, time: "15 menit" },
            { name: "Yogurt dengan granola dan buah segar", calories: 300, time: "5 menit" },
            { name: "Tumis tahu dengan brokoli", calories: 280, time: "15 menit" },
            { name: "Nasi shirataki dengan ayam teriyaki", calories: 360, time: "20 menit" },
            { name: "Kentang panggang dengan salad sayur", calories: 340, time: "25 menit" },
            { name: "Sup krim jamur rendah lemak", calories: 330, time: "20 menit" },
            { name: "Chia pudding dengan susu almond", calories: 260, time: "5 menit" }
        ];

        // AI Chat Messages
        let aiChatMessages = [
            {
                role: 'ai',
                message: 'Halo! Saya AI Assistant Premium EJOY dengan akses data real-time. Saya siap membantu program diet premium Anda. Apa yang ingin Anda tanyakan tentang diet, nutrisi, atau menu makanan eksklusif?',
                time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
            }
        ];

        // ==================== DOCUMENT READY ====================
        document.addEventListener('DOMContentLoaded', function() {
            initWeightChartPlus();
            initDailyPlannerPlus();
            loadRecipesPlus();
            initAIChat();
            setupRefreshButton();
            updateClock();
            setupEventListeners();

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });

        // ==================== SETUP EVENT LISTENERS ====================
        function setupEventListeners() {
            // Weight form submission
            document.getElementById('weightFormPlus').addEventListener('submit', function(e) {
                e.preventDefault();
                const weight = parseFloat(document.getElementById('weightInputPlus').value);
                const date = document.getElementById('weightDatePlus').value;

                if (weight < 30 || weight > 300) {
                    showToast('❌ Berat badan harus antara 30-300 kg', 'error');
                    return;
                }

                // Show loading
                showLoading(true);

                // Simulate API call
                setTimeout(() => {
                    weightDataPlus.dates.push(date);
                    weightDataPlus.weights.push(weight);

                    const weightLost = weightDataPlus.initialWeight - weight;
                    const targetWeightLoss = weightDataPlus.initialWeight - weightDataPlus.targetWeight;
                    const progressPercentage = Math.min(Math.round((weightLost / targetWeightLoss) * 100), 100);

                    document.getElementById('weightDifferencePlus').textContent = weightLost.toFixed(1);
                    document.getElementById('currentProgressPlus').textContent = progressPercentage;

                    updateWeightChartPlus();
                    saveWeightData(weight, date);

                    showLoading(false);
                    showToast('🎉 Berat badan berhasil diperbarui! Progress: ' + progressPercentage + '%', 'success');

                    this.reset();
                    document.getElementById('weightDatePlus').value = new Date().toISOString().split('T')[0];
                }, 1000);
            });

            // Close modals on escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const modals = document.querySelectorAll('.modal.show');
                    modals.forEach(modal => {
                        bootstrap.Modal.getInstance(modal).hide();
                    });
                }
            });
        }

        // ==================== REFRESH BUTTON IMPROVEMENT ====================
        function setupRefreshButton() {
    const refreshBtn = document.getElementById('refreshMenuBtn');
    const refreshLeftAttr = refreshBtn.getAttribute('data-refresh-left');
    let refreshCount = (refreshLeftAttr === 'unlimited') ? Infinity : parseInt(refreshLeftAttr || '0', 10);
    let canRefresh = true;

    refreshBtn.addEventListener('click', function() {
        if (!canRefresh) return;

        // Kalau bukan unlimited, cek limit
        if (refreshCount !== Infinity && refreshCount <= 0) {
            refreshBtn.disabled = true;
            showToast('Refresh menu habis. Coba lagi besok ya!', 'warning');
            return;
        }

        canRefresh = false;
        refreshBtn.disabled = true;

        // Request ke backend (kalau kamu pakai ajax fetch di sini, biarkan tetap seperti file kamu)
        // Setelah sukses: update tampilan menu + update refreshCount

        // Contoh update count (penting):
        if (refreshCount !== Infinity) {
            refreshCount -= 1;
            refreshBtn.setAttribute('data-refresh-left', String(refreshCount));
            refreshBtn.innerHTML = `<i class="bi bi-arrow-clockwise"></i> Refresh Menu (${refreshCount}x tersisa)`;
            if (refreshCount <= 0) {
                refreshBtn.disabled = true;
            } else {
                refreshBtn.disabled = false;
            }
        } else {
            // Unlimited: tidak berkurang & tidak disable
            refreshBtn.innerHTML = `<i class="bi bi-arrow-clockwise"></i> Refresh Menu (Unlimited)`;
            refreshBtn.disabled = false;
        }

        canRefresh = true;
    });
}


        // ==================== WEIGHT CHART FUNCTIONS ====================
        function initWeightChartPlus() {
            const ctx = document.getElementById('weightChartPlus').getContext('2d');

            if (weightDataPlus.dates.length === 0) {
                const today = new Date();
                weightDataPlus.dates = [today.toISOString().split('T')[0]];
                weightDataPlus.weights = [weightDataPlus.initialWeight];
            }

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: weightDataPlus.dates,
                    datasets: [{
                        label: 'Berat Badan (kg)',
                        data: weightDataPlus.weights,
                        borderColor: '#9C27B0',
                        backgroundColor: 'rgba(156, 39, 176, 0.15)',
                        borderWidth: 4,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#9C27B0',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 10
                    }, {
                        label: 'Target Berat',
                        data: Array(weightDataPlus.dates.length).fill(weightDataPlus.targetWeight),
                        borderColor: '#FF9800',
                        borderWidth: 3,
                        borderDash: [8, 6],
                        tension: 0,
                        pointRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: { size: 12, weight: '600' },
                                padding: 20,
                                usePointStyle: true
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleFont: { size: 13, weight: '600' },
                            bodyFont: { size: 13 },
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed.y.toFixed(1) + ' kg';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            title: {
                                display: true,
                                text: 'Berat Badan (kg)',
                                font: { size: 13, weight: '600' }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: { size: 11 }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tanggal',
                                font: { size: 13, weight: '600' }
                            },
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45,
                                font: { size: 11 }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear'
                        }
                    }
                }
            });
        }

        // ==================== DAILY PLANNER FUNCTIONS ====================
        function initDailyPlannerPlus() {
            // Load tasks from localStorage
            const savedTasks = localStorage.getItem('dailyPlannerTasksPlus');
            if (savedTasks) {
                plannerTasksPlus = JSON.parse(savedTasks);
            } else {
                // Jika tidak ada data, gunakan admin tasks sebagai default
                plannerTasksPlus = [...adminDefaultTasksPlus];
                saveTasksToLocalStoragePlus();
            }

            renderPlannerTasksPlus();
            initDailyProgressChartPlus();
            updateDailyProgressPlus();
        }

        function renderPlannerTasksPlus() {
            const container = document.getElementById('plannerTasksPlus');
            container.innerHTML = '';

            plannerTasksPlus.forEach(task => {
                const taskElement = document.createElement('div');
                taskElement.className = `planner-task-plus ${task.completed ? 'completed' : ''}`;
                taskElement.dataset.taskId = task.id;
                taskElement.dataset.calories = task.calories;

                let deleteButton = '';
                // Hanya user tasks yang bisa dihapus
                if (task.type === 'user') {
                    deleteButton = `<button class="delete-btn-plus" onclick="removeTaskPlus(${task.id})" title="Hapus aktivitas"><i class="bi bi-trash"></i></button>`;
                }

                const badge = `<span class="task-badge-plus ${task.type === 'default' ? 'admin-badge-plus' : 'user-badge-plus'}">
                    ${task.type === 'default' ? 'Default' : 'Custom'}
                </span>`;

                taskElement.innerHTML = `
                    ${badge}
                    ${deleteButton}
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0 pt-1">
                            <input class="form-check-input planner-checkbox-plus"
                                   type="checkbox"
                                   ${task.completed ? 'checked' : ''}
                                   data-task-id="${task.id}"
                                   id="task-${task.id}">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <label class="form-check-label task-checkbox-label" for="task-${task.id}">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <strong class="d-block mb-1" style="font-size: 1rem;">${task.task}</strong>
                                        <small class="text-muted d-block">
                                            <i class="bi bi-clock me-1"></i>${task.time}
                                        </small>
                                    </div>
                                    ${task.calories !== 0 ? `
                                    <div class="text-end">
                                        <span class="badge ${task.calories > 0 ? 'bg-danger' : 'bg-success'}" style="border-radius: 10px; padding: 6px 12px;">
                                            <i class="bi bi-fire me-1"></i>
                                            ${task.calories > 0 ? '+' : ''}${task.calories} cal
                                        </span>
                                    </div>
                                    ` : ''}
                                </div>
                            </label>
                        </div>
                    </div>
                `;

                container.appendChild(taskElement);
            });

            // Add event listeners to checkboxes
            container.querySelectorAll('.planner-checkbox-plus').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const taskId = parseInt(this.dataset.taskId);
                    const task = plannerTasksPlus.find(t => t.id === taskId);

                    if (task) {
                        task.completed = this.checked;
                        saveTasksToLocalStoragePlus();
                        updateDailyProgressPlus();

                        // Add animation effect
                        const taskElement = this.closest('.planner-task-plus');
                        if (task.completed) {
                            taskElement.style.animation = 'none';
                            setTimeout(() => {
                                taskElement.style.animation = 'pulse 0.5s';
                            }, 10);
                        }
                    }
                });
            });
        }

        function initDailyProgressChartPlus() {
            const ctx = document.getElementById('dailyProgressCirclePlus').getContext('2d');

            dailyProgressChartPlus = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Selesai', 'Belum'],
                    datasets: [{
                        data: [0, 100],
                        backgroundColor: ['#9C27B0', '#e0e0e0'],
                        borderWidth: 0,
                        cutout: '75%',
                        borderRadius: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    },
                    cutout: '75%',
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        }

        function updateDailyProgressPlus() {
            const completedTasks = plannerTasksPlus.filter(task => task.completed).length;
            const totalTasks = plannerTasksPlus.length;
            const progressPercentage = totalTasks > 0 ? Math.round((completedTasks / totalTasks) * 100) : 0;

            // Count admin vs user tasks
            const defaultTasks = plannerTasksPlus.filter(task => task.type === 'default').length;
            const userTasks = plannerTasksPlus.filter(task => task.type === 'user').length;

            // Update badge
            document.getElementById('progressBadgePlus').textContent = `${completedTasks}/${totalTasks} selesai`;

            // Update progress text
            document.getElementById('progressTextPlus').textContent = `${completedTasks} dari ${totalTasks} aktivitas selesai`;

            // Update percentage text
            document.getElementById('progressPercentagePlus').textContent = `${progressPercentage}%`;

            // Update task counts
            document.getElementById('adminTasksCountPlus').textContent = defaultTasks;
            document.getElementById('userTasksCountPlus').textContent = userTasks;

            // Update progress bar
            const progressBar = document.getElementById('dailyProgressBarPlus');
            progressBar.style.width = `${progressPercentage}%`;

            // Add animation to progress bar
            progressBar.style.transition = 'width 0.8s cubic-bezier(0.34, 1.56, 0.64, 1)';

            // Update chart
            if (dailyProgressChartPlus) {
                dailyProgressChartPlus.data.datasets[0].data = [progressPercentage, 100 - progressPercentage];
                dailyProgressChartPlus.update('normal');
            }
        }

        function addActivityPlus() {
            const name = document.getElementById('activityNamePlus').value.trim();
            const time = document.getElementById('activityTimePlus').value;
            const calories = parseInt(document.getElementById('activityCaloriesPlus').value) || 0;

            if (!name || !time) {
                showToast('❌ Harap isi nama dan waktu aktivitas', 'error');
                return;
            }

            // Check user tasks limit (max 5)
            const userTasksCount = plannerTasksPlus.filter(task => task.type === 'user').length;
            if (userTasksCount >= 5) {
                showToast('❌ Anda sudah mencapai batas maksimal 5 aktivitas custom', 'error');
                return;
            }

            const newTask = {
                id: Date.now(),
                task: name,
                time: time,
                calories: calories,
                completed: false,
                type: "user"
            };

            plannerTasksPlus.push(newTask);
            saveTasksToLocalStoragePlus();
            renderPlannerTasksPlus();
            updateDailyProgressPlus();

            const modal = bootstrap.Modal.getInstance(document.getElementById('addActivityModalPlus'));
            modal.hide();

            document.getElementById('activityFormPlus').reset();
            document.getElementById('activityTimePlus').value = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

            showToast('✅ Aktivitas berhasil ditambahkan!', 'success');
        }

        function removeTaskPlus(taskId) {
            // Hanya user tasks yang bisa dihapus
            const taskToRemove = plannerTasksPlus.find(task => task.id === taskId);
            if (!taskToRemove || taskToRemove.type !== 'user') {
                showToast('❌ Hanya aktivitas custom yang bisa dihapus', 'error');
                return;
            }

            if (confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')) {
                plannerTasksPlus = plannerTasksPlus.filter(task => task.id !== taskId);
                saveTasksToLocalStoragePlus();
                renderPlannerTasksPlus();
                updateDailyProgressPlus();

                showToast('🗑️ Aktivitas berhasil dihapus!', 'info');
            }
        }

        function saveTasksToLocalStoragePlus() {
            localStorage.setItem('dailyPlannerTasksPlus', JSON.stringify(plannerTasksPlus));
        }

        // ==================== RECIPE FUNCTIONS ====================
        function loadRecipesPlus(page = 1) {
            currentPagePlus = page;
            const start = (page - 1) * recipesPerPagePlus;
            const end = start + recipesPerPagePlus;
            const pageRecipes = recipesPlus.slice(start, end);

            const recipeGrid = document.getElementById('recipeGridPlus');
            recipeGrid.innerHTML = '';

            pageRecipes.forEach(recipe => {
                const recipeCard = document.createElement('div');
                recipeCard.className = 'recipe-card-premium-plus';
                recipeCard.innerHTML = `
                    <span class="premium-label-plus">PREMIUM+ EXCLUSIVE</span>
                    <h6 class="fw-bold mb-2">${recipe.title}</h6>
                    <p class="recipe-description">${recipe.description}</p>
                    <div class="recipe-stats-plus">
                        <small class="text-muted">
                            <i class="bi bi-fire text-danger"></i> ${recipe.calories} cal
                        </small>
                        <small class="text-muted">
                            <i class="bi bi-clock text-primary"></i> ${recipe.time}
                        </small>
                        <small class="text-muted">
                            <i class="bi bi-egg text-success"></i> ${recipe.difficulty}
                        </small>
                    </div>
                    <button class="btn btn-outline-primary btn-sm w-100 mt-3 view-recipe-btn-plus"
                            data-recipe-id="${recipe.id}"
                            style="border-radius: 10px; padding: 10px;">
                        <i class="bi bi-eye me-1"></i> Lihat Detail Premium
                    </button>
                `;
                recipeGrid.appendChild(recipeCard);
            });

            document.querySelectorAll('.view-recipe-btn-plus').forEach(button => {
                button.addEventListener('click', function() {
                    const recipeId = parseInt(this.dataset.recipeId);
                    const recipe = recipesPlus.find(r => r.id === recipeId);
                    showRecipeModalPlus(recipe);
                });
            });

            updatePaginationPlus();
        }

        function updatePaginationPlus() {
            const totalPages = Math.ceil(recipesPlus.length / recipesPerPagePlus);
            const pagination = document.getElementById('recipePaginationPlus');
            pagination.innerHTML = '';

            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${currentPagePlus === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="#" onclick="loadRecipesPlus(${currentPagePlus - 1})" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>`;
            pagination.appendChild(prevLi);

            // Page numbers
            const maxVisiblePages = 5;
            let startPage = Math.max(1, currentPagePlus - Math.floor(maxVisiblePages / 2));
            let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

            if (endPage - startPage + 1 < maxVisiblePages) {
                startPage = Math.max(1, endPage - maxVisiblePages + 1);
            }

            for (let i = startPage; i <= endPage; i++) {
                const pageLi = document.createElement('li');
                pageLi.className = `page-item ${i === currentPagePlus ? 'active' : ''}`;
                pageLi.innerHTML = `<a class="page-link" href="#" onclick="loadRecipesPlus(${i})">${i}</a>`;
                pagination.appendChild(pageLi);
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${currentPagePlus === totalPages ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="#" onclick="loadRecipesPlus(${currentPagePlus + 1})" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>`;
            pagination.appendChild(nextLi);
        }

        // ==================== IMPROVED RECIPE MODAL ====================
        function showRecipeModalPlus(recipe) {
            const modal = new bootstrap.Modal(document.getElementById('recipeModalPlus'));
            document.getElementById('recipeModalTitlePlus').textContent = recipe.title;
            document.getElementById('recipeModalSubtitlePlus').textContent = recipe.description;

            document.getElementById('recipeModalBodyPlus').innerHTML = `
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="recipe-image-container-plus">
                            <img src="${recipe.image}" alt="${recipe.title}"
                                 style="width: 100%; height: 300px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); width: 100%;">
                                <h5 class="text-white mb-0">${recipe.title}</h5>
                            </div>
                        </div>

                        <div class="recipe-stats-plus-premium mt-4">
                            <div class="row text-center">
                                <div class="col-4 mb-3">
                                    <div>
                                        <i class="bi bi-fire fs-4" style="color: #FF5722;"></i>
                                        <p class="mb-0 fw-bold mt-2">${recipe.calories}</p>
                                        <small>Kalori</small>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div>
                                        <i class="bi bi-clock fs-4" style="color: #2196F3;"></i>
                                        <p class="mb-0 fw-bold mt-2">${recipe.time}</p>
                                        <small>Waktu</small>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div>
                                        <i class="bi bi-egg fs-4" style="color: #4CAF50;"></i>
                                        <p class="mb-0 fw-bold mt-2">${recipe.difficulty}</p>
                                        <small>Level</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <i class="bi bi-droplet fs-4" style="color: #00BCD4;"></i>
                                        <p class="mb-0 fw-bold mt-2">${recipe.nutrition?.protein || '42g'}</p>
                                        <small>Protein</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <i class="bi bi-carrot fs-4" style="color: #FF9800;"></i>
                                        <p class="mb-0 fw-bold mt-2">${recipe.nutrition?.carbs || '28g'}</p>
                                        <small>Karbo</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <i class="bi bi-water fs-4" style="color: #9C27B0;"></i>
                                        <p class="mb-0 fw-bold mt-2">${recipe.nutrition?.fat || '9g'}</p>
                                        <small>Lemak</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h5 class="fw-bold mb-3" style="color: var(--primary);">
                            <i class="bi bi-list-check me-2"></i> Bahan-bahan Premium:
                        </h5>
                        <div class="mb-4" style="max-height: 200px; overflow-y: auto;">
                            ${recipe.ingredients.map((ing, index) => `
                                <div class="ingredient-card-plus mb-2">
                                    <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                          style="width: 28px; height: 28px; font-size: 0.8rem;">${index + 1}</span>
                                    <span>${ing}</span>
                                </div>
                            `).join('')}
                        </div>

                        <h5 class="fw-bold mb-3" style="color: var(--primary);">
                            <i class="bi bi-gear me-2"></i> Cara Membuat:
                        </h5>
                        <div style="max-height: 250px; overflow-y: auto;">
                            ${recipe.steps.map((step, index) => `
                                <div class="step-card-plus position-relative mb-3">
                                    <div class="step-number-plus">${index + 1}</div>
                                    <p class="mb-0" style="padding-left: 10px;">${step}</p>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </div>

                ${recipe.tips ? `
                <div class="alert alert-info mt-4" style="background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(103, 58, 183, 0.1)); border-color: var(--primary); border-radius: 15px;">
                    <div class="d-flex">
                        <i class="bi bi-lightbulb text-primary fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-2">Tips Premium+:</h6>
                            <p class="mb-0">${recipe.tips}</p>
                        </div>
                    </div>
                </div>
                ` : ''}

                <div class="alert alert-success mt-3" style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(56, 142, 60, 0.1)); border-color: #4CAF50; border-radius: 15px;">
                    <div class="d-flex">
                        <i class="bi bi-stars text-success fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-2">Fitur Eksklusif Premium+:</h6>
                            <p class="mb-0">Menu ini menggunakan bahan-bahan premium dan teknik memasak khusus hanya untuk member Starter+ Ultimate.</p>
                        </div>
                    </div>
                </div>
            `;

            modal.show();
        }

        // ==================== AI CHAT FUNCTIONS ====================
        function initAIChat() {
            updateChatDisplay();
        }

        function sendAIMessage() {
            const input = document.getElementById('aiMessageInput');
            const message = input.value.trim();

            if (!message) {
                input.focus();
                return;
            }

            // Add user message
            const userMessage = {
                role: 'user',
                message: message,
                time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
            };

            aiChatMessages.push(userMessage);
            updateChatDisplay();

            // Clear input
            input.value = '';
            input.focus();

            // Show typing indicator
            const typingIndicator = document.createElement('div');
            typingIndicator.className = 'ai-typing';
            typingIndicator.innerHTML = '<strong>🤖 AI Assistant:</strong><br><div class="typing-dots"><span>.</span><span>.</span><span>.</span></div>';
            document.getElementById('aiChatMessages').appendChild(typingIndicator);

            // Scroll to bottom
            document.getElementById('aiChatMessages').scrollTop = document.getElementById('aiChatMessages').scrollHeight;

            // Simulate AI response dengan API integration simulation
            setTimeout(() => {
                typingIndicator.remove();

                // In a real application, this would be an API call to DeepSeek AI
                // For demo, we'll simulate intelligent responses based on context
                const aiResponse = generateAIResponse(message);

                const aiMessage = {
                    role: 'ai',
                    message: aiResponse,
                    time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
                };

                aiChatMessages.push(aiMessage);
                updateChatDisplay();

                // Simpan interaksi ke statistik
                updateAIStats();
            }, 2000 + Math.random() * 1000); // Random delay untuk simulasi AI thinking
        }

        function generateAIResponse(question) {
            const lowerQuestion = question.toLowerCase();

            // Responses berdasarkan konteks pertanyaan
            if (lowerQuestion.includes('turun') || lowerQuestion.includes('diet') || lowerQuestion.includes('berat')) {
                return `**Berdasarkan data premium Anda (Target: -5kg, Progress: 75%)**, saya rekomendasikan:\n\n🏆 **STRATEGI PREMIUM:**\n1️⃣ **Defisit kalori:** 600-800 kalori/hari (dari kebutuhan 2500 kalori)\n2️⃣ **Protein tinggi:** 1.8-2.2g/kg berat badan (≈140g/hari)\n3️⃣ **Olahraga:** HIIT 30 menit + strength training 45 menit, 5x/minggu\n4️⃣ **Nutrisi:** Fokus pada lean protein, complex carbs, healthy fats\n5️⃣ **Suplementasi:** Whey protein post-workout, Omega-3, Vitamin D\n\n📊 **Estimasi:** Dengan konsistensi, target -5kg dapat dicapai dalam **6-8 minggu**.\n\nIngin saya buatkan jadwal lengkap 7 hari?`;

            } else if (lowerQuestion.includes('sarapan') || lowerQuestion.includes('pagi')) {
                return `**MENU SARAPAN PREMIUM RECOMMENDATION:**\n\n🥇 **TOP CHOICE - Protein Oatmeal (450 kal):**\n• Oatmeal 60g\n• Whey protein 1 scoop\n• Chia seed 1 sdm\n• Almond sliced 10g\n• Blueberry 50g\n• Kayu manis secukupnya\n\n🥈 **OPTION 2 - Avocado Toast Pro (420 kal):**\n• Roti gandum premium 2 slice\n• Alpukat 1 buah\n• Telur rebus 2 butir\n• Flaxseed 1 sdm\n• Lemon juice + garam himalaya\n\n🥉 **OPTION 3 - Smoothie Bowl (380 kal):**\n• Greek yogurt 200g\n• Protein powder 1 scoop\n• Spinach 50g\n• Mixed berries 100g\n• Granola low-sugar 30g\n• Chia seed topping\n\nPilihan mana yang sesuai dengan bahan yang Anda miliki?`;

            } else if (lowerQuestion.includes('olahraga') || lowerQuestion.includes('workout') || lowerQuestion.includes('latihan')) {
                return `**WORKOUT PLAN PREMIUM:**\n\n🏋️‍♂️ **SENIN (Upper Body):**\n• Bench Press 4x8\n• Bent Over Row 4x8\n• Shoulder Press 4x10\n• Bicep Curl 3x12\n• Tricep Extension 3x12\n\n🦵 **SELASA (Lower Body):**\n• Squat 4x8\n• Deadlift 4x6\n• Lunges 3x10\n• Leg Press 4x10\n• Calf Raise 4x15\n\n🤸‍♂️ **RABU (HIIT Cardio):**\n• 30 menit HIIT: 45s work / 15s rest\n• Jumping Jacks, Burpees, Mountain Climbers\n• High Knees, Plank Jacks, Skaters\n\n🔄 **KAMIS (Active Recovery):**\n• Yoga 30 menit\n• Foam rolling\n• Light stretching\n\n🔥 **JUMAT (Full Body):**\n• Circuit training 45 menit\n• Minimal rest between sets\n\nIngin detail untuk hari tertentu atau butuh video tutorial?`;

            } else if (lowerQuestion.includes('menu') || lowerQuestion.includes('makan') || lowerQuestion.includes('resep')) {
                return `**DAILY MEAL PLAN PREMIUM (2500 kalori):**\n\n🌅 **SARAPAN (7:00) - 450 kal:**\nProtein oatmeal dengan berries dan almond\n\n☀️ **SNACK 1 (10:00) - 200 kal:**\nGreek yogurt + whey protein + chia seed\n\n🍗 **MAKAN SIANG (13:00) - 650 kal:**\n• Dada ayam panggang 200g\n• Quinoa 100g\n• Brokoli & asparagus 150g\n• Avocado 50g\n• Olive oil dressing\n\n🌰 **SNACK 2 (16:00) - 300 kal:**\n• Protein shake\n• Almond 20g\n• Apple 1 buah\n\n🐟 **MAKAN MALAM (19:00) - 700 kal:**\n• Salmon panggang 200g\n• Sweet potato 150g\n• Mixed vegetables 200g\n• Lemon butter sauce\n\n🥛 **SNACK MALAM (21:00) - 200 kal:**\n• Casein protein shake\n• Peanut butter 1 sdm\n\nIngin penyesuaian berdasarkan bahan yang tersedia atau preferensi khusus?`;

            } else {
                return `**🤖 AI ASSISTANT PREMIUM:**\n\nSaya adalah AI Assistant khusus untuk member EatJoy Starter+ Ultimate. Untuk memberikan rekomendasi yang paling personal, izinkan saya mengakses:\n\n📈 **DATA YANG DIBUTUHKAN:**\n1. Berat badan terkini & target spesifik\n2. Aktivitas fisik harian (langkah, olahraga)\n3. Preferensi makanan & alergi\n4. Jadwal harian & waktu makan\n5. Target timeline (bulanan/tahunan)\n\n🔒 **KEAMANAN DATA:**\nSemua data dienkripsi dan hanya digunakan untuk optimasi program diet Anda.\n\nInformasi mana yang ingin Anda bagikan terlebih dahulu?`;
            }
        }

        function askQuickQuestion(question) {
            document.getElementById('aiMessageInput').value = question;
            sendAIMessage();
        }

        function askAIAboutMenu() {
            document.getElementById('aiMessageInput').value = 'Berikan rekomendasi menu premium untuk hari ini berdasarkan target penurunan 5kg saya';
            sendAIMessage();
            scrollToSection('ai-chat-section');
        }

        function updateChatDisplay() {
            const chatContainer = document.getElementById('aiChatMessages');
            chatContainer.innerHTML = '';

            aiChatMessages.forEach(msg => {
                const msgDiv = document.createElement('div');
                msgDiv.className = `message-${msg.role}`;

                // Format message dengan line breaks
                const formattedMessage = msg.message.replace(/\n/g, '<br>');

                msgDiv.innerHTML = `
                    <strong>${msg.role === 'ai' ? '🤖 AI Assistant Premium:' : '👤 Anda:'}</strong><br>
                    ${formattedMessage}
                    <div class="text-end mt-2">
                        <small class="text-muted">${msg.time}</small>
                    </div>
                `;
                chatContainer.appendChild(msgDiv);
            });

            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function updateAIStats() {
            // Update AI interaction count
            const aiCountEl = document.querySelector('.stats-card-plus.ai h4');
            if (aiCountEl) {
                const currentCount = parseInt(aiCountEl.textContent) || 0;
                aiCountEl.textContent = currentCount + 1;
            }
        }

        // ==================== UTILITY FUNCTIONS ====================
        function saveWeightData(weight, date) {
            // Simulate API call
            console.log('Saving weight data:', { weight, date });
            // In real app: fetch('/api/weight', { method: 'POST', body: JSON.stringify({ weight, date }) })
        }

        function saveSettingsPlus() {
            showToast('✅ Pengaturan premium berhasil disimpan!', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('settingsModalPlus'));
            modal.hide();
        }

        function showToast(message, type = 'info') {
            const toastContainer = document.getElementById('toastContainer') || createToastContainer();
            const toastId = 'toast-' + Date.now();

            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-bg-${type === 'success' ? 'success' : type === 'warning' ? 'warning' : type === 'error' ? 'danger' : 'info'} border-0`;
            toast.id = toastId;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            // Icon berdasarkan type
            const icons = {
                'success': '✅',
                'warning': '⚠️',
                'error': '❌',
                'info': 'ℹ️'
            };

            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body d-flex align-items-center">
                        <span class="me-2" style="font-size: 1.2rem;">${icons[type] || 'ℹ️'}</span>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;

            toastContainer.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast, {
                delay: 4000,
                animation: true
            });
            bsToast.show();

            toast.addEventListener('hidden.bs.toast', function() {
                toast.remove();
            });
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.id = 'toastContainer';
            container.className = 'toast-container-plus position-fixed top-0 end-0 p-3';
            document.body.appendChild(container);
            return container;
        }

        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Highlight effect
                element.style.boxShadow = '0 0 0 4px rgba(156, 39, 176, 0.3)';
                setTimeout(() => {
                    element.style.boxShadow = '';
                }, 1500);
            }
        }

        function updateWeightChartPlus() {
            // Reinitialize chart with new data
            initWeightChartPlus();
        }

        function addToPlanner() {
            showToast('📅 Menu berhasil ditambahkan ke Daily Planner!', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('recipeModalPlus'));
            modal.hide();
        }

        function readArticle(articleId) {
            showToast(`📖 Membuka artikel premium #${articleId}...`, 'info');
            // In real app: window.open(`/articles/${articleId}`, '_blank');
        }

        function showLoading(show) {
            const overlay = document.getElementById('loadingOverlay');
            if (show) {
                overlay.classList.add('active');
            } else {
                overlay.classList.remove('active');
            }
        }

        // Initialize when page loads
        window.onload = function() {
            // Add some sample data if empty
            if (weightDataPlus.dates.length === 0) {
                const today = new Date();
                const lastWeek = new Date(today);
                lastWeek.setDate(today.getDate() - 7);

                weightDataPlus.dates = [
                    lastWeek.toISOString().split('T')[0],
                    today.toISOString().split('T')[0]
                ];
                weightDataPlus.weights = [
                    weightDataPlus.initialWeight,
                    weightDataPlus.initialWeight - 3.5
                ];
            }
        };
    </script>
</body>
</html>
