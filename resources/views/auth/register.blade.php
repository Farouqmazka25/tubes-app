<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
  * {
    box-sizing: border-box;
  }

  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Abu terang */
  }

  .gradient-custom {
    background-color: #f8f9fa;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px;
  }

  .card {
    background-color: #1e2a38; /* Navy gelap */
    border-radius: 15px;
    padding: 30px;
    max-width: 500px;
    width: 100%;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    color: white;
  }

  .form-outline {
    margin-bottom: 1rem;
  }

  .form-label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: white;
  }

  .form-control {
    width: 100%;
    padding: 10px 15px;
    font-size: 16px;
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 5px;
    color: #212529;
  }

  .form-control::placeholder {
    color: #6c757d;
  }

  .btn {
    padding: 12px 25px;
    background: linear-gradient(to right, #6c757d, #adb5bd); /* Abu gradasi */
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
  }

  .btn:hover {
    background: linear-gradient(to right, #5a6268, #a3b0b8);
  }
</style>

</head>
<body>
  <section class="gradient-custom">
    <div class="card">
      <h3 class="mb-4">Registration Form</h3>
      
      <form method="POST" action="{{ route('register') }}">
  @csrf

  <!-- Nama -->
  <div class="form-outline">
    <label class="form-label" for="nama">Nama</label>
    <input type="text" id="name" name="name" class="form-control" required />
  </div>

  <!-- Email -->
  <div class="form-outline">
    <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control" required />
  </div>

  <!-- Alamat -->
  <div class="form-outline">
    <label class="form-label" for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" class="form-control" required />
  </div>

  <!-- No HP -->
  <div class="form-outline">
    <label class="form-label" for="no_hp">No. HP</label>
    <input type="tel" id="no_hp" name="no_hp" class="form-control" required />
  </div>

  <!-- Password -->
  <div class="form-outline">
    <label class="form-label" for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" required />
  </div>

  <!-- Konfirmasi Password -->
  <div class="form-outline">
    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required />
  </div>

  <!-- Submit -->
  <div class="mt-4 text-center">
    <input class="btn btn-primary d-inline-block" type="submit" value="Submit" />
  </div>

</form>

    </div>
  </section>
</body>
</html>
