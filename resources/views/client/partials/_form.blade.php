<section class="section-lg">
    <div class="box form__inner">
        <div class="form__inner__formside">
            <h3 class="section-title">Book an Appointement</h3>
            <form method="POST" action="{{ route('applications.store') }}" class="form__inner__form">
                @csrf
                <div class="form__inner__form__inputs">
                    <input type="text" name="full_name" placeholder="Full Name" class="form__inner__form__input">
                    <input type="email" name="email" placeholder="Email" class="form__inner__form__input">
                    <input type="text" name="phone_number" placeholder="Phone number"
                        class="form__inner__form__input">
                    <select name="service_id" class="form__select" aria-placeholder="sa">
                        <option value="*" disabled selected>
                            Xizmatni tanlang
                        </option>
                        @foreach ($services as $service)
                            <option value="{{ $service['id'] }}">{{ $service['name'][$locale] }}</option>
                        @endforeach
                    </select>
                    <textarea name="message" cols="30" rows="5" class="form__inner__form__input" placeholder="Your Message Here"></textarea>
                    @error('service')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="form__inner__form__button">Send</button>
            </form>
        </div>
        <div class="form__inner__imageside">
            <img src="{{ asset('client/media/form-image.jpg') }}" alt="Cars" class="image">
        </div>
    </div>
</section>
