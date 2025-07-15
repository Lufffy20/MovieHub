@extends('admino.main')

@section('main-section')

<div class="main-title mb-6">
  <p class="font-bold text-2xl text-gray-800">⚙️ Admin Settings</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

  <!-- Admin Info -->
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold mb-4 text-gray-700">👤 Admin Profile</h3>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.updateProfile') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" 
               value="{{ old('name', auth()->user()->name ?? '') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" 
               value="{{ old('email', auth()->user()->email ?? '') }}">
      </div>
      <button type="submit" class="btn btn-primary mt-2">Update Profile</button>
    </form>
  </div>

  <!-- Change Password -->
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold mb-4 text-gray-700">🔒 Change Password</h3>

    <form method="POST" action="{{ route('admin.changePassword') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Current Password</label>
        <input type="password" name="current_password" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Confirm New Password</label>
        <input type="password" name="new_password_confirmation" class="form-control">
      </div>
      <button type="submit" class="btn btn-warning mt-2">Change Password</button>
    </form>
  </div>
</div>

<!-- Website Settings -->
<div class="bg-white rounded-xl shadow p-6 mt-8">
  <h3 class="text-lg font-semibold mb-4 text-gray-700">🌐 Website Preferences</h3>

  <form method="POST" action="{{ route('admin.updateWebsiteSettings') }}">
    @csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Website Name</label>
        <input type="text" name="site_name" class="form-control"
               value="{{ old('site_name', $settings->site_name ?? 'MovieHub') }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Contact Email</label>
        <input type="email" name="contact_email" class="form-control"
               value="{{ old('contact_email', $settings->contact_email ?? '') }}">
      </div>
      <div class="col-md-12">
        <label class="form-label">Footer Text</label>
        <input type="text" name="footer_text" class="form-control"
               value="{{ old('footer_text', $settings->footer_text ?? '') }}">
      </div>
    </div>
    <button type="submit" class="btn btn-success mt-3">Save Website Settings</button>
  </form>
</div>

@endsection
