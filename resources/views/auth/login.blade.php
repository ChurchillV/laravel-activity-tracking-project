<x-layout>
  <form action="{{ route('login') }}" method="POST">
    @csrf

    <h2>Log In to Your Account</h2>

    <label for="email">Email:</label>
    <input
      type="email"
      name="email"
      id="password"
      value="{{ old('email') }}"
      required
    >

    <label for="password">Password:</label>
    <input
      type="password"
      name="password"
      id="password_confirmation"
      required
    >

    <button type="submit" class="btn mt-4">Log in</button>

    <!-- validation errors -->
    <x-errors />
  </form>
</x-layout>
