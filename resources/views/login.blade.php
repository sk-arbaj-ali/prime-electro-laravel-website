@extends('MasterLayout')

@section('styles')
<style>
    /* ===== Buttons Css ===== */
    .signin-one .rounded-buttons .primary-btn {
    background: var(--primary);
    color: var(--white);
    box-shadow: var(--shadow-2);
    }
    .signin-one .rounded-buttons .active.primary-btn, .signin-one .rounded-buttons .primary-btn:hover, .signin-one .rounded-buttons .primary-btn:focus {
    background: var(--primary-dark);
    color: var(--white);
    box-shadow: var(--shadow-4);
    }
    .signin-one .rounded-buttons .deactive.primary-btn {
    background: var(--gray-4);
    color: var(--dark-3);
    pointer-events: none;
    }

    .signin-one .rounded-buttons .primary-btn-outline {
    border-color: var(--primary);
    color: var(--primary);
    }
    .signin-one .rounded-buttons .active.primary-btn-outline, .signin-one .rounded-buttons .primary-btn-outline:hover, .signin-one .rounded-buttons .primary-btn-outline:focus {
    background: var(--primary-dark);
    color: var(--white);
    }
    .signin-one .rounded-buttons .deactive.primary-btn-outline {
    color: var(--dark-3);
    border-color: var(--gray-4);
    pointer-events: none;
    }

    /*===========================
    SING IN SING UP css 
    ===========================*/
    .signin-one {
    padding-top: 100px;
    padding-bottom: 100px;
    background-color: var(--light-2);
    }
    .signin-one .form-input {
    margin-top: 16px;
    }
    .signin-one .form-input .main-btn {
    width: 100%;
    }
    .signin-one .form-input .text {
    font-size: 16px;
    line-height: 24px;
    color: var(--dark-3);
    }
    .signin-one .form-input .text a {
    color: var(--primary);
    }
    .signin-one .signin-form {
    background-color: var(--white);
    padding: 40px;
    border: 1px solid var(--gray-4);
    border-radius: 8px;
    }
    .signin-one .rounded-buttons {
    margin-top: 20px;
    }
    .signin-one .rounded-buttons .primary-btn {
    width: 100%;
    }
    .signin-one .rounded-buttons .primary-btn-outline {
    width: 100%;
    }
    .signin-one .form-input .help-block {
    margin-top: 2px;
    }
    .signin-one .form-input .help-block .list-unstyled li {
    font-size: 12px;
    line-height: 16px;
    color: var(--error);
    }
    .signin-one .form-input label {
    font-size: 12px;
    line-height: 18px;
    color: var(--dark-3);
    margin-bottom: 8px;
    display: inline-block;
    }
    .signin-one .form-input .input-items {
    position: relative;
    }
    .signin-one .form-input .input-items input, .signin-one .form-input .input-items textarea {
    width: 100%;
    height: 44px;
    border: 2px solid;
    padding-left: 44px;
    padding-right: 12px;
    position: relative;
    font-size: 16px;
    }
    .signin-one .form-input .input-items textarea {
    padding-top: 8px;
    height: 130px;
    resize: none;
    }
    .signin-one .form-input .input-items i {
    position: absolute;
    top: 11px;
    left: 13px;
    font-size: 20px;
    z-index: 9;
    }
    .signin-one .form-input .input-items.default input, .signin-one .form-input .input-items.default textarea {
    border-color: var(--gray-4);
    color: var(--dark-3);
    }
    .signin-one .form-input .input-items.default input:focus, .signin-one .form-input .input-items.default textarea:focus {
    border-color: var(--primary);
    }
    .signin-one .form-input .input-items.default input::placeholder, .signin-one .form-input .input-items.default textarea::placeholder {
    color: var(--dark-3);
    opacity: 1;
    }
    .signin-one .form-input .input-items.default i {
    color: var(--dark-3);
    }
    .signin-one .form-input .input-items.error input, .signin-one .form-input .input-items.error textarea {
    border-color: var(--error);
    color: var(--error);
    }
    .signin-one .form-input .input-items.error input::placeholder, .signin-one .form-input .input-items.error textarea::placeholder {
    color: var(--error);
    opacity: 1;
    }
    .signin-one .form-input .input-items.error i {
    color: var(--error);
    }
    .signin-one .form-style-two .form-input .input-items input, .signin-one .form-style-two .form-input .input-items textarea {
    border-radius: 5px;
    padding-left: 12px;
    padding-right: 44px;
    }
    .signin-one .form-style-two .form-input .input-items i {
    left: auto;
    right: 13px;
    }

    .signin-content .signin-title {
    font-size: 24px;
    line-height: 30px;
    color: var(--black);
    }
    .signin-content .text {
    font-size: 16px;
    line-height: 24px;
    color: var(--dark-3);
    margin-top: 8px;
    }
</style>
@endsection

@section('main_content')

<section class="container">
    <!--====== SIGNIN ONE PART START ======-->
    <section class="signin-area signin-one">
        <div class="container">
            <h2 class="text-center">Login with credentials</h2>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <form action="{{ route('user-login') }}" method="post">
                        @csrf
                        <div class="signin-form form-style-two rounded-buttons">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-input">
                                        <label>Provide the email</label>
                                        <div class="input-items default">
                                            <input type="text" placeholder="Email" name="email" />
                                            <i class="lni lni-envelope"></i>
                                        </div>
                                        <div class="errors my-2">
                                            @error('email')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- form input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input">
                                        <label>Password for your account</label>
                                        <div class="input-items default">
                                            <input type="password" placeholder="Password" name="password" />
                                            <i class="lni lni-key"></i>
                                        </div>
                                        <div class="errors my-2">
                                            @error('password')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input rounded-buttons">
                                        <a
                                            class="btn primary-btn rounded-full"
                                            type="submit"
                                            href="{{ route('signup-form') }}"
                                        >
                                            SignUp!
                                        </a>
                                    </div>
                                    <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input rounded-buttons">
                                        <button
                                            class="btn primary-btn-outline rounded-full"
                                            type="submit">
                                            Login
                                        </button>
                                    </div>
                                    <!-- form input -->
                                </div>
                            </div>
                        </div>
                        <!-- signin form -->
                    </form>
                </div>
            </div>
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="error">
                        @if($errors->any())
                        <p class="alert alert-danger text-center">invalid credentials</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </section>
    <!--====== SIGNIN ONE PART ENDS ======-->
</section>

@endsection