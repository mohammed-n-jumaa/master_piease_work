<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Subscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

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
    }

    .plans-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        padding: 1rem;
        margin-bottom: 3rem;
    }

    .plan-card {
        background: rgba(170, 145, 102, 0.1);
        border: 2px solid var(--gold);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        min-height: 400px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .plan-card.selected {
        background: rgba(170, 145, 102, 0.3);
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(170, 145, 102, 0.2);
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
    }

    .payment-section {
        max-width: 600px;
        margin: 0 auto;
        background: rgba(170, 145, 102, 0.1);
        padding: 2rem;
        border-radius: 15px;
        border: 2px solid var(--gold);
    }

    .payment-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .payment-summary {
        background: rgba(255, 255, 255, 0.1);
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        color: #ccc;
    }

    .summary-total {
        border-top: 1px solid var(--gold);
        padding-top: 1rem;
        color: white;
        font-weight: bold;
    }

    #card-element {
        background: rgba(255, 255, 255, 0.9);
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    #card-errors {
        color: #fa755a;
        text-align: center;
        margin-top: 1rem;
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
        margin-top: 1rem;
    }

    .subscribe-btn:hover {
        background: white;
        transform: translateY(-2px);
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

        <form action="{{ route('lawyer.subscription.store') }}" method="POST" id="payment-form">
            @csrf
            <div class="plans-grid">
                <div class="plan-card" onclick="selectPlan('monthly', 5)">
                    <div class="plan-icon"><i class="fas fa-briefcase"></i></div>
                    <div class="plan-title">Monthly</div>
                    <div class="plan-price">$5</div>
                    <div class="plan-description">
                        Unlimited legal consultations for a full month
                        with direct access to qualified lawyers
                    </div>
                </div>

                <div class="plan-card" onclick="selectPlan('semiannual', 25)">
                    <div class="plan-icon"><i class="fas fa-balance-scale"></i></div>
                    <div class="plan-title">Semi-Annual</div>
                    <div class="plan-price">$25</div>
                    <div class="plan-description">
                        Save 17% with a 6-month subscription
                        Comprehensive legal services with priority support
                    </div>
                </div>

                <div class="plan-card" onclick="selectPlan('annual', 50)">
                    <div class="plan-icon"><i class="fas fa-star"></i></div>
                    <div class="plan-title">Annual</div>
                    <div class="plan-price">$50</div>
                    <div class="plan-description">
                        Save 30% with a full year subscription
                        All features plus VIP premium service
                    </div>
                </div>
            </div>

            <div class="payment-section" id="payment-section" style="display: none;">
                <div class="payment-header">
                    <h2 style="color: #aa9166">Complete Your Purchase</h2>
                </div>

                <div class="payment-summary">
                    <div class="summary-row">
                        <span>Selected Plan:</span>
                        <span id="selected-plan-name">-</span>
                    </div>
                    <div class="summary-row">
                        <span>Duration:</span>
                        <span id="selected-plan-duration">-</span>
                    </div>
                    <div class="summary-row summary-total">
                        <span>Total:</span>
                        <span id="selected-plan-price">$0</span>
                    </div>
                </div>

                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
                
                <input type="hidden" name="plan" id="selected-plan-input">
                <button type="submit" class="subscribe-btn">Complete Purchase</button>
            </div>
        </form>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();
        
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var card = elements.create("card", {style: style});
        card.mount("#card-element");

        function selectPlan(planType, price) {
            // Remove selected class from all cards
            document.querySelectorAll('.plan-card').forEach(card => {
                card.classList.remove('selected');
            });
            
            // Add selected class to clicked card
            event.currentTarget.classList.add('selected');
            
            // Show payment section
            document.getElementById('payment-section').style.display = 'block';
            
            // Update payment summary
            document.getElementById('selected-plan-name').textContent = planType.charAt(0).toUpperCase() + planType.slice(1);
            document.getElementById('selected-plan-duration').textContent = getDuration(planType);
            document.getElementById('selected-plan-price').textContent = `$${price}`;
            document.getElementById('selected-plan-input').value = planType;
            
            // Smooth scroll to payment section
            document.getElementById('payment-section').scrollIntoView({ behavior: 'smooth' });
        }

        function getDuration(planType) {
            switch(planType) {
                case 'monthly': return '1 Month';
                case 'semiannual': return '6 Months';
                case 'annual': return '12 Months';
                default: return '-';
            }
        }

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
</body>
</html>