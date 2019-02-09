<?php
if(isset($_POST['submit'])) { //checks to see the posted method file and check if submit button is clicked
	$file = $_FILES['file']; //variable from the file

	$fileName = $_FILES['file']['name'] //gives the name of the file. If you used $file instead, it'll print the entire array instead
	$fileTmpName = $_FILES['file']['tmp_name'] //temp location
	//everything below is all the info for the file
	$fileSize = $_FILES['file']['size']
	$fileError = $_FILES['file']['error']
	$fileType = $_FILES['file']['type']

	$fileExt = explode('.', $fileName); //parse the file name and the type extension; turns into an array
	$fileActualExt = strtolower(end($fileExt)); //takes the last bucket of the array
	//want to change to lower case before checking

	$allowed = array('txt', 'pdf', 'jpg', 'jpeg');

	//checks to see if the ext is in the allowed array
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) { //checks to see if there are any errors
			if ($fileSize < 1000000) { //checks filesize to 1000000KB
				$fileNameNew = uniqid('', true).".".$fileActualExt; //id to prevent clashes. uses microseconds for id

				$fileDestination = 'uploads/'.$fileNameNew //places the upload in destination

				move_uploaded_file($fileTmpName, $fileDestination); //moves from temp location to right location

				header("Location: index.php?");
			} else {
				echo "Your file is too large!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You can't upload files of this type!";
	}





}
