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
                <h2>Sign Up for more exclusive contents</h2>
            </div>
            <div class="title">
                <h2>Create account</h2>
                <p>For personal or business.</p>
            </div>

            <form method="POST" action="{{ route('customer.register') }}">
                @csrf
                <div class="form-group">
                    <div class="form-control">
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            :value="old('first_name')" required autofocus autocomplete="first_name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <div class="form-control">
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                            :value="old('last_name')" required autofocus autocomplete="last_name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-control">
                        <x-input-label for="birth_date" :value="__('Date of Birth')" />
                        <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date"
                            :value="old('birth_date')" required autocomplete="birth_date" />
                        <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-control">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms_privacy" name="terms_privacy" required>
                    <label for="terms_privacy">
                        I agree to all the
                        <a href="#" style="color: gray">Terms</a>
                        and
                        <a href="#" style="color: gray">Privacy policy</a>
                    </label>
                </div>
                <div class="form-actions">
                    <button type="submit" class="create-account-btn">Create account</button>
                    <button type="button" class="google-signin-btn">
                        <img src="{{ asset('img/google.png') }}" alt="Google" style="width: 20px"> Sign-in with
                        Google
                    </button>
                </div>
            </form>

            <div class="form-footer">
                <p>Already have an account? <a href="{{ route('customer.login') }}">Log In</a></p>
            </div>
        </div>
    </div>
</x-customer-layout>
