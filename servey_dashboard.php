<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit;
}

// Get the username from the session
$username = htmlspecialchars($_SESSION['username']); // Sanitize username for safety
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-image: url('dashpic.jpg'); /* Add your image here */
            background-size: cover;
            background-position: center;
        }
        .greeting {
            font-size: 28px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin for better separation */
            color: #FF0000; /* Red color for the greeting */
            text-align: center; /* Center align the text */
        }
        #takeSurveyButton {
            padding: 6px 16px; /* Reduced button size */
            width: 100px;
            height: 50px;
            font-size: 14px; /* Reduced font size */
            cursor: pointer;
            background-color: #ff9800; /* Updated color for visibility */
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px; /* Added margin to separate from greeting */
        }
        #takeSurveyButton:hover {
            background-color: #e68900; /* Hover color */
        }
        #questions {
            margin-top: 20px;
            display: none;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 300px; /* Set a fixed width for the questions container */
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        label, select {
            margin: 5px 0;
            font-size: 16px;
        }
        #goButton {
            background-color: #5bc0de;
        }
        #goButton:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>
    <div class="greeting">Hello, <?php echo $username; ?>!</div>
    <button id="takeSurveyButton">TAKE SURVEY</button>
    <div id="questions">
        <form action="submit_survey.php" method="POST">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            
            <label for="age">Age:</label>
            <select name="age" id="age" required>
                <option value="">Select</option>
                <option value="under_18">Under 18</option>
                <option value="18_25">18-25</option>
                <option value="26_35">26-35</option>
                <option value="36_45">36-45</option>
                <option value="46_plus">46+</option>
            </select>

            <label for="occupation">Occupation:</label>
            <select name="occupation" id="occupation" required>
                <option value="">Select</option>
                <option value="student">Student</option>
                <option value="professional">Professional</option>
                <option value="self_employed">Self-employed</option>
                <option value="unemployed">Unemployed</option>
                <option value="retired">Retired</option>
            </select>

            <!-- New Relationship Status Question -->
            <label for="relationship">Relationship Status:</label>
            <select name="relationship" id="relationship" required>
                <option value="">Select</option>
                <option value="single">Single</option>
                <option value="in_a_relationship">In a relationship</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
            </select>

            <button type="submit" id="goButton">Go</button>
        </form>
    </div>

    <script>
        const takeSurveyButton = document.getElementById('takeSurveyButton');
        const questionsDiv = document.getElementById('questions');

        takeSurveyButton.addEventListener('click', () => {
            questionsDiv.style.display = 'block'; // Show the survey form
        });
    </script>
</body>
</html>