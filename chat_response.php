<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT Response</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>ChatGPT Response</h1>
    <?php
    // Get the response from the URL parameter
    $response = urldecode($_GET['response']);
    ?>
    <p><strong>You:</strong> <?php echo $_POST['message']; ?></p>
    <p><strong>ChatGPT:</strong> <?php echo $response; ?></p>
</body>
</html>
