<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Login & Signup Form</title>
    <link rel="stylesheet" href="css/styl.css" />
  </head>
  <style>
        .alert {
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            background-color: #9e44b3;
            border: 1px solid #dc3545;
        }

        .alert-danger {
            background-color:#9e44b3;
            border-color: #dc3545;
        }
    </style>
  <body>
    <img src="image/4.png" alt="" id="logoo">
    <section class="wrapper">
    @if(session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
    @endif
      <div class="form signup">
        <header>Signup</header>
        <form action="{{ route('signup') }}" method="POST">
          @csrf
          <input type="text" name="name" placeholder="Full name" required />
          <input type="text" name="email" placeholder="Email address" required />
          <input type="password" name="password" placeholder="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>

      <!-- @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif -->
      <div class="form login">
        <header>Login</header>
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
        @csrf
          <input type="text"  name="email" placeholder="Email address" required />
          <input type="password" name="password" placeholder="Password" required />
          <!-- <a href="#">Forgot password?</a> -->
          <input type="submit" value="Login" />
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
  </body>
</html>