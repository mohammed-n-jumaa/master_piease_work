<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8"> 
    <title>404 - الملف المفقود</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            margin: 0;
            min-height: 100vh;
            background: #1c1f23;
            font-family: 'Cairo', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
        }

        .container {
            text-align: center;
            color: #d1b797;
            padding: 1rem; 
        }

        .file-container {
            width: 250px; 
            height: 350px;
            margin: 0 auto 1.5rem; 
            position: relative;
            transform-style: preserve-3d;
            animation: floatFile 4s ease-in-out infinite;
        }

        @keyframes floatFile {
            0%, 100% { transform: rotateY(-10deg) rotateX(10deg) translateY(0); }
            50% { transform: rotateY(10deg) rotateX(-5deg) translateY(-15px); }
        }

        .file {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #d1b797;
            border-radius: 10px;
            transform-style: preserve-3d;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .file::before {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            background: #d1b797;
            right: 15px;
            top: -20px;
            transform: rotateZ(45deg);
        }

        .stamp {
            position: absolute;
            width: 100px; 
            height: 100px; 
            background: rgba(255,0,0,0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem; 
            font-weight: bold;
            top: 40px; 
            right: 40px; 
            transform: translateZ(20px); 
            border: 5px solid #880000;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: stampPulse 2s ease-in-out infinite;
        }

        @keyframes stampPulse {
            0%, 100% { transform: translateZ(20px) scale(1); }
            50% { transform: translateZ(20px) scale(1.05); }
        }

        .papers {
            position: absolute;
            width: 260px; 
            height: 340px;
            background: white;
            border-radius: 8px;
            transform: translateZ(-10px);
        }

        .paper-clip {
            position: absolute;
            width: 12px;
            height: 30px;
            border: 3px solid silver;
            border-radius: 5px;
            transform: rotate(45deg);
            top: 5px;
            left: 5px;
        }

        .paper-clip::before {
            content: '';
            position: absolute;
            width: 8px;
            height: 25px;
            border: 3px solid silver;
            border-radius: 5px;
            top: 5px;
            left: 2px;
        }

        h1 {
            font-size: 2.5rem; 
            margin-bottom: 1rem;
            color: #d1b797;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        p {
            font-size: 1.3rem; 
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 1rem 1.5rem;
            background: #d1b797;
            color: #1c1f23;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1rem; 
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(209,183,151,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="file-container">
            <div class="papers"></div>
            <div class="file">
                <div class="stamp">مفقود!</div>
                <div class="paper-clip"></div>
            </div>
        </div>
        <h1>الصفحة غير موجودة</h1>
        <p>قد تكون الصفحة التي تبحث عنها غير متوفرة. يمكننا مساعدتك في إيجاد الحل المناسب.</p>
        <a href="{{ route('user.home') }}" class="btn">العودة للصفحة الرئيسية</a>
    </div>
</body>
</html>
