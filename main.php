<?php
$loggedin = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "miniproject";
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if (isset($_POST["loginemail"]) && isset($_POST["loginpassword"])) {
        $email = $_POST["loginemail"];
        $password = $_POST["loginpassword"];
        $stmt = $conn->prepare("SELECT * FROM dataset WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                echo "<script>alert('Login successful!');</script>";
                $loggedin = true;
                $displayedUsername = $row["username"];
            } else {
                echo "<script>alert('Email or Password Mismatched');</script>";
            }
        } else {
            echo "<script>alert('Register first to Login');</script>";
        }
    }

    if (isset($_POST["registeremail"]) && isset($_POST["registerpassword"]) && isset($_POST["username"])) {
        $username = $_POST["username"];
        $email = $_POST["registeremail"];
        $password = $_POST["registerpassword"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO dataset (email, password, username) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $hashedPassword, $username);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Now Login.');</script>";
        } else {
            echo "<script>alert('Registration failed: " . $stmt->error . "');</script>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPY BODY PLANS</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="website icon" type="png" href="./images/oglogo.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>

<body>
    <div class="container">
        <div class="outer">
            <section class="paralax">
                <img src="./images/run.webp" id="paralax">
            </section>
            <nav>
                <div id="logo"><img src="./images/whitelogo.png"></div>
                <div class="nav-links">
                    <ul>
                        <li><a href="./workout.html" target="_blank">WORKOUT</a></li>
                        <li><a href="./nutrition.html" target="_blank">NUTRITION</a></li>
                        <li><a href="./diet.html" target="_blank">DIET</a></li>
                        <li><a href="./contact.php">CONTACT</a></li>
                        <li><a class="pp" id="nonhide">LOGIN</a></li>
                    </ul>
                    
                </div>
            </nav>
            <div class="hello" id="hide">Hello! <b style="font-size: x-large;"> <?php echo $displayedUsername; ?> </b> 
            </div>
           
            <div class="textbox">
                <h1>"The body achieves what the mind believes"</h1>
                <p>Embrace the Journey to Fitness and Health! <br>
                     Our website is your ultimate destination for all things wellness.
                    <br> Discover effective workouts, and nourishing tips to nurture your body and mind.<br>
                Login! and  Start your transformation today</p>
               <div id="hide2"><a href="./bmi.html" class="hero" target="_blank">CLICK TO START WITH YOUR JOURNEY NOW.!</a></div>
            </div>
            <div class="wrapper">
                <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
                <div class="form-box login">

                <!-- ******************************************************************************** -->
                    <h2>Login</h2>
                    <form action="main.php" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                            <input type="email" id="email" required name="loginemail" autocomplete="off">
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <input type="password" id="password" required name="loginpassword" autocomplete="off">
                            <label>Password</label>
                        </div>
                        <button type="submit"  class="btn6" value="Login" id="loginbtn">Login</button>
                        <div class="login-register">
                          <p> Don't Have an Account ? <a href="#" class="register-link">Register</a></p>  
                        </div>
                    </form>
                </div>
                

                     <script>
                        <?php if ($loggedin): ?>
                             document.getElementById("hide").style.display = "block";
                        <?php else: ?>
                             document.getElementById("hide").style.display = "none"; 
                     <?php endif; ?>
                </script>
                 <script>
                        <?php if ($loggedin): ?>
                             document.getElementById("hide2").style.display = "block";
                        <?php else: ?>
                             document.getElementById("hide2").style.display = "none"; 
                     <?php endif; ?>
                </script>
                 <script>
                        <?php if ($loggedin): ?>
                             document.getElementById("nonhide").style.display = "none";
                        <?php else: ?>
                             document.getElementById("nonhide").style.display = "inline-block"; 
                     <?php endif; ?>
                </script>
           <!-- *********************************************************************************      -->
                <div class="form-box register">
                    <h2>Registrartion</h2>
                    <form method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                            <input type="text" required id="uname" name="username" autocomplete="off">
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                            <input type="email" id="regemail" required name="registeremail" autocomplete="off">
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <input type="password" id="regpassword" name="registerpassword" >
                            <label>Password</label>
                        </div>
                        <button type="submit" class="btn6"  value="Register" name="submit">Register</button>
                        <div class="login-register">
                          <p> Already Have an Account ? <a href="#" class="login-link">Login</a></p>  
                        </div>
                    </form>
                </div>
            </div>
        <!-- ****************************************************************************************** -->
        </div> 
    </div>
    <section class="trip">
        <h1>What do we Actually Do.?</h1>
        <p>This project seeks to provide a user-centric platform, "Happy Body Plans," that utilizes BMI-derived data to offer diet plans, nutritional education, and workout routines.
        Revolutionizing the way individuals approach their fitness journey and empowering them to lead healthier, happier lives.
        </p>
        <div class="row">
            <div class="coloum">
                <h3>WORKOUT</h3>
                <p>Engaging video demonstrations of exercises for proper.
                    Variations and modifications for different fitness levels.</p>
            </div>
            <div class="coloum">
                <h3>NUTRITION</h3>
                <p>Information on essential nutrients, their sources, and benefits.
                    Guidance on making informed food choices for better health</p>
            </div>
            <div class="coloum">
                <h3>DIET</h3>
                <p>Utilization of BMI to determine appropriate fitness and diet strategies.
                    A scientific approach to ensure recommendations match individual requirements</p>
            </div>
        </div>
    </section>
    <section class="lalala">
        <h1>Follow up with our Roadmap</h1>
        <img src="./images/roadmap.jpg">
    </section>
    <section class="info">
        <h1>Why these Factors are Important</h1>
        <p>Hover on each to Know..!</p>
        <div class="row">
            <div class="col">
                <img src="./images/workoutog.jpg">
                <div class="layer">
                    <h3>WORKOUT <br> <span class="xxx">Regular exercise is crucial for physical and mental well-being. It enhances cardiovascular health, strengthens muscles and bones, and improves flexibility and balance. Engaging in physical activity releases endorphins, reducing stress and promoting a positive mood. It aids in weight management by burning calories and boosting metabolism, while also reducing the risk of chronic conditions such as diabetes and hypertension. Incorporating workouts into daily life contributes to increased energy, better sleep, and an overall higher quality of life.</span></h3>
                
                </div>
            </div>
            <div class="col">
                <img src="./images/nutritionog.jpg">
                <div class="layer">
                    <h3>NUTRITION  <br> <span class="xxx">Nutrition is the foundation of a thriving body. It encompasses not only the intake of essential macronutrients and micronutrients but also the body's ability to absorb and utilize them effectively. Nutrition supports the body's biochemical processes, ranging from energy production to cellular repair. <br> Essential vitamins and minerals obtained from a diverse range of foods are the building blocks that enable growth, sustain vitality, and maintain the delicate balance within our biological systems.</span></h3>   
                </div>
            </div>
            <div class="col">
                <img src="./images/dietog.jpg">
                <div class="layer">
                    <h3>DIET  <br> <span class="xxx">A well-balanced diet is a cornerstone of good health, providing the body with the vitamins, and minerals it needs for optimal functioning. It fuels our daily activities, supports growth and bolsters the immune system's defenses. A diet rich in whole grains, lean proteins, healthy fats, and a variety of fruits and vegetables helps maintain a healthy weight and reduces the risk of chronic conditions like heart disease and obesity. Proper dietary choices can positively impact cognitive function, contributing to an overall sense of well-being.</span></h3> 
                </div>
            </div>
        </div>
    </section>
    <section class="footer" id="about">
        <h4>ABOUT US</h4>
        <h3>Project Guide : Prof. Vaishali Chavan</h3>
        <h5>- Group Members -</h5>
    <div class="nm">
        <ul class="nm-link">
            <li>Soham Wanganekar</li>
            <li>Deeksha Upadhyay</li>
            <li>Tanish Shah</li>
            <li>Manthan Rathod</li>
        </ul>
    </div>
    <br>
    <br>
        <p>This Website is created Only for the Purpose of Project and Grades...!</p>
        <!-- <p>Made with ❤️ by Group-32</p> -->
    </section>
    <script src="./main.js"></script> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>