@if (session('success'))
  <div
    id="toast"
    class="fixed top-5 right-5 px-4 py-2 rounded shadow text-sm font-bold bg-green-50 text-green-500"
  >
    {{ session('success') }}
  </div>

  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast');
      if (toast) {
        toast.style.display = 'none';
      }
    }, 3000); // 3 seconds
  </script>
@endif
