<div class="form-group">
    <label for="name">Name</label><br>
    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name', $contact->name ?? '') }}"
        required
    >

    @error('name')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="contact">Contact</label><br>
    <input
        type="text"
        id="contact"
        name="contact"
        value="{{ old('contact', $contact->contact ?? '') }}"
        required
    >

    @error('contact')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email address</label><br>
    <input
        type="email"
        id="email"
        name="email"
        value="{{ old('email', $contact->email ?? '') }}"
        required
    >

    @error('email')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>