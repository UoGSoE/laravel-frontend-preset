
<nav class="navbar is-info" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/') }}">
      School of Engineering {{ config('app.name', 'Laravel') }}
    </a>
    <button class="button is-primary navbar-burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <div class="navbar-menu" id="navMenu">
    @auth
      <div class="navbar-start">
        @if (auth()->user()->isAdmin())
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Admin</a>
            <div class="navbar-dropdown">

              <a class="navbar-item" href="#">
                A Report
              </a>

              <hr class="navbar-divider" />

              <a class="navbar-item" href="#">
                Some other thing
              </a>
            </div>
        </div>
        @endif
      </div>
      <div class="navbar-end">

        <div class="navbar-item has-dropdown is-hoverable">
          <a href="" class="navbar-link">
              {{ Auth::user()->full_name }}
          </a>
          <div class="navbar-dropdown is-right">
            <form method="POST" action="{{ url('/logout') }}" class="navbar-item">
              {{ csrf_field() }}
              <a href="#" onclick="this.parentNode.submit()">Log Out</a>
            </form>
          </div>
        </div>

      </div>
    @endauth
  </div>
</nav>
<script>
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>
