<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Subscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    :root {
    --gold: #aa9166;
    --dark: #1b1b1b;
}

body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background: var(--dark);
    color: white;
    min-height: 100vh;
}

.top-bar {
    background: rgba(170, 145, 102, 0.1);
    padding: 1rem;
    text-align: left;
}

.home-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--gold);
    color: var(--dark);
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.home-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(170, 145, 102, 0.3);
}

.container {
    max-width: 1200px;
    margin: 3rem auto;
    padding: 0 1rem;
}

.header {
    text-align: center;
    margin-bottom: 4rem;
}

.header h1 {
    color: var(--gold);
    font-size: 2.5rem;
    margin-bottom: 1rem;
    opacity: 0;
    animation: fadeIn 1s ease forwards;
}

.plans-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 1rem;
}

.plan-card {
    background: rgba(170, 145, 102, 0.1);
    border: 2px solid var(--gold);
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    transform: translateY(50px);
    opacity: 0;
    animation: slideUp 0.6s ease forwards;
    display: flex;
    flex-direction: column;
    min-height: 400px;
}

.plan-card:nth-child(2) { 
    animation-delay: 0.2s; 
}

.plan-card:nth-child(3) { 
    animation-delay: 0.4s; 
}

.plan-card:hover {
    background: rgba(170, 145, 102, 0.2);
    transform: translateY(-5px);
    transition: all 0.3s ease;
}

.plan-icon {
    font-size: 2.5rem;
    color: var(--gold);
    margin-bottom: 1.5rem;
}

.plan-title {
    color: var(--gold);
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
}

.plan-price {
    font-size: 2.5rem;
    color: white;
    margin: 1rem 0;
}

.plan-description {
    color: #ccc;
    margin-bottom: 2rem;
    line-height: 1.6;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.subscribe-btn {
    background: var(--gold);
    color: var(--dark);
    border: none;
    padding: 1rem 2rem;
    border-radius: 30px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    font-weight: bold;
    margin-top: auto;
}

.subscribe-btn:hover {
    background: white;
    transform: translateY(-2px);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        transform: translateY(50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="{{ route('user.home') }}" class="home-btn">
            <i class="fas fa-home"></i>
            Visit Homepage for Free Access
        </a>
    </div>
    

    <div class="container">
        <div class="header">
            <h1>Choose Your Subscription Plan</h1>
        </div>

        <form action="{{ route('lawyer.subscription.store') }}" method="POST">
            @csrf
            <div class="plans-grid">
                <div class="plan-card">
                    <div class="plan-icon"><i class="fas fa-briefcase"></i></div>
                    <div class="plan-title">Monthly</div>
                    <div class="plan-price">$5</div>
                    <div class="plan-description">
                        Unlimited legal consultations for a full month
                        with direct access to qualified lawyers
                    </div>
                    <input type="radio" name="plan" value="monthly" required hidden>
                    <button type="submit" class="subscribe-btn" onclick="this.form.plan.value='monthly'">Subscribe Now</button>
                </div>

                <div class="plan-card">
                    <div class="plan-icon"><i class="fas fa-balance-scale"></i></div>
                    <div class="plan-title">Semi-Annual</div>
                    <div class="plan-price">$25</div>
                    <div class="plan-description">
                        Save 17% with a 6-month subscription
                        Comprehensive legal services with priority support
                    </div>
                    <input type="radio" name="plan" value="semiannual" required hidden>
                    <button type="submit" class="subscribe-btn" onclick="this.form.plan.value='semiannual'">Subscribe Now</button>
                </div>

                <div class="plan-card">
                    <div class="plan-icon"><i class="fas fa-star"></i></div>
                    <div class="plan-title">Annual</div>
                    <div class="plan-price">$50</div>
                    <div class="plan-description">
                        Save 30% with a full year subscription
                        All features plus VIP premium service
                    </div>
                    <input type="radio" name="plan" value="annual" required hidden>
                    <button type="submit" class="subscribe-btn" onclick="this.form.plan.value='annual'">Subscribe Now</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>