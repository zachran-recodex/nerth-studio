<x-customer-layout>
    <div class="container">
        <div class="left-section">
            <a href="{{ route('home') }}">
                <h1>Nerth Studio</h1>
            </a>
            <img src="{{ asset('img/slide1.png') }}" alt="swiper">
        </div>
        <div class="right-section">
            <div class="subtitle">
                <img src="{{ asset('favicon.ico') }}" alt="Logo">
                <h2>Login To Your Account</h2>
            </div>
            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-control">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="create-account-btn">Login Now</button>
                </div>
            </form>

            <div class="form-footer">
                <p>Not Registered? <a href="{{ route('customer.register') }}">Create Account</a></p>
            </div>
        </div>
    </div>
</x-customer-layout>
