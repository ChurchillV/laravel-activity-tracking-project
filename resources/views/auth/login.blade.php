<x-layout>
  <div class="flex flex-col justify-center items-center min-h-screen px-4">
    <form action="{{ route('login') }}" method="POST" class="bg-white shadow rounded-lg p-6 w-full max-w-sm">
      @csrf

      <h2 class="text-2xl font-bold text-center text-green-700 mb-6">Log In to Your Account</h2>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold mb-1">Email:</label>
        <input
          class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-300"
          type="email"
          name="email"
          id="email"
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
        <x-show_password />
      </div>

      <button
        type="submit"
        class="w-full bg-green-500 text-white font-semibold py-2 rounded-md hover:bg-green-600 transition"
      >
        Log in
      </button>

      <!-- validation errors -->
      <div class="mt-4">
        <x-errors />
      </div>
    </form>
  </div>

  <script>
    window.togglePasswordVisibility = function () {
        const passwordFields = [
            document.getElementById('password'),
            document.getElementById('password_confirmation')
        ];

        passwordFields.forEach(field => {
            if (field.type === 'password') {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        });
    }
   </script>
</x-layout>
