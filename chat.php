<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set your ChatGPT API key here
    $api_key = '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';

    // Get the user's message from the form input
    $message = $_POST['message'];

    // Build the API request URL
    $url = "https://api.openai.com/v1/engine/davinci-codex/completions";
    $data = array(
        'prompt' => $message,
        'max_tokens' => 60,
        'n' => 1,
        'stop' => "\n"
    );
    $headers = array(
        'Content-Type: application/json',
        "Authorization: Bearer $api_key"
    );

    // Send the API request
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the API response
    $json = json_decode($response);
    $chat_response = $json->choices[0]->text;

    // Display the API response in a new window
    echo '<script>window.open("chat_response.php?response=' . urlencode($chat_response) . '", "_blank");</script>';
}
?>
