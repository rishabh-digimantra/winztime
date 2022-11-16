<?php
	if(isset($_POST['submitBtn']))
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$Phone = $_POST['Phone'];
		$email = $_POST['email'];

		$to = $email;
		$subject = 'Winztime|To our dear subscriber.';
		$message = 'First Name: '.$first_name.'\n'.'Last Name: '.$last_name.'\n'.'Phone: '.$Phone; 
		
	    $servername = "localhost";
$username = "winztime_landing";
$password = "OARlWl=uPT5[";
$dbname = "winztime_landing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// $sql = "INSERT INTO users('firstname', 'lastname', 'phone', 'email') 
// VALUES ('.$first_name.','.$last_name.','.$Phone.','.$email.')";
$sql = "INSERT INTO users (firstname, lastname, phone, email)
VALUES ('".$first_name."', '".$last_name."', '".$Phone."','".$email."')";

if (mysqli_query($conn, $sql)) {
  if(mail("sharoz.alam.khan@gmail.com", $subject, $message)){
		// echo mail();exit;
	    header("Location: https://winztime.com/landing/thankyou.php");
	} else{
	    echo 'Your mail has been not sent successfully. Good luck!';
	}
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
	 
	// Sending email
	
	}?>
<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<title>Winztime</title>

	<meta name="keywords" content="" />

	<meta name="description" content="" />

	<link rel="icon" type="image/x-icon" href="assets/images/favicon.png" />

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">

	<link href="assets/fontawesome/css/all.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="assets/css/default.css"/>

	<link rel="stylesheet" type="text/css" href="style.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J27Q0L2D4W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J27Q0L2D4W');
</script>


<!--[if lt IE 9]>

<script type='text/javascript' src='assets/js/html5.js'></script>

<![endif]-->

<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

</head>

<body>

	<noscript>

		<div id="jqcheck"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB60lEQVQ4T2NkwAHePzrxf3ebL1jWp/0oA5egGiM2pVgFQQq31uj/N/ANZvj+8T3D7aNHGDwbTxNvwKtbO/9f3dLHYJ+axfDn5w+GI/NnMRhFtTEISJtjGIIh8Pv39/87ak0ZzCLiGMRUNMCufnLxDMOlrZsY3JtOMrCwsKPowTDg3tGZ/59f2sVgFRvPkO+bAzZgwsZJDEcXzWNQtIlikDGIwG3Az+9v/+9qsGOwTc1h4JeQhhswcfMUhrcP7zEcXzyXwb3xMAMbuwDcEBTTzi7P/s/M8IFB3zccbDPMBSADQODs2sUMzFwyDIah/ZgGfHt/7/+BvmAGm+RsBl4RMawGfHr5jOHowlkMjiUbGDj55MCGwE060Of1X0RZi0Hb2Q4e3eguAElc2X2A4e2DmwwOhVsRBnx6cfH/yXm5DFZxyQxcAoJ4Dfj24T3DsUVzGcwSJjLwSxkygk3ZVmv4X805gkHZRBNXwkQRv3/+NsP1nUsYvFvOMzI+PLXo/73DSxgsouIYOHj5UBRi8wJIwY8vnxlOLV/CIGcewsC4vkDhv01yLoOIoiqG7bgMACn88Owxw8HpvQyMGwqV/vs19TMwQnxDEthYW8DAeGCC3/9XN46TpBGmWEzDkoHx06dP/z9//kyWAby8vAwAcza2SBMOSCMAAAAASUVORK5CYII=" alt="Javascript is disabled" width="16" height="16"> Javascript is disabled. Please enable it for better working experience.</div>

	</noscript>

<div class="mainWrapper">

	<header class="header">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<!-- <a href="/" title="" class="logo"><img src="assets/images/logo.png"></a> -->

				</div>

			</div><!-- LOGBAR END HERE -->

		</div>

		<div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div> <div class="circle-container"> <div class="circle"></div> </div>

	</header><!-- HEADER END HERE -->





	<section class="main-section home-section-five">

		<div class="contactForm">

			<div class="">

				<div class="row align-center d-flex justify-content-center">

					<div class="col-md-4">

						<figure class="mascotImgFigure">

							<img src="assets/images/mas4.PNG" class="mascotImg">

						</figure>

					</div>

					<div class="col-md-4">

						<a href="/" title="" class="logo"><img src="assets/images/logo.png"></a>

						<div class="contactFormWrap">

							<form action="https://winztime.com/landing/index.php" name="form1" method="post">

								<div class="row">

									<div class="col-md-12">

										<div class="form-group">

											<input type="text" name="first_name" placeholder="First Name" required id="first_name" class="form-control"  autocomplete="off">

										</div>

									</div>

									<div class="col-md-12">

										<div class="form-group">

											<input type="text" name="last_name" placeholder="Last Name" required id="last_name" class="form-control"  autocomplete="off">

										</div>

									</div>


									<div class="col-md-12">

										<div class="form-group">
                                            <input pattern="^.\d{5,15}" placeholder="Phone" name="Phone"  required title="5 to 15 Numbers Only" class="form-control"  autocomplete="off">
										</div>

									</div>

									<div class="col-md-12">

										<div class="form-group">

											<input type="email" name="email" placeholder="Email" required id="email" class="form-control"  autocomplete="off">

										</div>

									</div>

									<div class="col-md-12">

										<button type="submit" name="submitBtn" value="send" onchange="phonenumber(document.form1.Phone)" class="btn"><span>Send</span></button>

									</div>
									<br>
									<div class="col-md-12">
										<p style="color: white; display: none;" class="sucess">Your mail has been sent successfully. Good luck!</p>
									</div>

								</div>

							</form>


						</div>



						<ul class="socialSide socialSide2 text-center">

							<li><a href="https://instagram.com/winztimeuae"><i class="fab fa-instagram"></i></a></li>

							<li><a href="https://www.facebook.com/Winztime-110445164590731"><i class="fab fa-facebook-f"></i></a></li>

							<li><a href="https://youtube.com/channel/UCF_-XYC6abqSxypR4RW1gEg"><i class="fab fa-youtube"></i></a></li>

							<li><a href="https://wa.me/+971552801120"><i class="fab fa-whatsapp"></i></a></li>

						</ul>

					</div>


<!-- 					Winztime landing page pe ye text update krden aur social media links lga den

Be a winner with Winztime
10 lucky entries stand a chance to win vouchers worth AED 500 for mall of the Emirates.
Register your entry today!

https://instagram.com/winztimeuae
https://www.facebook.com/Winztime-110445164590731
https://youtube.com/channel/UCF_-XYC6abqSxypR4RW1gEg

Instead of twitter, add whatsapp icon and use this number +971 55 280 1120 -->




					<div class="col-md-4">

						<p class="text-center customText">Be a winner with Winztime. <span class="span2"><strong>10</strong> lucky</span> 
						entries stand a chance to win vouchers worth
						<span class="spanNew">AED 500</span> for mall of the Emirates. <small >Register your entry <strong>today!</strong></strong></small></p>
					</div>

					</div>

				</div>

			</div>

		</div>



	</section>





	<!-- <footer class="footer">

		<div class="copy">

			<div class="container">

				<div class="row">

					<div class="col-md-4">

						<p class="text-start">© 2021 Powered by <a href="javascript:;">Winztime.</a></p>

					</div>

					<div class="col-md-4">

						<ul class="socialSide socialSide2 text-center">

							<li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>

							<li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>

							<li><a href="javascript:;"><i class="fab fa-youtube"></i></a></li>

							<li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>

						</ul>

					</div>

					<div class="col-md-4">

						<p class="text-end">Designed and Developed by <a href="https://www.digitalsetgo.com/">DigitalsetGo</a>.</p>

					</div>

				</div>

			</div>

		</div>

	</footer> -->

</div>

	<script defer type="text/javascript" src="assets/fontawesome/js/all.js"></script>

	<script type="text/javascript" src="assets/js/xJquery.js"></script>

	<script defer type="text/javascript" src="assets/js/script.js"></script>

	<div class="cursor"></div>

<script type="text/javascript">
function phonenumber(inputtxt)
{
  var phoneno = /^\d{10}$/;
  if(inputtxt.value.match(phoneno))
  {
      return true;
  }
  else
  {
     alert("Not a valid Phone Number");
     return false;
  }
  }

	
	// helper functions
const PI2 = Math.PI * 2
const random = (min, max) => Math.random() * (max - min + 1) + min | 0
const timestamp = _ => new Date().getTime()

// container
class Birthday {
  constructor() {
    this.resize()

    // create a lovely place to store the firework
    this.fireworks = []
    this.counter = 0

  }
  
  resize() {
    this.width = canvas.width = window.innerWidth
    let center = this.width / 2 | 0
    this.spawnA = center - center / 4 | 0
    this.spawnB = center + center / 4 | 0
    
    this.height = canvas.height = window.innerHeight
    this.spawnC = this.height * .1
    this.spawnD = this.height * .5
    
  }
  
  onClick(evt) {
     let x = evt.clientX || evt.touches && evt.touches[0].pageX
     let y = evt.clientY || evt.touches && evt.touches[0].pageY
     
     let count = random(3,5)
     for(let i = 0; i < count; i++) this.fireworks.push(new Firework(
        random(this.spawnA, this.spawnB),
        this.height,
        x,
        y,
        random(0, 260),
        random(30, 110)))
          
     this.counter = -1
     
  }
  
  update(delta) {
    ctx.globalCompositeOperation = 'hard-light'
    ctx.fillStyle = `rgba(20,20,20,${ 7 * delta })`
    ctx.fillRect(0, 0, this.width, this.height)

    ctx.globalCompositeOperation = 'lighter'
    for (let firework of this.fireworks) firework.update(delta)

    // if enough time passed... create new new firework
    this.counter += delta * 3 // each second
    if (this.counter >= 1) {
      this.fireworks.push(new Firework(
        random(this.spawnA, this.spawnB),
        this.height,
        random(0, this.width),
        random(this.spawnC, this.spawnD),
        random(0, 360),
        random(30, 110)))
      this.counter = 0
    }

    // remove the dead fireworks
    if (this.fireworks.length > 1000) this.fireworks = this.fireworks.filter(firework => !firework.dead)

  }
}

class Firework {
  constructor(x, y, targetX, targetY, shade, offsprings) {
    this.dead = false
    this.offsprings = offsprings

    this.x = x
    this.y = y
    this.targetX = targetX
    this.targetY = targetY

    this.shade = shade
    this.history = []
  }
  update(delta) {
    if (this.dead) return

    let xDiff = this.targetX - this.x
    let yDiff = this.targetY - this.y
    if (Math.abs(xDiff) > 3 || Math.abs(yDiff) > 3) { // is still moving
      this.x += xDiff * 2 * delta
      this.y += yDiff * 2 * delta

      this.history.push({
        x: this.x,
        y: this.y
      })

      if (this.history.length > 20) this.history.shift()

    } else {
      if (this.offsprings && !this.madeChilds) {
        
        let babies = this.offsprings / 2
        for (let i = 0; i < babies; i++) {
          let targetX = this.x + this.offsprings * Math.cos(PI2 * i / babies) | 0
          let targetY = this.y + this.offsprings * Math.sin(PI2 * i / babies) | 0

          birthday.fireworks.push(new Firework(this.x, this.y, targetX, targetY, this.shade, 0))

        }

      }
      this.madeChilds = true
      this.history.shift()
    }
    
    if (this.history.length === 0) this.dead = true
    else if (this.offsprings) { 
        for (let i = 0; this.history.length > i; i++) {
          let point = this.history[i]
          ctx.beginPath()
          ctx.fillStyle = 'hsl(' + this.shade + ',100%,' + i + '%)'
          ctx.arc(point.x, point.y, 1, 0, PI2, false)
          ctx.fill()
        } 
      } else {
      ctx.beginPath()
      ctx.fillStyle = 'hsl(' + this.shade + ',100%,50%)'
      ctx.arc(this.x, this.y, 1, 0, PI2, false)
      ctx.fill()
    }

  }
}

let canvas = document.getElementById('birthday')
let ctx = canvas.getContext('2d')

let then = timestamp()

let birthday = new Birthday
window.onresize = () => birthday.resize()
document.onclick = evt => birthday.onClick(evt)
document.ontouchstart = evt => birthday.onClick(evt)

  ;(function loop(){
  	requestAnimationFrame(loop)

  	let now = timestamp()
  	let delta = now - then

    then = now
    birthday.update(delta / 1000)
  	

  })()

</script>


</body>

</html>






