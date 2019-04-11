<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$query = $json->queryResult->queryText;
	$text = $json->queryResult->parameters->keyword;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'chatbot':
			$speech = "Yes, you can type anything here. We got the query. ";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	$response->fulfillmentText= "This is a text response"." ".$query." ".$text
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
