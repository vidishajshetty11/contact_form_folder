
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insert.php" method="POST">
<label>Full Name </label>
<input type="text" name="full_name" required></input>

<label>Phone Number </label>
<input type="tel" name="phone_number" onKeypress="return event.charCode>=48 && event.charCode<=57" required></input>

<label>Email: </label>
<input type="email" name="email" required></input>

<label>Subject: </label>
<input type="text" name="subject" required></input> 

<label>Message:</label>
<input type="text" name="message" required></input> 

<button type="submit">SUBMIT </button>
</form>
</body>
</html>
