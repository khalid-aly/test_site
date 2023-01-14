<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");

}
else{
  echo $_SESSION['email'];
  echo ('<a href="logout.php" title="Logout">Logout.</a>');
}
include ('header.php');



?>
<head>
       
        <link ref="stylesheet" href="style.css"  >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    </head>
<body>

<div class="about">
<h2>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem reprehenderit officia rerum voluptatibus? Laborum,
     voluptatum quia obcaecati beatae eaque voluptas rem cumque dolore dignissimos fuga iste deserunt quaerat, quis error.
</h2>
</div>
<h1>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem reprehenderit officia rerum voluptatibus? Laborum,
     voluptatum quia obcaecati beatae eaque voluptas rem cumque dolore dignissimos fuga iste deserunt quaerat, quis error.
</h1>
<h2>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem reprehenderit officia rerum voluptatibus? Laborum,
     voluptatum quia obcaecati beatae eaque voluptas rem cumque dolore dignissimos fuga iste deserunt quaerat, quis error.
</h2>
<h2>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem reprehenderit officia rerum voluptatibus? Laborum,
     voluptatum quia obcaecati beatae eaque voluptas rem cumque dolore dignissimos fuga iste deserunt quaerat, quis error.
</h2>
<h2>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem reprehenderit officia rerum voluptatibus? Laborum,
     voluptatum quia obcaecati beatae eaque voluptas rem cumque dolore dignissimos fuga iste deserunt quaerat, quis error.
</h2>
</body>


<?php


include ('footer.php');


?>