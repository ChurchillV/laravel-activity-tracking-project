<x-layout>
  <div class="flex flex-col justify-center items-center min-h-screen bg-gray-50 px-4">
    <form action="{{ route('register') }}" method="POST" class="bg-white shadow rounded-lg p-6 w-full max-w-sm">
      @csrf

      <h2 class="text-2xl font-bold text-center text-green-700 mb-6">Register for an Account</h2>

      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-semibold mb-1">Name:</label>
        <input
          class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-300"
          type="text"
          name="name"
          value="{{ old('name') }}"
          required
        >
      </div>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold mb-1">Email:</label>
        <input
          class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-300"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
        >
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold mb-1">Password:</label>
        <input
          class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-300"
          type="password"
          name="password"
          id="password"
          required
        >
      </div>

      <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirm Password:</label>
        <input
          class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-300"
          type="password"
          name="password_confirmation"
          id="password_confirmation"
          required
        >
      </div>

      <div class="mb-4 text-left">
        <button
          type="button"
          class="text-green-500 hover:underline text-sm"
          onclick="togglePasswordVisibility()"
        >
          Show Password
        </button>
      </div>

      <button
        type="submit"
        class="w-full bg-green-500 text-white font-semibold py-2 rounded-md hover:bg-green-600 transition"
      >
        Register
      </button>

      <!-- validation errors -->
      <div class="mt-4">
        <x-errors />
      </div>
    </form>
  </div>

  <script>
    function togglePasswordVisibility() {
      const password = document.getElementById('password');
      const confirm = document.getElementById('password_confirmation');
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      confirm.type = type;
    }
  </script>
</x-layout>
