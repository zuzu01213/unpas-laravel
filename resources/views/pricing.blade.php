@extends('layouts.main')

@section('container')

<body>
    <style>
        .pricing-img {
            filter: brightness(1) sepia(0.1) hue-rotate(5540deg);
        }
    </style>
    <form id="purchasePlanForm" method="post" action="{{ route('purchase.plan') }}">
        @csrf

        <input type="hidden" name="posts_limit" id="postsLimitInput" value="">
        <div class="background">
            <div class="container" style="margin-top: 0;">
                <div class="panel pricing-table">

                    @guest
                    <div class="pricing-plan">
                        <img src="https://s22.postimg.cc/8mv5gn7w1/paper-plane.png" alt="" class="pricing-img">
                        <h2 class="pricing-header">Personal</h2>
                        <ul class="pricing-features">
                            <li class="pricing-features-item">Custom domains</li>
                            <li class="pricing-features-item">Sleeps after 30 mins of inactivity</li>
                            <li class="pricing-features-item">Limited Post </li>
                            <li class="pricing-features-item">Never sleeps</li>
                        </ul>
                        <span class="pricing-price">
                            <span class="price-amount">Free</span>
                        </span>
                        <a href="/login" class="pricing-button">Sign up</a>
                    </div>
                    @endguest

                    <div class="pricing-plan" id="plan1">
                        <img src="https://s22.postimg.cc/8mv5gn7w1/paper-plane.png" alt="" class="pricing-img">
                        <h2 class="pricing-header">Paper Plane</h2>
                        <ul class="pricing-features">
                            <li class="pricing-features-item">Custom domains</li>
                            <li class="pricing-features-item">Sleeps after 30 mins of inactivity</li>
                            <li class="pricing-features-item">Limited Post </li>
                            <li class="pricing-features-item">Never sleeps</li>
                        </ul>
                        <span class="pricing-price">
                            @if(auth()->check() && (auth()->user()->is_premium || auth()->user()->is_admin))
                            <span class="price-amount">5</span> free post
                            @else
                            <span class="price-amount">$1</span> = <span class="price-amount">1</span> Post
                            @endif
                        </span>
                        <a id="launchWindButton" class="pricing-button" onclick="submitPurchasePlanForm(1, 'launchWindButton')">
                            Launch with Wind
                        </a>
                    </div>


                    <div class="pricing-plan" id="plan2">
                        <img src="https://s28.postimg.cc/ju5bnc3x9/plane.png" alt="" class="pricing-img">
                        @if(auth()->check() && (auth()->user()))
                        <h2 class="pricing-header">Flying Machine</h2>
                        @else
                        <h2 class="pricing-header"> Machine</h2>
                        @endif
                        <ul class="pricing-features">
                            <li class="pricing-features-item">Never sleeps</li>
                            <li class="pricing-features-item">Multiple workers for more powerful apps</li>
                            <li class="pricing-features-item">Unlimited Post</li>
                            <li class="pricing-features-item">Never sleeps</li>
                        </ul>
                        <span class="pricing-price">
                            @if(auth()->check() && (auth()->user()->is_premium || auth()->user()->is_admin))
                            <span class="price-amount">$1</span> = <span class="price-amount">3</span> Post
                            @else
                            <span class="price-amount">$3</span> = <span class="price-amount">5</span> Post
                            @endif
                        </span>
                        <a  class="pricing-button" onclick="submitPurchasePlanForm(5)">
                            Launch with Machine
                        </a>

                    </div>

                    <div class="pricing-plan" id="plan3">
                        <img src="https://s21.postimg.cc/tpm0cge4n/space-ship.png" alt="" class="pricing-img">
                        <h2 class="pricing-header">Space Rocket</h2>
                        <ul class="pricing-features">
                            <li class="pricing-features-item">Dedicated</li>
                            <li class="pricing-features-item">Simple horizontal scalability</li>
                            <li class="pricing-features-item">Unlimited Post </li>
                            <li class="pricing-features-item">Never sleeps</li>
                        </ul>
                        <span class="pricing-price">
                            @if(auth()->check() && (auth()->user()->is_premium || auth()->user()->is_admin))
                            <span class="price-amount">$3</span> = <span class="price-amount">10</span> Post
                            @else
                            <span class="price-amount">$5</span> = <span class="price-amount">12</span> Post
                            @endif
                        </span>
                        <a class="pricing-button" onclick="submitPurchasePlanForm(12)">
                            Giant space rocket
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function submitPurchasePlanForm(postsLimit, buttonId) {
            // Set the value of the hidden input field
            document.getElementById('postsLimitInput').value = postsLimit;

            // Log to console for debugging
            console.log('Submitting form with posts_limit:', postsLimit);

            // Manually submit the form
            document.getElementById('purchasePlanForm').submit();

            // Disable the clicked button and change its text
            document.getElementById(buttonId).disabled = true;
            document.getElementById(buttonId).innerText = 'You already claimed this plan';
        }
    </script>

</body>



<style>
    a{
        cursor: pointer;
    }
  body {
    box-sizing: border-box;

  }

  *, *:before, *:after {
    box-sizing: inherit;
  }

  .background {
    padding: 0 25px 25px;
    position: relative;
    width: 100%;
    background:  brown;

  }

  .background::after {
    content: '';
    background:  brown   ;
    background: -moz-linear-gradient(top, black 0%,    brown   100%);
    background: -webkit-linear-gradient(top, black 0%,   brown     100%);
    background: linear-gradient(to bottom, black 0%,   brown   100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='purple', endColorstr='#4394f4',GradientType=0 );
    height: 350px;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1;
  }

  @media (min-width: 900px) {
    .background {
      padding: 0 0 25px;
    }
  }

  .container {
    margin: 0 auto;
    padding: 50px 0 0;
    padding-top: 80px;
    max-width: 960px;
    width: 100%;
  }

  .panel {
    background:  white   ;
    background: -moz-linear-gradient(top, black 0%,    100%);
    background: -webkit-linear-gradient(top, black 0%,     100%);
    background: linear-gradient(to bottom, black 0%,   100%);
    border-radius: 10px;
    padding: 15px 25px;
    position: relative;

    width: 100%;
    z-index: 10;
  }

  .pricing-table {
    box-shadow: 0px 10px 13px -6px rgba(0, 0, 0, 0.08), 0px 20px 31px 3px rgba(0, 0, 0, 0.19), 0px 8px 20px 7px rgba(0, 0, 0, 0.12);
    display: flex;
    flex-direction: row; /* Updated to make buttons align horizontally */
  }

  .pricing-table * {
    text-align: center;
    text-transform: uppercase;

  }

  .pricing-plan {
    border-right: 1px solid black;
    flex: 1;
    padding: 25px;
  }

  .pricing-plan:last-child {
    border-right: none;
  }

  .pricing-img {
    margin-bottom: 25px;
    max-width: 100%;
  }

  .pricing-header {
    color: black;
    font-weight: 600;
    letter-spacing: 1px;
  }

  .pricing-features {
    color: black;
    font-weight: 600;
    letter-spacing: 1px;
    margin: 50px 0 25px;
  }

  .pricing-features-item {
    border-top: 1px solid black;
    font-size: 12px;
    line-height: 1.5;
    padding: 15px 0;
  }

  .pricing-features-item:last-child {
    border-bottom: 1px solid black;
  }

  .pricing-price {
    color: black;
    display: block;
    font-size: 28px;
    font-weight: 700;
  }

  .pricing-button {
    border: 1px solid black;
    border-radius: 10px;
    color: rgb(226, 130, 130);
    display: inline-block;
    margin: 25px 0;
    padding: 15px 35px;
    text-decoration: none;
    transition: all 150ms ease-in-out;
    background-color: black;
  }

  .pricing-button:hover,
  .pricing-button:focus {
    opacity: 0.7;
    color: white
  }

  .pricing-button.is-featured {
    background-color: black;
    color: rgb(226, 130, 130);
  }

  .pricing-button.is-featured:hover,
  .pricing-button.is-featured:active {
    opacity: 0.7;
    color: white
  }
  .pricing-price {
    color: black;
    display: block;
    font-weight: 700;
}

.price-amount {
    font-size: 36px;
}
</style>



