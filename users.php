<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: loginchat.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span>
              <?php echo $row['fname'];?>
            </span>
            <p>
              <?php echo $row['status']; ?>
            </p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name or Email-id to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
      if (disclaimer) {
        disclaimer.remove();
      }
    });
  </script>
</body>

</html>