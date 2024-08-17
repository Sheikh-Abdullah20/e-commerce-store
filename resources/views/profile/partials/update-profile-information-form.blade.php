<section>
    <header>
        <h2 class="display-5">
            {{ __('Profile Information') }}
        </h2>

        <p class="mb-3">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('patch')
        @php
            $user = Auth::user();
        @endphp
        <figure class="text-lg-center">
            @isset($user->profile)
            <img class="img-lg mb-3 img-avatar" id="img" src="{{ asset('storage/'. $user->profile) }}" alt="User Photo" />
            @else
            <img class="img-lg mb-3 img-avatar" id="img" src="assets2/imgs/people/avatar-1.png" alt="User Photo" />
            @endisset
            <figcaption>
                <button id="upload_button" class="btn btn-light rounded font-md"> <i class="icons material-icons md-backup font-md"></i> Upload </button>
                <input type="file" hidden onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])"  name="profile" id="file">
            </figcaption>
        </figure>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mb-3" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mb-2" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mb-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-primary">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-dark">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-dark"
                >{{ __('Saved.') }}</p>
            @endif
        </div>


    </form>
</section>
